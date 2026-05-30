<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Urun;
use App\Models\Magaza;
use App\Models\Siparis;
use App\Models\IletisimMesaji;
use App\Models\Blog;
use App\Models\UrunSorusu;
use App\Models\BlogYorum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'toplamKullanici' => User::count(),
            'toplamSatici' => User::where('role', 'satici')->count(),
            'toplamMusteri' => User::where('role', 'musteri')->count(),
            'toplamUrun' => Urun::count(),
            'bekleyenUrun' => Urun::where('durum', 'beklemede')->count(),
            'onaylananUrun' => Urun::where('durum', 'onaylandi')->count(),
            'bekleyenMagaza' => Magaza::where('durum', 'beklemede')->count(),
            'onaylananMagaza' => Magaza::where('durum', 'onaylandi')->count(),
            'toplamSiparis' => Siparis::count(),
            'bekleyenSiparis' => Siparis::where('siparis_durumu', 'alinan')->count(),
            'toplamCiro' => Siparis::where('odeme_durumu', 'basarili')->sum('genel_toplam'),
            'okunmamisMesaj' => IletisimMesaji::where('okundu_mu', false)->count(),
            'bekleyenSoru' => UrunSorusu::where('durum', 'beklemede')->count(),
        ];
        return view('admin.dashboard', compact('data'));
    }

    public function blog()
    {
        $yazilar = Blog::with('kullanici')->orderBy('id', 'desc')->paginate(20);
        return view('admin.blog', compact('yazilar'));
    }

    public function blogEkle(Request $request)
    {
        $request->validate([
            'baslik' => 'required|string|max:200',
            'icerik' => 'required|string',
            'durum' => 'required|in:taslak,yayinda',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'blog-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blog', $filename, 'public');
            $fotoPath = $filename;
        }

        Blog::create([
            'kullanici_id' => auth()->id(),
            'baslik' => $request->baslik,
            'slug' => Str::slug($request->baslik) . '-' . time(),
            'icerik' => $request->icerik,
            'ozet' => $request->ozet,
            'durum' => $request->durum,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.blog')->with('success', 'Blog yazısı eklendi.');
    }

    public function blogSil($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blog')->with('success', 'Blog yazısı silindi.');
    }

    public function blogDuzenle($id)
    {
        $yazi = Blog::findOrFail($id);
        return view('admin.blog-duzenle', compact('yazi'));
    }

    public function blogGuncelle(Request $request, $id)
    {
        $yazi = Blog::findOrFail($id);
        $request->validate([
            'baslik' => 'required|string|max:200',
            'icerik' => 'required|string',
            'durum' => 'required|in:taslak,yayinda',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = [
            'baslik' => $request->baslik,
            'slug' => Str::slug($request->baslik) . '-' . time(),
            'icerik' => $request->icerik,
            'ozet' => $request->ozet,
            'durum' => $request->durum,
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'blog-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blog', $filename, 'public');
            $data['foto'] = $filename;
        }

        $yazi->update($data);

        return redirect()->route('admin.blog')->with('success', 'Blog yazısı güncellendi.');
    }

    public function blogResimYukle(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $file = $request->file('file');
        $filename = 'blog-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/blog', $filename);

        return response()->json([
            'location' => asset('storage/blog/' . $filename),
        ]);
    }

    public function mesajlar()
    {
        $mesajlar = IletisimMesaji::orderBy('id', 'desc')->paginate(20);
        return view('admin.mesajlar', compact('mesajlar'));
    }

    public function mesajDetay($id)
    {
        $mesaj = IletisimMesaji::findOrFail($id);
        if (!$mesaj->okundu_mu) {
            $mesaj->update(['okundu_mu' => true]);
        }
        return view('admin.mesaj-detay', compact('mesaj'));
    }

    public function sorular()
    {
        $sorular = UrunSorusu::with('urun', 'kullanici')->orderBy('id', 'desc')->paginate(20);
        return view('admin.sorular', compact('sorular'));
    }

    public function soruCevap($id, Request $request)
    {
        $soru = UrunSorusu::findOrFail($id);
        $request->validate(['cevap' => 'required|string']);
        $soru->update([
            'cevap' => $request->cevap,
            'durum' => 'yayinda',
            'cevaplanma_tarihi' => now(),
            'cevaplayan_id' => auth()->id(),
        ]);
        return back()->with('success', 'Soru cevaplandı.');
    }

    public function soruSil($id)
    {
        UrunSorusu::findOrFail($id)->delete();
        return back()->with('success', 'Soru silindi.');
    }

    public function blogYorumlar()
    {
        $yorumlar = BlogYorum::with('blog')->orderBy('id', 'desc')->paginate(20);
        return view('admin.blog-yorumlar', compact('yorumlar'));
    }

    public function blogYorumOnayla($id)
    {
        BlogYorum::findOrFail($id)->update(['onaylandi_mi' => true]);
        return back()->with('success', 'Yorum onaylandı.');
    }

    public function blogYorumSil($id)
    {
        BlogYorum::findOrFail($id)->delete();
        return back()->with('success', 'Yorum silindi.');
    }
}
