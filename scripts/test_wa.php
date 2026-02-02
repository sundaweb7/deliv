<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
// Boot the app (needed for facades/config)
$kernel->bootstrap();
$wa = new App\Services\WhatsappService();
$res = $wa->testConnection();
echo json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
