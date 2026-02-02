<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->handle(new Symfony\Component\Console\Input\ArgvInput([]), new Symfony\Component\Console\Output\NullOutput());

try {
    $rows = \Illuminate\Support\Facades\DB::table('device_tokens')->select('id','user_id','token','platform','last_used_at','created_at')->get();
    echo "Device tokens:\n";
    foreach ($rows as $r) {
        echo "- id={$r->id}, user_id={$r->user_id}, platform={$r->platform}, last_used_at={$r->last_used_at}, token={$r->token}\n";
    }
    if (count($rows) === 0) echo "(no tokens found)\n";
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}

echo "Done\n";
