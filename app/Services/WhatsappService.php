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
    /**
     * Send a plain text message and return raw response details (useful for testing).
     */
    protected function fonteeTargetFromNormalized(string $normalized): string
    {
        // normalized format is like +6285... or 085... or 6285...; Fontee accepts numbers like 6285... or 081...
        // We'll strip non-digits and remove leading +, then if it starts with 62 keep it, if starts with 0 keep it as-is
        $s = preg_replace('/[^0-9]/', '', $normalized);
        if (strpos($s, '62') === 0) return $s;
        if (strpos($s, '0') === 0) return $s; // 081...
        // otherwise return as-is
        return $s;
    }

    public function sendTextRaw(string $to, string $message): array
    {
        if (!$this->settings || !$this->settings->wa_enabled) {
            return ['success' => false, 'error' => 'WA disabled or settings missing'];
        }

        $provider = $this->settings->wa_provider ?? 'none';
        if ($provider === 'none' || empty($this->settings->wa_api_key)) {
            return ['success' => false, 'error' => 'WA provider not configured or API key missing'];
        }

        try {
            if ($provider === 'fontee') {
                $url = rtrim($this->settings->wa_api_url ?? 'https://api.fonnte.com', '/') . '/send';

                $target = $this->fonteeTargetFromNormalized($to);
                $payload = [
                    'target' => $target,
                    'message' => $message,
                ];

                $res = Http::withHeaders(['Authorization' => $this->settings->wa_api_key])->timeout(10)->post($url, $payload);

                return [
                    'success' => $res->successful(),
                    'status' => $res->status(),
                    'body' => $res->body(),
                ];
            }

            return ['success' => false, 'error' => 'Unknown WA provider: ' . $provider];
        } catch (\Throwable $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Test API key / connection for configured WA provider. Returns ['ok'=>bool,'message'=>string,'details'=>mixed]
     */
    public function testConnection(): array
    {
        if (!$this->settings) return ['ok' => false, 'message' => 'Settings not configured'];
        $provider = $this->settings->wa_provider ?? 'none';
        if ($provider !== 'fontee') return ['ok' => false, 'message' => 'Unsupported provider: ' . $provider];

        // Use the validate endpoint for a safe connectivity/token/device check
        $validateUrl = rtrim($this->settings->wa_api_url ?? 'https://api.fonnte.com', '/') . '/validate';

        $target = $this->settings->wa_device_id ?: null;
        if (!$target) return ['ok' => false, 'message' => 'Device ID not configured'];

        try {
            $res = Http::withHeaders(['Authorization' => $this->settings->wa_api_key])->timeout(10)->post($validateUrl, ['target' => $target]);
            $body = $res->successful() ? $res->json() : ($res->body() ?: null);

            if ($res->successful()) {
                return ['ok' => true, 'message' => 'OK', 'details' => $body];
            }

            // try to extract reason if json
            if (is_array($body) && isset($body['reason'])) {
                return ['ok' => false, 'message' => $body['reason'], 'details' => $body];
            }

            return ['ok' => false, 'message' => 'HTTP ' . $res->status(), 'details' => $res->body()];
        } catch (\Throwable $e) {
            return ['ok' => false, 'message' => 'Request error: ' . $e->getMessage()];
        }
    }

    /**
     * Convenience wrapper that keeps old behaviour (returns bool). Uses sendTextRaw internally.
     */
    public function sendText(string $to, string $message): bool
    {
        $res = $this->sendTextRaw($to, $message);
        if (isset($res['success']) && $res['success']) {
            Log::info('WA sent via ' . ($this->settings->wa_provider ?? 'provider') . ' to ' . $to, ['resp' => $res['body'] ?? null]);
            return true;
        }

        Log::warning('WA send failed', $res);
        return false;
    }
}
