<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$settings = App\Models\Setting::orderBy('id','desc')->first();
echo json_encode([
    'wa_provider' => $settings->wa_provider ?? null,
    'wa_api_key' => $settings->wa_api_key ?? null,
    'wa_device_id' => $settings->wa_device_id ?? null,
    'wa_api_url' => $settings->wa_api_url ?? null,
    'wa_enabled' => $settings->wa_enabled ?? null,
    'wa_send_to_customer' => $settings->wa_send_to_customer ?? null,
    'wa_send_to_mitra' => $settings->wa_send_to_mitra ?? null,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;