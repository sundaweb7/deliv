<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Order;
use App\Services\WhatsappService;
use Illuminate\Support\Facades\Log;

class SendOrderWhatsappNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orderId;

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    public function handle()
    {
        $order = Order::with('orderVendors.items.product', 'customer')->find($this->orderId);
        if (!$order) return;

        $wa = new WhatsappService();
        $settings = \App\Models\Setting::orderBy('id','desc')->first();
        if (!$settings || !$settings->wa_enabled) {
            Log::info('WA disabled; skipping notifications for order ' . $order->id);
            return;
        }

        // Compose item details
        $itemsText = [];
        foreach ($order->orderVendors as $ov) {
            foreach ($ov->items as $it) {
                $pname = $it->product ? ($it->product->name ?? 'Item') : 'Item';
                $itemsText[] = "- {$pname} x{$it->qty} — Rp " . number_format($it->price * $it->qty, 0, ',', '.');
            }
        }
        $itemsTextStr = implode("\n", $itemsText);

        // Customer message
        if ($settings->wa_send_to_customer) {
            $custPhone = $order->customer ? ($order->customer->phone ?? null) : null;
            if ($custPhone) {
                // normalize phone before sending
                $custPhone = \App\Services\PhoneHelper::normalizeIndoPhone($custPhone);
                $message = "Pesanan Anda #{$order->id}\nTotal: Rp " . number_format($order->grand_total, 0, ',', '.') . "\nItems:\n{$itemsTextStr}\nAlamat: " . ($order->delivery_address ?? '') . "\nStatus: {$order->status}";
                // create log entry
                $log = \App\Models\WhatsappLog::create(['order_id' => $order->id, 'target' => $custPhone, 'message' => $message, 'provider' => $settings->wa_provider]);
                try {
                    $res = $wa->sendTextRaw($custPhone, $message);
                    $log->update(['success' => $res['success'] ?? false, 'response' => isset($res['body']) ? (is_string($res['body']) ? $res['body'] : json_encode($res['body'])) : json_encode($res), 'attempts' => $log->attempts + 1]);
                } catch (\Throwable $e) {
                    Log::error('WA customer send error: ' . $e->getMessage());
                    $log->update(['success' => false, 'response' => $e->getMessage(), 'attempts' => $log->attempts + 1]);
                }
            }
        }

        // Mitra messages (one per vendor)
        if ($settings->wa_send_to_mitra) {
            foreach ($order->orderVendors as $ov) {
                $mitra = $ov->mitra;
                if (!$mitra) continue;
                $mitraPhone = $mitra->wa_number ?? $mitra->user->phone ?? null;
                if (!$mitraPhone) continue;
                // normalize mitra number
                $mitraPhone = \App\Services\PhoneHelper::normalizeIndoPhone($mitraPhone);

                // Items only for this mitra
                $mitraItems = [];
                foreach ($ov->items as $it) {
                    $pname = $it->product ? ($it->product->name ?? 'Item') : 'Item';
                    $mitraItems[] = "- {$pname} x{$it->qty} — Rp " . number_format($it->price * $it->qty, 0, ',', '.');
                }
                $mitraItemsStr = implode("\n", $mitraItems);

                $msg = "Pesanan baru untuk Mitra #{$order->id}\nItems:\n{$mitraItemsStr}\nSubtotal: Rp " . number_format($ov->subtotal_food, 0, ',', '.') . "\nAlamat: " . ($order->delivery_address ?? '') . "\nStatus: {$ov->status}";
                // create log entry
                $log = \App\Models\WhatsappLog::create(['order_id' => $order->id, 'target' => $mitraPhone, 'message' => $msg, 'provider' => $settings->wa_provider]);
                try {
                    $res = $wa->sendTextRaw($mitraPhone, $msg);
                    $log->update(['success' => $res['success'] ?? false, 'response' => isset($res['body']) ? (is_string($res['body']) ? $res['body'] : json_encode($res['body'])) : json_encode($res), 'attempts' => $log->attempts + 1]);
                } catch (\Throwable $e) {
                    Log::error('WA mitra send error: ' . $e->getMessage());
                    $log->update(['success' => false, 'response' => $e->getMessage(), 'attempts' => $log->attempts + 1]);
                }
            }
        }
    }
}
