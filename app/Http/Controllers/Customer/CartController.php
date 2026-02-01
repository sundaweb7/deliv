<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        $user = $request->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $product = Product::findOrFail($request->product_id);
        $item = $cart->items()->where('product_id', $product->id)->first();
        if ($item) {
            $item->qty += $request->qty;
            $item->price = $product->price;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'qty' => $request->qty,
                'price' => $product->price,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Added to cart', 'data' => $cart->load('items.product')]);
    }
}
