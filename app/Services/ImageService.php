<?php

namespace App\Services;

class ImageService
{
    public static function getUrl($path, $width = null, $height = null)
    {
        if (!$path) return '';
        return asset('storage/' . $path);
    }

    public static function getSrcset($path, $sizes = [300, 600, 900])
    {
        if (!$path) return '';
        $url = asset('storage/' . $path);
        $srcset = [];
        foreach ($sizes as $size) {
            $srcset[] = $url . ' ' . $size . 'w';
        }
        return implode(', ', $srcset);
    }
}