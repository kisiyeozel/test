<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Urun;
use App\Models\Magaza;
use App\Models\Blog;
use App\Models\Sss;
use App\Models\IletisimMesaji;
use App\Models\Yorum;
use App\Models\User;
use App\Models\Ayar;
use App\Models\UrunSorusu;
use App\Models\Banner;
use App\Models\BlogYorum;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    private function favoriIds()
    {
        if (!auth()->check()) return [];
        return \App\Models\Favori::where('kullanici_id', auth()->id())->pluck('urun_id')->toArray();
    }

    public function index()
    {
        $kategoriler = Kategori::whereNull('ust_id')->where('aktif', true)->withCount(['urunler' => function ($q) { $q->aktif(); }])->orderBy('sira')->get();
        $oneCikanUrunler = Urun::aktif()->oneCikan()->with('kategori', 'magaza')->withCount('sorular as soru_sayisi')->orderBy('id', 'desc')->take(8)->get();
        $yeniUrunler = Urun::aktif()->with('kategori', 'magaza')->withCount('sorular as soru_sayisi')->orderBy('id', 'desc')->take(8)->get();
        $cokSatanlar = Urun::aktif()->where('satis_sayisi', '>', 0)->withCount('sorular as soru_sayisi')->orderBy('satis_sayisi', 'desc')->take(8)->get();
        $magazalar = Magaza::where('durum', 'onaylandi')->with('kullanici')->withCount('urunler')->inRandomOrder()->take(6)->get();
        $kendiMarkamiz = Urun::aktif()->where('kullanici_id', 1)->withCount('sorular as soru_sayisi')->take(4)->get();
        $heroBannerlar = Banner::where('aktif', true)->where('pozisyon', 'hero')->orderBy('sira')->get();
        $betweenBannerlar = Banner::where('aktif', true)->where('pozisyon', 'between')->orderBy('sira')->get();
        $favoriIds = $this->favoriIds();

        $toplamUrun = Urun::where('durum', 'onaylandi')->count();
        $toplamMagaza = Magaza::where('durum', 'onaylandi')->count();
        $toplamMusteri = User::where('role', 'musteri')->count();
        $memnuniyet = round(Urun::where('durum', 'onaylandi')->where('yorum_sayisi', '>', 0)->avg('yorum_ortalamasi') * 20);

        return view('home', compact(
            'kategoriler', 'oneCikanUrunler', 'yeniUrunler', 'cokSatanlar',
            'magazalar', 'kendiMarkamiz', 'heroBannerlar', 'betweenBannerlar',
            'favoriIds', 'toplamUrun', 'toplamMagaza', 'toplamMusteri', 'memnuniyet'
        ));
    }

    public function kendiUrunlerimiz(Request $request)
    {
        $query = Urun::aktif()->where('kullanici_id', 1)->with('kategori', 'magaza')->withCount('sorular as soru_sayisi');

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }
        if ($request->siralama === 'artan') {
            $query->orderBy('fiyat');
        } elseif ($request->siralama === 'azalan') {
            $query->orderBy('fiyat', 'desc');
        } elseif ($request->siralama === 'yeni') {
            $query->orderBy('id', 'desc');
        } elseif ($request->siralama === 'cok_satan') {
            $query->orderBy('satis_sayisi', 'desc');
        } else {
            $query->orderBy('id', 'desc');
        }

        $urunler = $query->paginate(12);
        $favoriIds = $this->favoriIds();
        $kategoriler = Kategori::where('aktif', true)->orderBy('sira')->get();

        return view('kendi-urunlerimiz', compact('urunler', 'kategoriler', 'favoriIds'));
    }

    public function products(Request $request)
    {
        $query = Urun::aktif()->with('kategori', 'magaza')->withCount('sorular as soru_sayisi');
        $kategoriler = Kategori::where('aktif', true)->orderBy('sira')->get();

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }
        if ($request->min_fiyat) {
            $query->where('fiyat', '>=', $request->min_fiyat);
        }
        if ($request->max_fiyat) {
            $query->where('fiyat', '<=', $request->max_fiyat);
        }
        if ($request->siralama === 'artan') {
            $query->orderBy('fiyat');
        } elseif ($request->siralama === 'azalan') {
            $query->orderBy('fiyat', 'desc');
        } elseif ($request->siralama === 'yeni') {
            $query->orderBy('id', 'desc');
        } elseif ($request->siralama === 'cok_satan') {
            $query->orderBy('satis_sayisi', 'desc');
        } else {
            $query->orderBy('id', 'desc');
        }

        $urunler = $query->paginate(12);
        $favoriIds = $this->favoriIds();
        return view('products', compact('urunler', 'kategoriler', 'favoriIds'));
    }

    public function productDetail($slug)
    {
        $urun = Urun::aktif()->with('kategori', 'magaza', 'varyantlar', 'gorseller', 'etiketler', 'yorumlar.kullanici', 'sorular')
            ->where('slug', $slug)->firstOrFail();
        $urun->increment('goruntulenme');
        $benzerUrunler = Urun::aktif()->where('kategori_id', $urun->kategori_id)
            ->where('id', '!=', $urun->id)->withCount('sorular as soru_sayisi')->take(4)->get();
        $favoriIds = $this->favoriIds();
        return view('product-detail', compact('urun', 'benzerUrunler', 'favoriIds'));
    }

    public function category(Request $request, $slug)
    {
        $kategori = Kategori::where('slug', $slug)->where('aktif', true)->with('altKategoriler')->firstOrFail();
        $query = Urun::aktif()->where('kategori_id', $kategori->id)
            ->with('magaza')->withCount('sorular as soru_sayisi');

        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('fiyat');
                break;
            case 'price_desc':
                $query->orderBy('fiyat', 'desc');
                break;
            case 'popular':
                $query->orderBy('satis_sayisi', 'desc');
                break;
            default:
                $query->orderBy('id', 'desc');
                break;
        }

        $urunler = $query->paginate(12)->appends($request->query());
        $favoriIds = $this->favoriIds();
        return view('category', compact('kategori', 'urunler', 'favoriIds'));
    }

    public function magazalar()
    {
        $magazalar = Magaza::where('durum', 'onaylandi')->with('kullanici')->withCount('urunler')->orderBy('magaza_adi')->paginate(12);
        return view('magazalar', compact('magazalar'));
    }

    public function magaza($slug)
    {
        $magaza = Magaza::where('slug', $slug)->where('durum', 'onaylandi')->with('kullanici', 'gorseller')->firstOrFail();
        $urunler = Urun::aktif()->where('magaza_id', $magaza->id)
            ->with('kategori')->withCount('sorular as soru_sayisi')->orderBy('id', 'desc')->paginate(12);
        $favoriIds = $this->favoriIds();
        return view('magaza-detail', compact('magaza', 'urunler', 'favoriIds'));
    }

    public function searchSuggestions(Request $request)
    {
        $query = $request->q;
        if (!$query || strlen($query) < 2) {
            return response()->json(['products' => [], 'categories' => []]);
        }

        $products = Urun::aktif()->where('urun_adi', 'like', "%{$query}%")
            ->with('magaza')
            ->take(5)->get(['id', 'urun_adi', 'slug', 'ana_foto', 'fiyat']);

        $categories = Kategori::where('aktif', true)
            ->where('kategori_adi', 'like', "%{$query}%")
            ->take(5)->get(['id', 'kategori_adi', 'slug']);

        return response()->json([
            'products' => $products->map(fn($p) => [
                'id' => $p->id,
                'urun_adi' => $p->urun_adi,
                'slug' => $p->slug,
                'ana_foto' => $p->ana_foto,
                'fiyat' => $p->fiyat,
                'url' => route('product.detail', $p->slug),
            ]),
            'categories' => $categories->map(fn($c) => [
                'id' => $c->id,
                'kategori_adi' => $c->kategori_adi,
                'slug' => $c->slug,
                'url' => route('category', $c->slug),
            ]),
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $urunler = Urun::aktif()->where(function ($q) use ($query) {
            $q->where('urun_adi', 'like', "%{$query}%")
              ->orWhere('aciklama', 'like', "%{$query}%");
        })->with('kategori', 'magaza')->withCount('sorular as soru_sayisi')->orderBy('id', 'desc')->paginate(12);
        $favoriIds = $this->favoriIds();

        return view('search', compact('urunler', 'query', 'favoriIds'));
    }

    public function faq()
    {
        $sssListe = Sss::where('aktif', true)->orderBy('sira')->get()->groupBy('kategori');
        return view('sss', compact('sssListe'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'ad_soyad' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telefon' => 'nullable|string|max:20',
            'konu' => 'required|string|max:200',
            'mesaj' => 'required|string',
        ]);

        IletisimMesaji::create($request->all());
        return redirect()->route('contact')->with('success', 'Mesajınız başarıyla gönderildi.');
    }

    public function blog()
    {
        $yazilar = Blog::where('durum', 'yayinda')->with('kullanici')
            ->orderBy('id', 'desc')->paginate(9);
        return view('blog', compact('yazilar'));
    }

    public function soruSor(Request $request, $id)
    {
        $urun = Urun::findOrFail($id);
        $request->validate([
            'soru' => 'required|string|max:1000',
            'musteri_adi' => auth()->check() ? 'nullable' : 'required|string|max:100',
        ]);

        UrunSorusu::create([
            'urun_id' => $urun->id,
            'kullanici_id' => auth()->id(),
            'musteri_adi' => auth()->check() ? auth()->user()->ad_soyad : $request->musteri_adi,
            'soru' => $request->soru,
            'durum' => 'beklemede',
        ]);

        return back()->with('success', 'Sorunuz alınmıştır. En kısa sürede cevaplanacaktır.');
    }

    public function blogDetay($slug)
    {
        $yazi = Blog::where('slug', $slug)->where('durum', 'yayinda')->with('kullanici')->firstOrFail();
        $yazi->increment('goruntulenme');
        $yorumlar = BlogYorum::where('blog_id', $yazi->id)->where('onaylandi_mi', true)->orderBy('id', 'desc')->get();
        return view('blog-detay', compact('yazi', 'yorumlar'));
    }

    public function blogYorumEkle(Request $request, $slug)
    {
        $yazi = Blog::where('slug', $slug)->where('durum', 'yayinda')->firstOrFail();

        $request->validate([
            'ad_soyad' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'yorum' => 'required|string|max:2000',
        ]);

        BlogYorum::create([
            'blog_id' => $yazi->id,
            'kullanici_id' => auth()->id(),
            'ad_soyad' => $request->ad_soyad,
            'email' => $request->email,
            'yorum' => $request->yorum,
            'onaylandi_mi' => false,
        ]);

        return back()->with('success', 'Yorumunuz alınmıştır. Onaydan sonra yayınlanacaktır.');
    }

    public function hakkimizda()
    {
        return view('hakkimizda');
    }

    public function kullaniciSozlesmesi()
    {
        return view('kullanici-sozlesmesi');
    }

    public function mesafeliSatis()
    {
        return view('mesafeli-satis');
    }

    public function kvkk()
    {
        return view('kvkk');
    }

    public function saticiBasvuru()
    {
        if (auth()->check()) {
            $magaza = Magaza::where('kullanici_id', auth()->id())->first();
            if ($magaza) {
                return redirect()->route('home')->with('error', 'Zaten bir mağazanız bulunuyor.');
            }
        }
        return view('satici-basvuru');
    }

    public function saticiBasvuruStore(Request $request)
    {
        if (auth()->check()) {
            $magaza = Magaza::where('kullanici_id', auth()->id())->first();
            if ($magaza) {
                return redirect()->route('home')->with('error', 'Zaten bir mağazanız bulunuyor.');
            }
        }

        $request->validate([
            'magaza_adi' => 'required|string|max:100|unique:magazalar,magaza_adi',
            'telefon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'sehir' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'aciklama' => 'nullable|string',
            'slogan' => 'nullable|string|max:200',
        ]);

        if (!auth()->check()) {
            $request->validate([
                'ad_soyad' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:kullanicilar,email',
                'password' => 'required|min:8',
            ]);
            $user = User::create([
                'ad_soyad' => $request->ad_soyad,
                'email' => $request->email,
                'telefon' => $request->telefon,
                'sifre' => bcrypt($request->password),
                'role' => 'satici',
            ]);
            event(new Registered($user));
            auth()->login($user);
        }

        Magaza::create([
            'kullanici_id' => auth()->id(),
            'magaza_adi' => $request->magaza_adi,
            'slug' => Str::slug($request->magaza_adi) . '-' . time(),
            'slogan' => $request->slogan,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'sehir' => $request->sehir,
            'website' => $request->website,
            'adres' => $request->adres,
            'aciklama' => $request->aciklama,
            'durum' => 'beklemede',
        ]);

        return redirect()->route('home')->with('success', 'Mağaza başvurunuz alındı. En kısa sürede değerlendirilecektir.');
    }

    public function yorumEkle(Request $request)
    {
        $request->validate([
            'urun_id' => 'required|exists:urunler,id',
            'puan' => 'required|integer|min:1|max:5',
            'yorum' => 'required|string|max:2000',
        ]);

        $yorum = Yorum::create([
            'kullanici_id' => auth()->id(),
            'urun_id' => $request->urun_id,
            'puan' => $request->puan,
            'yorum' => $request->yorum,
            'durum' => 'beklemede',
        ]);

        return back()->with('success', 'Yorumunuz alınmıştır. Onaydan sonra yayınlanacaktır.');
    }
}
