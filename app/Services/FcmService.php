<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FcmService
{
    protected $serverKey;

    public function __construct()
    {
        // Try env/config first, then fallback to settings table
        $this->serverKey = config('services.fcm.server_key') ?: env('FCM_SERVER_KEY');
        if (!$this->serverKey) {
            $s = \App\Models\Setting::orderBy('id','desc')->first();
            $this->serverKey = $s->fcm_server_key ?? null;
        }
    }

    public function sendToToken(string $token, string $title, string $body, array $data = [])
    {
        // if v1 configured, delegate to v1 implementation
        if (config('services.fcm.project_id') || env('FCM_PROJECT_ID') || config('services.fcm.service_account_json') || env('FCM_SERVICE_ACCOUNT_JSON')) {
            $v1 = app(\App\Services\FcmV1Service::class);
            return $v1->sendToToken($token, $title, $body, $data);
        }

        if (!$this->serverKey) {
            // no server key configured
            return false;
        }

        $payload = [
            'to' => $token,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
            'data' => $data,
        ];

        $res = Http::withHeaders([
            'Authorization' => 'key=' . $this->serverKey,
            'Content-Type' => 'application/json',
        ])->post('https://fcm.googleapis.com/fcm/send', $payload);

        return $res->successful();
    }

    public function sendToTokens(array $tokens, string $title, string $body, array $data = [])
    {
        // delegate per-token to v1 when configured
        if (config('services.fcm.project_id') || env('FCM_PROJECT_ID') || config('services.fcm.service_account_json') || env('FCM_SERVICE_ACCOUNT_JSON')) {
            $v1 = app(\App\Services\FcmV1Service::class);
            return $v1->sendToTokens($tokens, $title, $body, $data);
        }

        foreach (array_chunk($tokens, 500) as $chunk) {
            $payload = [
                'registration_ids' => array_values($chunk),
                'notification' => [ 'title' => $title, 'body' => $body ],
                'data' => $data,
            ];

            $res = Http::withHeaders([
                'Authorization' => 'key=' . $this->serverKey,
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', $payload);
        }

        return true;
    }
}