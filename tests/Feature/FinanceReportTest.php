<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderVendor;
use App\Models\OrderItem;
use App\Models\Setting;

class FinanceReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_finance_report_shows_daily_and_mitra_earnings()
    {
        Setting::create(['vendor_commission_percent'=>70,'admin_delivery_cut'=>2000]);

        $user = User::factory()->create(['role'=>'customer']);
        $mitraUser = User::factory()->create(['role'=>'mitra']);
        $mitra = Mitra::create(['user_id' => $mitraUser->id, 'business_name'=>'Warung']);
        $product = Product::create(['mitra_id'=>$mitra->id,'name'=>'P','price'=>10000,'is_active'=>1]);

        $order = Order::create(['customer_id'=>$user->id,'order_type'=>'delivery','status'=>'pending','total_food'=>10000,'delivery_fee'=>2000,'admin_profit'=>0,'grand_total'=>12000]);
        $ov = OrderVendor::create(['order_id'=>$order->id,'mitra_id'=>$mitra->id,'subtotal_food'=>10000,'delivery_type'=>'delivery','status'=>'pending','delivery_fee_share'=>2000]);
        OrderItem::create(['order_vendor_id'=>$ov->id,'product_id'=>$product->id,'qty'=>1,'price'=>10000]);

        $this->withSession(['admin_token'=>'abc'])->get('/admin/reports/finance')->assertStatus(200)->assertSee('Daily Orders')->assertSee('Pendapatan Per Mitra');
    }
}
