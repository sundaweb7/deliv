<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsappService
{
    protected $settings;

    public function __construct()
    {
        $this->settings = Setting::orderBy('id', 'desc')->first();
    }

    /**
     * Send a plain text message. Returns boolean success.
     */
    public function sendText(string $to, string $message): bool
    {
        if (!$this->settings || !$this->settings->wa_enabled) {
            Log::info('WA disabled or settings missing; skipping WA send.');
            return false;
        }

        $provider = $this->settings->wa_provider ?? 'none';
        if ($provider === 'none' || empty($this->settings->wa_api_key)) {
            Log::warning('WA provider not configured or API key missing.');
            return false;
        }

        try {
            if ($provider === 'fontee') {
                $url = $this->settings->wa_api_url ?? 'https://api.fontee.id/send';
                $payload = [
                    'api_key' => $this->settings->wa_api_key,
                    'device_id' => $this->settings->wa_device_id,
                    'to' => $to,
                    'message' => $message,
                ];

                $res = Http::timeout(10)->post($url, $payload);

                if ($res->successful()) {
                    Log::info('WA sent via Fontee to ' . $to, ['resp' => $res->body()]);
                    return true;
                }

                Log::warning('WA Fontee send failed', ['status' => $res->status(), 'body' => $res->body()]);
                return false;
            }

            Log::warning('Unknown WA provider: ' . $provider);
            return false;
        } catch (\Throwable $e) {
            Log::error('WA send error: ' . $e->getMessage());
            return false;
        }
    }
}
