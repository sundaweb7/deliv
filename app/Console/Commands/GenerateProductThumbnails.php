<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class GenerateProductThumbnails extends Command
{
    protected $signature = 'products:generate-thumbs {--force}';
    protected $description = 'Generate missing product thumbnails from originals';

    public function handle()
    {
        $products = Product::whereNotNull('image')->pluck('image');
        $bar = $this->output->createProgressBar($products->count());
        $bar->start();
        $ok = 0;
        $fail = 0;
        foreach ($products as $filename) {
            $res = \App\Services\ProductImageService::ensureThumb($filename);
            if ($res) $ok++; else $fail++;
            $bar->advance();
        }
        $bar->finish();
        $this->line('');
        $this->info("Thumbnails generated: $ok, failed: $fail");
        return 0;
    }
}
