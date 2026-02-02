<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$settings = App\Models\Setting::first();
$settings->wa_provider = 'fontee';
$settings->save();
echo "Updated wa_provider to fontee\n";