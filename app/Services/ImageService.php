<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService
{
    public function uploadAndResize(
        $file,
        string $path,
        ?int $width = null,   // optional
        int $quality = 80
    ) {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file);

        // Resize only if width is provided
        if ($width) {
            $image->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $fileName = uniqid() . '.webp';
        $fullPath = $path . '/' . $fileName;

        Storage::disk('public')->put(
            $fullPath,
            $image->toWebp($quality)
        );

        return $fullPath;
    }
}