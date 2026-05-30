<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ayar;
use App\Models\Kategori;
use App\Models\Sss;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'ad_soyad' => 'Admin',
            'email' => 'admin@kisiyeozel.org',
            'telefon' => '05550000000',
            'sifre' => bcrypt('12345678'),
            'role' => 'admin',
            'durum' => 'aktif',
        ]);

        User::create([
            'ad_soyad' => 'Satıcı Test',
            'email' => 'satici@kisiyeozel.org',
            'telefon' => '05550000001',
            'sifre' => bcrypt('12345678'),
            'role' => 'satici',
            'durum' => 'aktif',
        ]);

        User::create([
            'ad_soyad' => 'Müşteri Test',
            'email' => 'musteri@kisiyeozel.org',
            'telefon' => '05550000002',
            'sifre' => bcrypt('12345678'),
            'role' => 'musteri',
            'durum' => 'aktif',
        ]);

        Ayar::create(['anahtar' => 'komisyon_orani', 'deger' => '10']);
        Ayar::create(['anahtar' => 'sabit_kargo_ucreti', 'deger' => '49.90']);
        Ayar::create(['anahtar' => 'bedava_kargo_limit', 'deger' => '500']);

        $kategoriler = [
            ['kategori_adi' => 'Hediyelik Eşya', 'slug' => 'hediyelik-esya', 'sira' => 1],
            ['kategori_adi' => 'Aksesuar', 'slug' => 'aksesuar', 'sira' => 2],
            ['kategori_adi' => 'Ev Dekorasyon', 'slug' => 'ev-dekorasyon', 'sira' => 3],
            ['kategori_adi' => 'Kıyafet', 'slug' => 'kiyafet', 'sira' => 4],
            ['kategori_adi' => 'Ofis Malzemeleri', 'slug' => 'ofis-malzemeleri', 'sira' => 5],
            ['kategori_adi' => 'Çanta', 'slug' => 'canta', 'sira' => 6],
            ['kategori_adi' => 'Takı', 'slug' => 'taki', 'sira' => 7],
            ['kategori_adi' => 'Seramik', 'slug' => 'seramik', 'sira' => 8],
        ];

        foreach ($kategoriler as $k) {
            Kategori::create($k + ['aktif' => true]);
        }

        $sss = [
            ['soru' => 'Siparişim ne zaman kargoya verilir?', 'cevap' => 'Kişiye özel ürünlerin hazırlanma süresi ürün detayında belirtilen teslim süresine göre değişmektedir. Genellikle 3-5 iş günü içerisinde kargoya verilir.', 'kategori' => 'Sipariş', 'sira' => 1],
            ['soru' => 'İade yapabilir miyim?', 'cevap' => 'Kişiye özel hazırlanan ürünlerde, ürünün size özel hazırlanması nedeniyle cayma hakkı bulunmamaktadır. Ancak üründe hata olması durumunda iade yapılabilir.', 'kategori' => 'İade', 'sira' => 2],
            ['soru' => 'Kargo ücreti ne kadar?', 'cevap' => '500 TL ve üzeri alışverişlerde kargo ücretsizdir. 500 TL altı alışverişlerde kargo ücreti 49.90 TL\'dir.', 'kategori' => 'Kargo', 'sira' => 3],
            ['soru' => 'Nasıl satıcı olabilirim?', 'cevap' => 'Sayfamızdaki "Satıcı Ol" butonuna tıklayarak başvuru formunu doldurabilirsiniz. Başvurunuz admin tarafından değerlendirilecektir.', 'kategori' => 'Satıcı', 'sira' => 4],
            ['soru' => 'Hangi ödeme yöntemleri var?', 'cevap' => 'Kredi kartı ile güvenli ödeme yapabilirsiniz. Tüm ödemeler 256-bit SSL sertifikası ile korunmaktadır.', 'kategori' => 'Ödeme', 'sira' => 5],
        ];

        foreach ($sss as $s) {
            Sss::create($s + ['aktif' => true]);
        }
    }
}
