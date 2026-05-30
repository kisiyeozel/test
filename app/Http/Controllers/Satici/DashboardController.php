<?php

namespace App\Http\Controllers\Satici;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use App\Models\UrunSorusu;
use App\Models\Siparis;
use App\Models\SiparisUrun;
use App\Models\Magaza;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $magaza = Magaza::where('kullanici_id', $userId)->first();

        $toplamUrun = Urun::where('kullanici_id', $userId)->count();
        $aktifUrun = Urun::where('kullanici_id', $userId)->where('durum', 'onaylandi')->count();
        $bekleyenUrun = Urun::where('kullanici_id', $userId)->where('durum', 'beklemede')->count();

        $siparisIds = SiparisUrun::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->pluck('siparis_id');

        $toplamSiparis = Siparis::whereIn('id', $siparisIds)->count();
        $bekleyenSiparis = Siparis::whereIn('id', $siparisIds)->where('siparis_durumu', 'alinan')->count();

        $sonSiparisler = Siparis::whereIn('id', $siparisIds)
            ->with(['urunler.urun', 'kargoTakip'])->orderBy('id', 'desc')->take(5)->get();

        $bekleyenSoru = UrunSorusu::whereIn('urun_id', Urun::where('kullanici_id', $userId)->pluck('id'))
            ->where('durum', 'beklemede')
            ->count();

        return view('satici.dashboard', compact(
            'magaza', 'toplamUrun', 'aktifUrun', 'bekleyenUrun',
            'toplamSiparis', 'bekleyenSiparis', 'sonSiparisler', 'bekleyenSoru'
        ));
    }

    public function raporlar()
    {
        $userId = auth()->id();

        $siparisIds = SiparisUrun::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->pluck('siparis_id');

        $siparisler = Siparis::whereIn('id', $siparisIds)
            ->where('odeme_durumu', 'basarili')
            ->orderBy('id', 'desc')
            ->get();

        $aylikSatis = Siparis::whereIn('id', $siparisIds)
            ->where('odeme_durumu', 'basarili')
            ->selectRaw('MONTH(created_at) as ay, YEAR(created_at) as yil, SUM(genel_toplam) as toplam')
            ->groupBy('yil', 'ay')
            ->orderBy('yil', 'desc')
            ->orderBy('ay', 'desc')
            ->take(12)
            ->get();

        $toplamKazanc = $siparisler->sum('genel_toplam');

        return view('satici.raporlar', compact('siparisler', 'aylikSatis', 'toplamKazanc'));
    }

    public function sorular()
    {
        $userId = auth()->id();
        $urunIds = Urun::where('kullanici_id', $userId)->pluck('id');

        $sorular = UrunSorusu::with('urun')
            ->whereIn('urun_id', $urunIds)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('satici.sorular', compact('sorular'));
    }

    public function soruCevap($id, Request $request)
    {
        $userId = auth()->id();
        $soru = UrunSorusu::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->findOrFail($id);

        $request->validate(['cevap' => 'required|string']);
        $soru->update([
            'cevap' => $request->cevap,
            'durum' => 'yayinda',
            'cevaplanma_tarihi' => now(),
            'cevaplayan_id' => auth()->id(),
        ]);
        return back()->with('success', 'Soru cevaplandı.');
    }
}
