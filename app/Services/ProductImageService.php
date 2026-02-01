<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductImageService
{
    /**
     * Store an uploaded product image and generate a thumbnail.
     * Returns the stored filename.
     */
    public static function storeUploaded(UploadedFile $file): string
    {
        $ext = strtolower($file->getClientOriginalExtension());
        $filename = time() . '_' . uniqid() . '.' . $ext;

        // ensure directories
        if (!Storage::disk('public')->exists('products/originals')) {
            Storage::disk('public')->makeDirectory('products/originals');
        }
        if (!Storage::disk('public')->exists('products/thumb')) {
            Storage::disk('public')->makeDirectory('products/thumb');
        }

        // store original on the 'public' disk
        $file->storeAs('products/originals', $filename, 'public');

        // attempt to generate a thumbnail using ImageService
        try {
            \App\Services\ImageService::makeThumbnail('public', 'products/originals/' . $filename, 'products/thumb/' . $filename, 800, 800);
        } catch (\Throwable $e) {
            // ignore generation errors; thumbnail may not exist but original is stored
        }

        return $filename;
    }

    /**
     * Ensure a thumbnail exists for a given filename; generate on demand.
     * Returns true if a thumbnail file now exists.
     */
    public static function ensureThumb(string $filename): bool
    {
        $thumbPath = 'products/thumb/' . $filename;
        $srcPath = 'products/originals/' . $filename;

        if (Storage::disk('public')->exists($thumbPath)) {
            return true;
        }

        if (!Storage::disk('public')->exists($srcPath)) {
            return false;
        }

        try {
            return \App\Services\ImageService::makeThumbnail('public', $srcPath, $thumbPath, 800, 800);
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * Get the public url for original and thumb.
     */
    public static function url(string $filename, bool $thumb = true): string
    {
        $path = $thumb ? 'products/thumb/' . $filename : 'products/originals/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            // fallback to originals
            $path = 'products/originals/' . $filename;
        }

        return config('app.url') . Storage::disk('public')->url($path);
    }
}
