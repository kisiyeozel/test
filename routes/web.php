<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\PaymentController;
use App\Models\Kategori;
use App\Models\Urun;
use App\Models\Blog;
use App\Http\Controllers\Satici\MagazaController;
use App\Http\Controllers\Satici\UrunController as SaticiUrunController;
use App\Http\Controllers\Satici\SiparisController as SaticiSiparisController;
use App\Http\Controllers\Satici\DashboardController as SaticiDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KullaniciController;
use App\Http\Controllers\Admin\UrunController as AdminUrunController;
use App\Http\Controllers\Admin\MagazaController as AdminMagazaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\SiparisController as AdminSiparisController;
use App\Http\Controllers\Admin\AyarController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\KuponController;
use App\Http\Controllers\Admin\YorumController as AdminYorumController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    $staticPages = [
        ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
        ['loc' => route('products'), 'priority' => '0.9', 'changefreq' => 'daily'],
        ['loc' => route('magazalar'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => route('kendi-urunlerimiz'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => route('blog'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => route('faq'), 'priority' => '0.5', 'changefreq' => 'monthly'],
        ['loc' => route('contact'), 'priority' => '0.5', 'changefreq' => 'monthly'],
        ['loc' => route('hakkimizda'), 'priority' => '0.5', 'changefreq' => 'monthly'],
    ];

    $kategoriler = Kategori::where('aktif', true)->get()->map(fn($k) => [
        'loc' => route('category', $k->slug), 'priority' => '0.7', 'changefreq' => 'weekly',
    ]);

    $urunler = Urun::where('durum', 'onaylandi')->get()->map(fn($u) => [
        'loc' => route('product.detail', $u->slug), 'priority' => '0.9', 'changefreq' => 'weekly',
    ]);

    $blog = Blog::where('durum', 'yayinda')->get()->map(fn($b) => [
        'loc' => route('blog.detail', $b->slug), 'priority' => '0.7', 'changefreq' => 'monthly',
    ]);

    $urls = collect($staticPages)->merge($kategoriler)->merge($urunler)->merge($blog);

    return response()->view('sitemap', compact('urls'))->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/urunler', [HomeController::class, 'products'])->name('products');
Route::get('/kisiyeozel-urunleri', [HomeController::class, 'kendiUrunlerimiz'])->name('kendi-urunlerimiz');
Route::get('/urun/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/kategori/{slug}', [HomeController::class, 'category'])->name('category');
Route::get('/magazalar', [HomeController::class, 'magazalar'])->name('magazalar');
Route::get('/magaza/{slug}', [HomeController::class, 'magaza'])->name('magaza.detail');
Route::get('/arama', [HomeController::class, 'search'])->name('search');
Route::get('/arama-suggestions', [HomeController::class, 'searchSuggestions'])->name('search.suggestions');

Route::get('/sss', [HomeController::class, 'faq'])->name('faq');
Route::get('/iletisim', [HomeController::class, 'contact'])->name('contact');
Route::post('/iletisim', [HomeController::class, 'contactStore'])->name('contact.store');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetay'])->name('blog.detail');
Route::post('/blog/{slug}/yorum', [HomeController::class, 'blogYorumEkle'])->name('blog.yorum');

Route::get('/hakkimizda', [HomeController::class, 'hakkimizda'])->name('hakkimizda');
Route::get('/kullanici-sozlesmesi', [HomeController::class, 'kullaniciSozlesmesi'])->name('kullanici-sozlesmesi');
Route::get('/mesafeli-satis', [HomeController::class, 'mesafeliSatis'])->name('mesafeli-satis');
Route::get('/kvkk', [HomeController::class, 'kvkk'])->name('kvkk');

Route::get('/satici-basvuru', [HomeController::class, 'saticiBasvuru'])->name('satici-basvuru');
Route::post('/satici-basvuru', [HomeController::class, 'saticiBasvuruStore'])->name('satici-basvuru.store');

Route::get('/sepet', [CartController::class, 'index'])->name('cart');
Route::post('/sepet/ekle', [CartController::class, 'add'])->name('cart.add');
Route::post('/sepet/guncelle', [CartController::class, 'update'])->name('cart.update');
Route::get('/sepet/sil/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/odeme', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/odeme', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/siparislerim', [CheckoutController::class, 'siparislerim'])->name('siparislerim');
    Route::get('/siparis/{id}', [CheckoutController::class, 'siparisDetay'])->name('siparis.detay');
});

Route::post('/odeme/bildirim', [PaymentController::class, 'callback'])->name('payment.callback');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/odeme/pay/{siparisId}', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('/odeme/basari', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/odeme/basarisiz', [PaymentController::class, 'fail'])->name('payment.fail');

    Route::get('/favoriler', [FavoriController::class, 'index'])->name('favoriler');
    Route::post('/favori/ekle/{urunId}', [FavoriController::class, 'add'])->name('favori.add');
    Route::delete('/favori/sil/{id}', [FavoriController::class, 'remove'])->name('favori.remove');
    Route::post('/favori/toggle/{urunId}', [FavoriController::class, 'toggle'])->name('favori.toggle');

    Route::post('/yorum/ekle', [HomeController::class, 'yorumEkle'])->name('yorum.ekle');
    Route::post('/urun/{id}/soru-sor', [HomeController::class, 'soruSor'])->name('urun.soru-sor');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('satici')->prefix('satici')->name('satici.')->group(function () {
        Route::get('/dashboard', [SaticiDashboardController::class, 'index'])->name('dashboard');
        Route::get('/magaza', [MagazaController::class, 'index'])->name('magaza');
        Route::post('/magaza/kaydet', [MagazaController::class, 'store'])->name('magaza.store');
        Route::post('/magaza/guncelle', [MagazaController::class, 'update'])->name('magaza.update');
        Route::get('/galeri', [MagazaController::class, 'galeri'])->name('galeri');
        Route::post('/galeri/yukle', [MagazaController::class, 'galeriYukle'])->name('galeri-yukle');
        Route::delete('/galeri/{id}', [MagazaController::class, 'galeriSil'])->name('galeri-sil');
        Route::post('/galeri/sira', [MagazaController::class, 'galeriSira'])->name('galeri-sira');
        Route::get('/urunler', [SaticiUrunController::class, 'index'])->name('urunler');
        Route::get('/urun-ekle', [SaticiUrunController::class, 'create'])->name('urun-ekle');
        Route::post('/urun-kaydet', [SaticiUrunController::class, 'store'])->name('urun-kaydet');
        Route::get('/urun-duzenle/{id}', [SaticiUrunController::class, 'edit'])->name('urun-duzenle');
        Route::post('/urun-guncelle/{id}', [SaticiUrunController::class, 'update'])->name('urun-guncelle');
        Route::delete('/urun-sil/{id}', [SaticiUrunController::class, 'destroy'])->name('urun-sil');
        Route::get('/varyant/{id}', [SaticiUrunController::class, 'varyantlar'])->name('varyantlar');
        Route::post('/varyant/kaydet', [SaticiUrunController::class, 'varyantKaydet'])->name('varyant-kaydet');
        Route::delete('/varyant/sil/{id}', [SaticiUrunController::class, 'varyantSil'])->name('varyant-sil');
        Route::get('/siparisler', [SaticiSiparisController::class, 'index'])->name('siparisler');
        Route::get('/siparis/{id}', [SaticiSiparisController::class, 'detay'])->name('siparis-detay');
        Route::post('/siparis/{id}/durum', [SaticiSiparisController::class, 'durumGuncelle'])->name('siparis-durum');
        Route::post('/siparis/{id}/kargo', [SaticiSiparisController::class, 'kargoEkle'])->name('siparis-kargo');
        Route::get('/raporlar', [SaticiDashboardController::class, 'raporlar'])->name('raporlar');
        Route::get('/sorular', [SaticiDashboardController::class, 'sorular'])->name('sorular');
        Route::post('/soru/{id}/cevapla', [SaticiDashboardController::class, 'soruCevap'])->name('soru-cevapla');
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/kullanicilar', [KullaniciController::class, 'index'])->name('kullanicilar');
        Route::get('/kullanici/{id}', [KullaniciController::class, 'detay'])->name('kullanici-detay');
        Route::post('/kullanici/{id}/durum', [KullaniciController::class, 'durumGuncelle'])->name('kullanici-durum');
        Route::post('/kullanici/{id}/role', [KullaniciController::class, 'roleGuncelle'])->name('kullanici-role');
        Route::get('/urunler', [AdminUrunController::class, 'index'])->name('urunler');
        Route::get('/urun/{id}/onayla', [AdminUrunController::class, 'onayla'])->name('urun-onayla');
        Route::get('/urun/{id}/reddet', [AdminUrunController::class, 'reddet'])->name('urun-reddet');
        Route::delete('/urun/{id}', [AdminUrunController::class, 'destroy'])->name('urun-sil');
        Route::get('/magazalar', [AdminMagazaController::class, 'index'])->name('magazalar');
        Route::get('/magaza/{id}/onayla', [AdminMagazaController::class, 'onayla'])->name('magaza-onayla');
        Route::get('/magaza/{id}/reddet', [AdminMagazaController::class, 'reddet'])->name('magaza-reddet');
        Route::get('/siparisler', [AdminSiparisController::class, 'index'])->name('siparisler');
        Route::get('/siparis/{id}', [AdminSiparisController::class, 'detay'])->name('siparis-detay');
        Route::get('/kategoriler', [KategoriController::class, 'index'])->name('kategoriler');
        Route::post('/kategori-ekle', [KategoriController::class, 'store'])->name('kategori-ekle');
        Route::post('/kategori-guncelle/{id}', [KategoriController::class, 'update'])->name('kategori-guncelle');
        Route::delete('/kategori-sil/{id}', [KategoriController::class, 'destroy'])->name('kategori-sil');
        Route::get('/ayarlar', [AyarController::class, 'index'])->name('ayarlar');
        Route::post('/ayarlar', [AyarController::class, 'update'])->name('ayarlar.update');
        Route::get('/kuponlar', [KuponController::class, 'index'])->name('kuponlar');
        Route::post('/kupon-ekle', [KuponController::class, 'store'])->name('kupon-ekle');
        Route::delete('/kupon-sil/{id}', [KuponController::class, 'destroy'])->name('kupon-sil');
        Route::get('/yorumlar', [AdminYorumController::class, 'index'])->name('yorumlar');
        Route::get('/yorum/{id}/onayla', [AdminYorumController::class, 'onayla'])->name('yorum-onayla');
        Route::delete('/yorum/{id}', [AdminYorumController::class, 'destroy'])->name('yorum-sil');
        Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
        Route::post('/blog-ekle', [AdminController::class, 'blogEkle'])->name('blog-ekle');
        Route::get('/blog/{id}/duzenle', [AdminController::class, 'blogDuzenle'])->name('blog-duzenle');
        Route::post('/blog/{id}/guncelle', [AdminController::class, 'blogGuncelle'])->name('blog-guncelle');
        Route::delete('/blog-sil/{id}', [AdminController::class, 'blogSil'])->name('blog-sil');
        Route::post('/blog-resim-yukle', [AdminController::class, 'blogResimYukle'])->name('blog-resim-yukle');
        Route::get('/mesajlar', [AdminController::class, 'mesajlar'])->name('mesajlar');
        Route::get('/mesaj/{id}', [AdminController::class, 'mesajDetay'])->name('mesaj-detay');
        Route::get('/sorular', [AdminController::class, 'sorular'])->name('sorular');
        Route::post('/soru/{id}/cevapla', [AdminController::class, 'soruCevap'])->name('soru-cevapla');
        Route::delete('/soru/{id}', [AdminController::class, 'soruSil'])->name('soru-sil');
        Route::get('/bannerlar', [BannerController::class, 'index'])->name('bannerlar');
        Route::post('/banner-ekle', [BannerController::class, 'store'])->name('banner-ekle');
        Route::post('/banner-guncelle/{id}', [BannerController::class, 'update'])->name('banner-guncelle');
        Route::delete('/banner-sil/{id}', [BannerController::class, 'destroy'])->name('banner-sil');
        Route::get('/blog-yorumlar', [AdminController::class, 'blogYorumlar'])->name('blog-yorumlar');
        Route::get('/blog-yorum/{id}/onayla', [AdminController::class, 'blogYorumOnayla'])->name('blog-yorum-onayla');
        Route::delete('/blog-yorum/{id}', [AdminController::class, 'blogYorumSil'])->name('blog-yorum-sil');
    });
});

require __DIR__.'/auth.php';
