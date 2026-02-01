<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SlideImageController extends Controller
{
    public function show(Request $request, $filename)
    {
        // basic sanitization: no slashes
        if (strpos($filename, '..') !== false) abort(404);
        $path = 'slides/' . $filename;
        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $full = Storage::disk('public')->path($path);

        return $this->serveFile($full, 3600);
    }

    public function thumb(Request $request, $filename)
    {
        if (strpos($filename, '..') !== false) abort(404);
        $thumbPath = 'slides/thumbs/' . $filename;
        $srcPath = 'slides/' . $filename;

        if (!Storage::disk('public')->exists($srcPath)) abort(404);

        if (!Storage::disk('public')->exists($thumbPath)) {
            // generate, if generation fails we'll fall back to original
            $ok = \App\Services\ImageService::makeThumbnail('public', $srcPath, $thumbPath, 400, 150);
            if (!$ok) {
                // log and fall back: use source
                \Log::warning('Thumbnail generation failed for: ' . $srcPath);
                $full = Storage::disk('public')->path($srcPath);
                return $this->serveFile($full, 86400);
            }
        }

        $full = Storage::disk('public')->path($thumbPath);
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
