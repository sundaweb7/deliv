<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Generate thumbnail using GD and save to disk.
     * Supports jpg, jpeg, png, gif, copies svg instead.
     */
    public static function makeThumbnail(string $disk, string $sourcePath, string $destPath, int $maxWidth = 400, int $maxHeight = 400): bool
    {
        $diskObj = Storage::disk($disk);
        if (!$diskObj->exists($sourcePath)) return false;

        $ext = strtolower(pathinfo($sourcePath, PATHINFO_EXTENSION));

        // ensure directory exists
        $dir = dirname($destPath);
        if (!$diskObj->exists($dir)) {
            $diskObj->makeDirectory($dir);
        }

        // SVG: try to rasterize to PNG if Imagick available, otherwise copy as-is
        if (in_array($ext, ['svg'])) {
            try {
                if (class_exists('\Imagick')) {
                    $svg = $diskObj->get($sourcePath);
                    $im = new \Imagick();
                    // read SVG from string
                    $im->setBackgroundColor(new \ImagickPixel('transparent'));
                    $im->readImageBlob($svg);
                    // resize while keeping aspect ratio (use thumbnailImage if available)
                    $im->thumbnailImage($maxWidth, $maxHeight, true);
                    $im->setImageFormat('png');
                    $tmpDest = sys_get_temp_dir() . '/' . uniqid('thumb_') . '.png';
                    file_put_contents($tmpDest, $im->getImagesBlob());
                    $diskObj->put($destPath, file_get_contents($tmpDest));
                    @unlink($tmpDest);
                    $im->clear();
                    $im->destroy();
                    return true;
                } else {
                    // fallback: copy svg
                    $diskObj->put($destPath, $diskObj->get($sourcePath));
                    return true;
                }
            } catch (\Throwable $e) {
                // fallback to copy
                $diskObj->put($destPath, $diskObj->get($sourcePath));
                return true;
            }
        }

        // Raster images: use GD
        try {
            $tmp = $diskObj->path($sourcePath);
            if (!file_exists($tmp)) return false;

            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $img = @imagecreatefromjpeg($tmp);
                    break;
                case 'png':
                    $img = @imagecreatefrompng($tmp);
                    break;
                case 'gif':
                    $img = @imagecreatefromgif($tmp);
                    break;
                default:
                    return false; // unsupported
            }

            if (!$img) return false;

            $w = imagesx($img);
            $h = imagesy($img);

            // calculate new size while keeping aspect
            $ratio = min($maxWidth / $w, $maxHeight / $h, 1);
            $nw = (int) round($w * $ratio);
            $nh = (int) round($h * $ratio);

            $dst = imagecreatetruecolor($nw, $nh);

            // preserve transparency for png and gif
            if (in_array($ext, ['png', 'gif'])) {
                imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
            }

            imagecopyresampled($dst, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);

            // save to temp file then store
            $tmpDest = sys_get_temp_dir() . '/' . uniqid('thumb_') . '.' . $ext;
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($dst, $tmpDest, 85);
                    break;
                case 'png':
                    imagepng($dst, $tmpDest, 6);
                    break;
                case 'gif':
                    imagegif($dst, $tmpDest);
                    break;
            }

            imagedestroy($img);
            imagedestroy($dst);

            $diskObj->put($destPath, file_get_contents($tmpDest));
            @unlink($tmpDest);

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
