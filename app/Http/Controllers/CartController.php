<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $araToplam = 0;
        foreach ($cart as $item) {
            $araToplam += $item['fiyat'] * $item['adet'];
        }
        $kargoUcreti = $araToplam >= 500 ? 0 : 49.90;
        return view('cart', compact('cart', 'araToplam', 'kargoUcreti'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:urunler,id',
            'adet' => 'required|integer|min:1',
            'varyant_id' => 'nullable|exists:urun_varyantlari,id',
        ]);

        $urun = Urun::aktif()->with('varyantlar')->findOrFail($request->id);

        $fiyat = $urun->fiyat;
        if ($request->varyant_id) {
            $varyant = $urun->varyantlar->find($request->varyant_id);
            if ($varyant) {
                $fiyat += $varyant->fiyat_farki;
            }
        }

        $kisisellestirme = $request->input('kisisellestirme', []);

        if ($request->hasFile('kisisellestirme.fotograf')) {
            $kisisellestirme['fotograf'] = $request->file('kisisellestirme.fotograf')->store('kisisellestirme', 'public');
        }

        $jsonKey = json_encode($kisisellestirme);
        $key = $urun->id . ($request->varyant_id ? '_' . $request->varyant_id : '') . md5($jsonKey);

        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['adet'] += $request->adet;
        } else {
            $cart[$key] = [
                'id' => $urun->id,
                'varyant_id' => $request->varyant_id,
                'ad' => $urun->urun_adi,
                'fiyat' => $fiyat,
                'resim' => $urun->ana_foto,
                'slug' => $urun->slug,
                'adet' => $request->adet,
                'kisisellestirme' => $kisisellestirme,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Ürün sepete eklendi.');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        foreach ($request->adet as $key => $adet) {
            if (isset($cart[$key])) {
                $cart[$key]['adet'] = max(1, (int)$adet);
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Sepet güncellendi.');
    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);
        unset($cart[$key]);
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Ürün sepetten çıkarıldı.');
    }
}
