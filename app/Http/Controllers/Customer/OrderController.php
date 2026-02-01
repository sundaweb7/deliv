<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Product;
use App\Services\CheckoutService;
use App\Http\Requests\CheckoutRequest;

class OrderController extends Controller
{
    public function mitras(Request $request)
    {
        $mitras = Mitra::with('user')->where('is_active', true)->get();
        return response()->json(['success' => true, 'message' => 'List mitras', 'data' => $mitras]);
    }

    public function products(Request $request)
    {
        // allow optional category filter
        $query = Product::with(['mitra','category'])->where('is_active', true);
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request){ $q->where('slug', $request->category); });
        }
        return response()->json(['success' => true, 'message' => 'List products', 'data' => $query->get()]);
    }

    public function homeProducts(Request $request)
    {
        // return top 10 products: admin-selected featured in position order, then best-sellers fill the rest
        $featured = \App\Models\FeaturedProduct::with('product')->orderBy('position')->get();
        $featuredProducts = $featured->pluck('product')->filter()->values()->all();
        $selectedIds = array_filter(array_map(function($p){ return $p ? $p->id : null; }, $featuredProducts));

        // fill remaining slots with top-selling products (by order_items qty)
        $remaining = 10 - count($selectedIds);
        $additional = [];
        if ($remaining > 0) {
            $additional = \App\Models\Product::select('products.*')
                ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
                ->where('products.is_active', true)
                ->whereNotIn('products.id', $selectedIds)
                ->groupBy('products.id')
                ->orderByRaw('COALESCE(SUM(order_items.qty),0) DESC')
                ->limit($remaining)
                ->get()
                ->all();
        }

        $result = array_merge($featuredProducts, $additional);
        return response()->json(['success'=>true,'message'=>'Home products','data'=>$result]);
    }

    public function checkout(CheckoutRequest $request)
    {
        // If server cart is empty, allow client to submit items in payload and create server-side cart
        $existingCart = \App\Models\Cart::where('user_id', $request->user()->id)->with('items')->first();
        if ((!$existingCart || $existingCart->items->isEmpty()) && $request->has('items') && is_array($request->items) && count($request->items) > 0) {
            $cart = \App\Models\Cart::firstOrCreate(['user_id' => $request->user()->id]);
            foreach ($request->items as $it) {
                if (!isset($it['product_id']) || !isset($it['qty'])) continue;
                $product = \App\Models\Product::find($it['product_id']);
                if (!$product) continue;
                $existing = $cart->items()->where('product_id', $product->id)->first();
                if ($existing) {
                    $existing->qty = $it['qty'];
                    $existing->price = $product->price;
                    $existing->save();
                } else {
                    $cart->items()->create(['product_id' => $product->id, 'qty' => $it['qty'], 'price' => $product->price]);
                }
            }
        }

        $svc = new CheckoutService($request->user());
        try {
            // idempotency support
            $idempotency = $request->header('Idempotency-Key');
            if ($idempotency) {
                $existing = \App\Models\IdempotencyKey::where('key', $idempotency)->first();
                if ($existing && $existing->response) {
                    return response()->json(json_decode($existing->response, true));
                }
            }

            $paymentMethod = $request->input('payment_method', 'wallet');
            $bankId = $request->input('bank_id');
            $deliveryOption = $request->input('delivery_option', null); // pickup|mitra|admin
            $mitraShipping = $request->input('mitra_shipping', []);
            $order = $svc->checkout($request->lat, $request->lng, $request->address, $request->note, $paymentMethod, $bankId, $deliveryOption, $mitraShipping);

            if ($idempotency) {
                $payload = ['success'=>true,'message'=>($paymentMethod === 'bank_transfer' ? 'Checkout pending payment' : 'Checkout success'),'data'=>$order];
                \App\Models\IdempotencyKey::create(['user_id'=>$request->user()->id,'key'=>$idempotency,'route'=>'/api/customer/checkout','response'=>json_encode($payload)]);
            }

            if ($paymentMethod === 'bank_transfer') {
                // include bank details for instructions
                $bank = $bankId ? \App\Models\Bank::find($bankId) : null;
                $payload = ['success' => true, 'message' => 'Checkout pending payment', 'data' => ['order' => $order, 'bank' => $bank]];
                if ($idempotency) { \App\Models\IdempotencyKey::where('key',$idempotency)->update(['response'=>json_encode($payload)]); }
                return response()->json($payload);
            }

            $payload = ['success' => true, 'message' => 'Checkout success', 'data' => $order];
            if ($idempotency) { \App\Models\IdempotencyKey::where('key',$idempotency)->update(['response'=>json_encode($payload)]); }
            return response()->json($payload);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function index(Request $request)
    {
        $orders = $request->user()->orders()->with('orderVendors.items.product')->get();
        return response()->json(['success' => true, 'message' => 'List orders', 'data' => $orders]);
    }
}
