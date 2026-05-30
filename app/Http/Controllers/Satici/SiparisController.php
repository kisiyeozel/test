<?php

namespace App\Http\Controllers\Satici;

use App\Http\Controllers\Controller;
use App\Models\Siparis;
use App\Models\SiparisUrun;
use App\Models\KargoTakip;
use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $siparisIds = SiparisUrun::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->pluck('siparis_id');

        $siparisler = Siparis::whereIn('id', $siparisIds)
            ->with(['urunler.urun', 'kargoTakip', 'kullanici'])
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('satici.siparisler', compact('siparisler'));
    }

    public function detay($id)
    {
        $userId = auth()->id();
        $siparisIds = SiparisUrun::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->pluck('siparis_id');

        $siparis = Siparis::whereIn('id', $siparisIds)
            ->with(['urunler.urun', 'kargoTakip', 'kullanici'])
            ->findOrFail($id);

        return view('satici.siparis-detay', compact('siparis'));
    }

    public function durumGuncelle(Request $request, $id)
    {
        $userId = auth()->id();
        $siparisIds = SiparisUrun::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->pluck('siparis_id');

        $siparis = Siparis::whereIn('id', $siparisIds)->findOrFail($id);
        $request->validate(['durum' => 'required|in:hazirlaniyor,kargoya_verildi,teslim_edildi']);
        $siparis->update(['siparis_durumu' => $request->durum]);

        return redirect()->route('satici.siparisler')->with('success', 'Sipariş durumu güncellendi.');
    }

    public function kargoEkle(Request $request, $id)
    {
        $userId = auth()->id();
        $siparisIds = SiparisUrun::whereHas('urun', function ($q) use ($userId) {
            $q->where('kullanici_id', $userId);
        })->pluck('siparis_id');

        $siparis = Siparis::whereIn('id', $siparisIds)->findOrFail($id);

        $request->validate([
            'kargo_firmasi' => 'required|string|max:100',
            'takip_kodu' => 'required|string|max:100',
        ]);

        KargoTakip::updateOrCreate(
            ['siparis_id' => $siparis->id],
            [
                'kargo_firmasi' => $request->kargo_firmasi,
                'takip_kodu' => $request->takip_kodu,
                'durum' => 'kargoya_verildi',
            ]
        );

        $siparis->update([
            'siparis_durumu' => 'kargoya_verildi',
            'kargo_firmasi' => $request->kargo_firmasi,
            'takip_kodu' => $request->takip_kodu,
        ]);

        return redirect()->route('satici.siparis-detay', $siparis->id)
            ->with('success', 'Kargo bilgisi eklendi.');
    }
}
