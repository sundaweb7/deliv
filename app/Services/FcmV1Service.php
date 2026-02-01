<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FcmV1Service
{
    protected $projectId;
    protected $serviceAccount; // array from json

    public function __construct()
    {
        $this->projectId = config('services.fcm.project_id') ?: env('FCM_PROJECT_ID');

        $json = config('services.fcm.service_account_json') ?: env('FCM_SERVICE_ACCOUNT_JSON');
        $path = config('services.fcm.service_account_path') ?: env('FCM_SERVICE_ACCOUNT_PATH');

        \Log::info('FcmV1Service constructing', ['path' => $path, 'path_exists' => $path ? file_exists($path) : false]);

        if ($json) {
            $this->serviceAccount = json_decode($json, true);
            \Log::info('FcmV1Service loaded service account from json');
        } elseif ($path && file_exists($path)) {
            $this->serviceAccount = json_decode(file_get_contents($path), true);
            \Log::info('FcmV1Service loaded service account from path', ['path' => $path]);
        } else {
            $this->serviceAccount = null;
            \Log::error('FcmV1Service could not locate service account json', ['path' => $path]);
        }
    }

    protected function getAccessToken()
    {
        if (!$this->serviceAccount || !$this->projectId) {
            \Log::error('FcmV1Service: missing service account or project id', ['serviceAccount' => $this->serviceAccount ? 'yes' : 'no', 'projectId' => $this->projectId]);
            return null;
        }

        $now = time();
        $header = ['alg' => 'RS256', 'typ' => 'JWT'];
        $claim = [
            'iss' => $this->serviceAccount['client_email'],
            'scope' => 'https://www.googleapis.com/auth/cloud-platform',
            'aud' => 'https://oauth2.googleapis.com/token',
            'iat' => $now,
            'exp' => $now + 3600,
        ];

        $segments = [];
        $segments[] = $this->urlsafeB64Encode(json_encode($header));
        $segments[] = $this->urlsafeB64Encode(json_encode($claim));
        $signing_input = implode('.', $segments);

        $privateKey = $this->serviceAccount['private_key'] ?? null;
        if (!$privateKey) return null;

        if (!openssl_sign($signing_input, $signature, $privateKey, OPENSSL_ALGO_SHA256)) {
            \Log::error('FcmV1Service: openssl_sign failed');
            return null;
        }

        $segments[] = $this->urlsafeB64Encode($signature);
        $jwt = implode('.', $segments);

        try {
            $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion' => $jwt,
            ]);
            if ($response->ok()) {
                $data = $response->json();
                \Log::info('FcmV1Service got token', ['has_access_token' => isset($data['access_token'])]);
                return $data['access_token'] ?? null;
            }
            \Log::error('FcmV1Service token request failed', ['status' => $response->status(), 'body' => $response->body()]);
        } catch (\Exception $e) {
            \Log::error('FcmV1Service token request exception', ['message' => $e->getMessage()]);
        }

        return null;
    }

    protected function urlsafeB64Encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function sendToToken(string $token, string $title, string $body, array $data = [])
    {
        $access = $this->getAccessToken();
        if (!$access) return false;

        $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

        // Ensure data is a map/object (FCM v1 expects a map, not a list)
        if (!is_array($data)) {
            $data = (array) $data;
        }
        // Convert all values to strings (FCM data values must be strings)
        $data = array_map(function ($v) {
            return is_string($v) ? $v : (is_null($v) ? '' : (string) $v);
        }, $data);
        $payload = [
            'message' => [
                'token' => $token,
                'notification' => ['title' => $title, 'body' => $body],
                // If empty, send an empty object instead of an empty list
                'data' => empty($data) ? (object)[] : (object)$data,
            ]
        ];

        $res = Http::withToken($access)->post($url, $payload);
        if (!$res->ok()) {
            // Log error details for debugging
            \Log::error('FCM send failed', ['status' => $res->status(), 'body' => $res->body()]);
            return false;
        }
        return true;
    }

    public function sendToTokens(array $tokens, string $title, string $body, array $data = [])
    {
        if (empty($tokens)) return false;
        $ok = true;
        foreach (array_chunk($tokens, 500) as $chunk) {
            foreach ($chunk as $t) {
                $r = $this->sendToToken($t, $title, $body, $data);
                if (!$r) $ok = false;
            }
        }
        return $ok;
    }
}
