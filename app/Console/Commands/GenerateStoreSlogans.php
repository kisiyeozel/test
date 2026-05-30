<?php

namespace App\Console\Commands;

use App\Models\Magaza;
use App\Models\Kategori;
use Illuminate\Console\Command;

class GenerateStoreSlogans extends Command
{
    protected $signature = 'stores:generate-slogans';
    protected $description = 'Mağazalar için "Biz kişiye özel" ile başlayan sloganlar oluşturur';

    public function handle()
    {
        $magazalar = Magaza::all();
        $updated = 0;

        foreach ($magazalar as $magaza) {
            $slogan = $this->generateSlogan($magaza);
            if ($slogan && $slogan !== $magaza->slogan) {
                $magaza->update(['slogan' => $slogan]);
                $this->info("✓ {$magaza->magaza_adi}: {$slogan}");
                $updated++;
            }
        }

        $this->info("\n{$updated} mağaza güncellendi.");
        return Command::SUCCESS;
    }

    protected function generateSlogan($magaza)
    {
        $urunler = $magaza->urunler()->with('kategori')->get();
        if ($urunler->isEmpty()) {
            return "Biz kişiye özel ürünler tasarlıyoruz";
        }

        $kategoriSayilari = [];
        foreach ($urunler as $urun) {
            if ($urun->kategori) {
                $kat = $urun->kategori->kategori_adi;
                $kategoriSayilari[$kat] = ($kategoriSayilari[$kat] ?? 0) + 1;
            }
        }

        if (empty($kategoriSayilari)) {
            return "Biz kişiye özel ürünler tasarlıyoruz";
        }

        arsort($kategoriSayilari);
        $enPopulerKategori = array_key_first($kategoriSayilari);

        $slogan = $this->buildSlogan($enPopulerKategori);
        return $slogan;
    }

    protected function buildSlogan($kategori)
    {
        $kategori = mb_strtolower($kategori, 'UTF-8');

        $map = [
            'tişört' => 'tişörtler',
            'tshirt' => 'tişörtler',
            't-shirt' => 'tişörtler',
            'ti-sort' => 'tişörtler',
            'kupa' => 'kupa bardaklar',
            'bardak' => 'kupa bardaklar',
            'kupa bardak' => 'kupa bardaklar',
            'telefon' => 'telefon kılıfları',
            'kılıf' => 'telefon kılıfları',
            'case' => 'telefon kılıfları',
            'yastık' => 'yastıklar',
            'yastik' => 'yastıklar',
            'çanta' => 'çantalar',
            'canta' => 'çantalar',
            'poster' => 'posterler',
            'tablo' => 'tablolar',
            'duvar' => 'duvar tabloları',
            'magnet' => 'magnetler',
            'mıknatıs' => 'magnetler',
            'defter' => 'defterler',
            'not defteri' => 'not defterleri',
            'ajanda' => 'ajandalar',
            'kalem' => 'kalemler',
            'mousepad' => 'mousepadler',
            'mouse pad' => 'mousepadler',
            'fare altlığı' => 'mousepadler',
            'şapka' => 'şapkalar',
            'sapka' => 'şapkalar',
            'hoodie' => 'hoodielar',
            'kapüşonlu' => 'hoodielar',
            'sweatshirt' => 'sweatshirtler',
            'eşofman' => 'eşofmanlar',
            'esofman' => 'eşofmanlar',
            'baskı' => 'baskılı ürünler',
            'aksesuar' => 'aksesuarlar',
            'takı' => 'takılar',
            'taki' => 'takılar',
            'kolye' => 'kolyeler',
            'bileklik' => 'bileklikler',
            'yüzük' => 'yüzükler',
            'duvar saati' => 'duvar saatleri',
            'saat' => 'duvar saatleri',
            'puzzle' => 'puzzlelar',
            'oyuncak' => 'oyuncaklar',
            'çocuk' => 'çocuk ürünleri',
            'bebek' => 'bebek ürünleri',
            'mug' => 'kupa bardaklar',
            'canvas' => 'canvas tablolar',
            'kanvas' => 'canvas tablolar',
            'sticker' => 'stickerlar',
            'etiket' => 'etiketler',
            'davetiye' => 'davetiyeler',
            'kart' => 'kartlar',
            'kitap' => 'kitaplar',
            'album' => 'albümler',
            'albüm' => 'albümler',
            'fotoğraf' => 'fotoğraf ürünleri',
            'fotograf' => 'fotoğraf ürünleri',
            'hediye' => 'hediye ürünleri',
            'özel' => 'özel tasarım ürünler',
            'tasarım' => 'tasarım ürünler',
            'giyim' => 'giyim ürünleri',
            'tekstil' => 'tekstil ürünleri',
            'seramik' => 'seramikler',
            'mobilya' => 'mobilyalar',
            'klinik' => 'sağlık ürünleri',
            'aksesuar' => 'aksesuarlar',
        ];

        foreach ($map as $key => $value) {
            if (str_contains($kategori, $key)) {
                return "Biz kişiye özel {$value} tasarlıyoruz";
            }
        }

        $plural = $this->pluralize($kategori);
        return "Biz kişiye özel {$plural} tasarlıyoruz";
    }

    protected function pluralize($word)
    {
        $lastChar = mb_substr($word, -1, 1, 'UTF-8');
        if (in_array($lastChar, ['a', 'ı', 'o', 'u'])) {
            return $word . 'lar';
        }
        return $word . 'ler';
    }
}
