<?php

namespace App\Console\Commands;

use App\Models\Magaza;
use App\Services\MagazaGorselService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MagazaGorselUret extends Command
{
    protected $signature = 'magaza:gorsel-uret {--all}';
    protected $description = 'Magazalar icin otomatik logo ve banner uretir';

    public function handle()
    {
        $magazalar = $this->option('all') ? Magaza::all() : Magaza::whereNull('logo')->orWhereNull('banner')->get();

        if ($magazalar->isEmpty()) {
            $this->info('Gorsel uretilmesi gereken magaza yok.');
            return 0;
        }

        $this->info("{$magazalar->count()} magaza icin gorsel uretiliyor...");

        foreach ($magazalar as $magaza) {
            $this->line("Isleniyor: {$magaza->magaza_adi}");

            if (!$magaza->logo) {
                $filename = 'magaza-logo-' . Str::slug($magaza->magaza_adi) . '.svg';
                $svgContent = @file_get_contents(MagazaGorselService::getLogoUrl($magaza->magaza_adi));
                if ($svgContent !== false) {
                    Storage::disk('public')->put('magaza/' . $filename, $svgContent);
                    $magaza->update(['logo' => 'magaza/' . $filename]);
                    $this->info("  ✓ Logo uretildi: {$filename}");
                } else {
                    $this->warn("  ✗ Logo uretilirken hata: {$magaza->magaza_adi}");
                }
            }

            if (!$magaza->banner) {
                $filename = MagazaGorselService::saveBanner($magaza->magaza_adi, $magaza->slogan);
                $magaza->update(['banner' => 'magaza-banner/' . $filename]);
                $this->info("  ✓ Banner uretildi: {$filename}");
            }
        }

        $this->info('Tum islemler tamamlandi!');
        return 0;
    }
}
