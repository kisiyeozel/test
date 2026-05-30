<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use App\Models\SiparisUrun;
use App\Models\Urun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Sepetiniz boş.');
        }

        $araToplam = 0;
        foreach ($cart as $item) {
            $araToplam += $item['fiyat'] * $item['adet'];
        }

        $user = auth()->user();
        return view('checkout', compact('cart', 'araToplam', 'user'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Sepetiniz boş.');
        }

        $request->validate([
            'ad_soyad' => 'required|string|max:100',
            'telefon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'adres' => 'required|string',
            'sehir' => 'required|string|max:50',
            'ilce' => 'required|string|max:50',
            'posta_kodu' => 'nullable|string|max:20',
            'notlar' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $araToplam = 0;
            $siparisUrunleri = [];

            foreach ($cart as $item) {
                $urun = Urun::with('varyantlar')->findOrFail($item['id']);

                if ($urun->stok_durumu === 'yok') {
                    throw new \Exception("'{$item['ad']}' ürünü artık stokta bulunmamaktadır.");
                }

                $birimFiyat = (float) $urun->fiyat;
                $varyant = null;

                if (!empty($item['varyant_id'])) {
                    $varyant = $urun->varyantlar->find($item['varyant_id']);
                    if (!$varyant || $varyant->stok < $item['adet']) {
                        throw new \Exception("'{$item['ad']}' ürününün seçtiğiniz varyantı için yeterli stok kalmamıştır.");
                    }
                    $birimFiyat += (float) $varyant->fiyat_farki;
                }

                $toplam = $birimFiyat * $item['adet'];
                $araToplam += $toplam;

                $siparisUrunleri[] = [
                    'urun' => $urun,
                    'varyant' => $varyant,
                    'adet' => $item['adet'],
                    'birimFiyat' => $birimFiyat,
                    'toplam' => $toplam,
                    'varyant_id' => $item['varyant_id'] ?? null,
                    'urun_adi' => $item['ad'],
                    'urun_foto' => $item['resim'] ?? null,
                    'kisisellestirme' => $item['kisisellestirme'] ?? null,
                ];
            }

            $kargoUcreti = $araToplam >= 500 ? 0 : 49.90;

            $siparis = Siparis::create([
                'kullanici_id' => auth()->id(),
                'siparis_no' => 'SP-' . date('Ymd') . '-' . strtoupper(Str::random(8)),
                'ara_toplam' => $araToplam,
                'kargo_ucreti' => $kargoUcreti,
                'genel_toplam' => $araToplam + $kargoUcreti,
                'odeme_turu' => 'kredi_karti',
                'odeme_durumu' => 'beklemede',
                'siparis_durumu' => 'alinan',
                'ad_soyad' => $request->ad_soyad,
                'telefon' => $request->telefon,
                'email' => $request->email,
                'adres' => $request->adres,
                'sehir' => $request->sehir,
                'ilce' => $request->ilce,
                'posta_kodu' => $request->posta_kodu,
                'notlar' => $request->notlar,
            ]);

            foreach ($siparisUrunleri as $s) {
                SiparisUrun::create([
                    'siparis_id' => $siparis->id,
                    'urun_id' => $s['urun']->id,
                    'varyant_id' => $s['varyant_id'],
                    'urun_adi' => $s['urun_adi'],
                    'urun_foto' => $s['urun_foto'],
                    'birim_fiyat' => $s['birimFiyat'],
                    'adet' => $s['adet'],
                    'toplam' => $s['toplam'],
                    'kisisellestirme_bilgisi' => json_encode($s['kisisellestirme']),
                ]);

                $s['urun']->increment('satis_sayisi', $s['adet']);

                if ($s['varyant']) {
                    $s['varyant']->decrement('stok', $s['adet']);

                    if ($s['varyant']->stok <= 0 && $s['urun']->stok_durumu === 'var') {
                        $s['urun']->update(['stok_durumu' => 'tukendi']);
                    }
                }
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('payment.pay', $siparis->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function siparislerim()
    {
        $siparisler = Siparis::with('urunler', 'kargoTakip')
            ->where('kullanici_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('siparislerim', compact('siparisler'));
    }

    public function siparisDetay($id)
    {
        $siparis = Siparis::with('urunler.urun', 'kargoTakip')
            ->where('kullanici_id', auth()->id())
            ->findOrFail($id);

        return view('siparis-detay', compact('siparis'));
    }
}
