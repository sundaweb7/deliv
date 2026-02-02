<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CategoryImageService
{
    public static function storeUploaded(UploadedFile $file): string
    {
        $ext = strtolower($file->getClientOriginalExtension());
        $filename = time() . '_' . uniqid() . '.' . $ext;

        if (!Storage::disk('public')->exists('categories/originals')) {
            Storage::disk('public')->makeDirectory('categories/originals');
        }
        if (!Storage::disk('public')->exists('categories/thumb')) {
            Storage::disk('public')->makeDirectory('categories/thumb');
        }

        $file->storeAs('categories/originals', $filename, 'public');

        try {
            \App\Services\ImageService::makeThumbnail('public', 'categories/originals/' . $filename, 'categories/thumb/' . $filename, 800, 800);
        } catch (\Throwable $e) {
            // ignore
        }

        return $filename;
    }

    public static function ensureThumb(string $filename): bool
    {
        $thumbPath = 'categories/thumb/' . $filename;
        $srcPath = 'categories/originals/' . $filename;

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
}
