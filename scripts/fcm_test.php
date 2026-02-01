<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->handle(
    new Symfony\Component\Console\Input\ArgvInput([]),
    new Symfony\Component\Console\Output\NullOutput()
);

try {
    $svc = app(App\Services\FcmV1Service::class);
    echo "Service constructed\n";
    // Use reflection to call protected getAccessToken for diagnostics
    $ref = new ReflectionClass($svc);
    $method = $ref->getMethod('getAccessToken');
    $method->setAccessible(true);
    $access = $method->invoke($svc);
    echo "Access token present? " . ($access ? 'yes' : 'no') . "\n";

    $token = $argv[1] ?? null;
    if (!$token) {
        echo "Usage: php scripts/fcm_test.php <token>\n";
        exit(1);
    }

    echo "Sending to token...\n";
    $ok = $svc->sendToToken($token, 'CLI Test', 'Test from script');
    var_export(['ok' => $ok]);

    // For debugging: craft payload and call FCM v1 directly to print response
    $project = $svc->projectId ?? (getenv('FCM_PROJECT_ID') ?: 'kopefluter');
    $payload = [
        'message' => [
            'token' => $token,
            'notification' => ['title' => 'CLI Test Debug', 'body' => 'Debug payload'],
            'data' => (object)[],
        ],
    ];
    echo "Calling FCM v1 endpoint directly for debug...\n";
    $accessToken = $access;
    $url = "https://fcm.googleapis.com/v1/projects/{$project}/messages:send";
    $res = \Illuminate\Support\Facades\Http::withToken($accessToken)->post($url, $payload);
    echo "HTTP status: " . $res->status() . "\n";
    echo "HTTP body: " . $res->body() . "\n";

    echo "\nDone\n";
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}