<?php

namespace App\Services;

class MagazaGorselService
{
    public static function getLogoUrl($magazaAdi, $size = 256)
    {
        return "https://api.dicebear.com/9.x/shapes/svg?seed=" . urlencode($magazaAdi) . "&size={$size}&backgroundColor=b6e3f4,c0aede,d1d4f9,ffd5dc,ffdfbf";
    }

    public static function getBannerUrl($magazaAdi, $slogan = '', $width = 1200, $height = 400)
    {
        return "https://api.dicebear.com/9.x/fun-emoji/svg?seed=" . urlencode($magazaAdi . '-banner') . "&size={$width}&backgroundColor=b6e3f4,c0aede,d1d4f9,ffd5dc,ffdfbf";
    }

    public static function getBannerDataUrl($magazaAdi, $slogan = '', $width = 1200, $height = 400)
    {
        $colors = [
            ['#d4a853', '#8a6d1f'],
            ['#1a1713', '#453e31'],
            ['#b8912a', '#5c4915'],
            ['#2b2620', '#7a6f5a'],
            ['#5f5645', '#958a73'],
        ];
        $colorPair = $colors[crc32($magazaAdi) % count($colors)];

        $svg = '<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" width="' . $width . '" height="' . $height . '" viewBox="0 0 ' . $width . ' ' . $height . '">
    <defs>
        <linearGradient id="bg" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:' . $colorPair[0] . '"/>
            <stop offset="100%" style="stop-color:' . $colorPair[1] . '"/>
        </linearGradient>
        <filter id="shadow">
            <feDropShadow dx="0" dy="2" stdDeviation="4" flood-opacity="0.3"/>
        </filter>
    </defs>
    <rect width="' . $width . '" height="' . $height . '" fill="url(#bg)"/>
    <circle cx="' . ($width - 120) . '" cy="' . ($height / 2) . '" r="150" fill="rgba(255,255,255,0.08)"/>
    <circle cx="' . ($width - 80) . '" cy="' . ($height / 2 + 60) . '" r="80" fill="rgba(255,255,255,0.05)"/>
    <text x="60" y="' . ($height / 2 - 10) . '" font-family="Georgia, serif" font-size="48" font-weight="bold" fill="white" filter="url(#shadow)">' . htmlspecialchars($magazaAdi) . '</text>';

        if ($slogan) {
            $svg .= '<text x="60" y="' . ($height / 2 + 40) . '" font-family="sans-serif" font-size="18" fill="rgba(255,255,255,0.8)">' . htmlspecialchars($slogan) . '</text>';
        }

        $svg .= '</svg>';

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    public static function saveBanner($magazaAdi, $slogan = '', $filename = null)
    {
        $dataUrl = self::getBannerDataUrl($magazaAdi, $slogan);
        $base64 = explode(',', $dataUrl)[1];
        $svg = base64_decode($base64);

        if (!$filename) {
            $filename = 'banner-' . crc32($magazaAdi) . '.svg';
        }

        $path = storage_path('app/public/magaza-banner/' . $filename);
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        file_put_contents($path, $svg);

        return $filename;
    }
}
