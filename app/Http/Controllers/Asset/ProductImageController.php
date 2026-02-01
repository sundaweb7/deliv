<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function show(Request $request, $filename)
    {
        if (strpos($filename, '..') !== false) abort(404);
        // Originals are stored under products/originals
        $path = 'products/originals/' . $filename;
        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $full = Storage::disk('public')->path($path);
        return $this->serveFile($full, 3600);
    }

    public function thumb(Request $request, $filename)
    {
        if (strpos($filename, '..') !== false) abort(404);

        $thumbPath = 'products/thumb/' . $filename;
        $srcPath = 'products/originals/' . $filename;

        // Ensure source exists
        if (!Storage::disk('public')->exists($srcPath)) abort(404);

        // Ensure thumbnail exists (generate on demand)
        if (!Storage::disk('public')->exists($thumbPath)) {
            $ok = \App\Services\ProductImageService::ensureThumb($filename);
            if (!$ok) {
                // fallback to serving original source
                $full = Storage::disk('public')->path($srcPath);
                return $this->serveFile($full, 86400);
            }
        }

        $full = Storage::disk('public')->path($thumbPath);

        // Serve as a file response (returns 200 with correct content type)
        return $this->serveFile($full, 86400);
    }

    /**
     * Serve a file with robust MIME detection and inline disposition.
     */
    private function serveFile(string $fullPath, int $cacheSeconds)
    {
        $mime = null;

        // try built-in MIME detection
        if (function_exists('mime_content_type')) {
            $mime = @mime_content_type($fullPath) ?: null;
        }

        // finfo fallback
        if ((!$mime || strpos($mime, 'image/') !== 0) && function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $m = @finfo_file($finfo, $fullPath);
            finfo_close($finfo);
            if ($m) $mime = $m;
        }

        // extension-based fallback
        $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
        if ((!$mime || strpos($mime, 'image/') !== 0)) {
            if (in_array($ext, ['jpg', 'jpeg'])) $mime = 'image/jpeg';
            elseif ($ext === 'png') $mime = 'image/png';
            elseif ($ext === 'svg') $mime = 'image/svg+xml';
            elseif ($ext === 'gif') $mime = 'image/gif';
            else $mime = $mime ?: 'application/octet-stream';
        }

        $resp = response()->file($fullPath, [
            'Content-Type' => $mime,
            'Cache-Control' => 'public, max-age=' . intval($cacheSeconds),
            'Content-Disposition' => 'inline'
        ]);

        // Allow cross-origin image loads for web clients (use Symfony header API)
        $resp->headers->set('Access-Control-Allow-Origin', '*');
        $resp->headers->set('Vary', 'Origin');
        return $resp;
    }
}
