<?php

namespace App\Http\Controllers\Satici;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use App\Models\Kategori;
use App\Models\Magaza;
use App\Models\UrunVaryant;
use App\Models\UrunGorsel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrunController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $urunler = Urun::where('kullanici_id', $userId)->with('kategori', 'varyantlar')->orderBy('id', 'desc')->paginate(20);
        return view('satici.urunler', compact('urunler'));
    }

    public function create()
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->where('durum', 'onaylandi')->first();
        if (!$magaza) {
            return redirect()->route('satici.magaza')->with('error', 'Önce mağaza açmalı ve onay almalısınız.');
        }
        $kategoriler = Kategori::where('aktif', true)->orderBy('sira')->get();
        return view('satici.urun-ekle', compact('kategoriler', 'magaza'));
    }

    public function store(Request $request)
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->where('durum', 'onaylandi')->firstOrFail();

        $request->validate([
            'urun_adi' => 'required|string|max:200',
            'kategori_id' => 'required|exists:kategoriler,id',
            'fiyat' => 'required|numeric|min:0',
            'aciklama' => 'nullable|string',
            'kisa_aciklama' => 'nullable|string|max:300',
            'ana_foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'teslim_suresi' => 'nullable|integer|min:1',
            'stok_durumu' => 'required|in:var,yok,tukendi',
        ]);

        $data = [
            'kullanici_id' => auth()->id(),
            'magaza_id' => $magaza->id,
            'kategori_id' => $request->kategori_id,
            'urun_adi' => $request->urun_adi,
            'slug' => Str::slug($request->urun_adi) . '-' . time(),
            'aciklama' => $request->aciklama,
            'kisa_aciklama' => $request->kisa_aciklama,
            'fiyat' => $request->fiyat,
            'kisinin_adi' => $request->boolean('kisinin_adi'),
            'fotograf_yukle' => $request->boolean('fotograf_yukle'),
            'renk_secimi' => $request->boolean('renk_secimi'),
            'olcu_secimi' => $request->boolean('olcu_secimi'),
            'ozel_not' => $request->boolean('ozel_not'),
            'varyant_renk' => $request->boolean('varyant_renk'),
            'varyant_beden' => $request->boolean('varyant_beden'),
            'varyant_olcu' => $request->boolean('varyant_olcu'),
            'varyant_yazi_tipi' => $request->boolean('varyant_yazi_tipi'),
            'teslim_suresi' => $request->teslim_suresi ?? 3,
            'stok_durumu' => $request->stok_durumu,
            'durum' => 'beklemede',
        ];

        if ($request->hasFile('ana_foto')) {
            $data['ana_foto'] = $request->file('ana_foto')->store('urunler', 'public');
        }

        $urun = Urun::create($data);

        return redirect()->route('satici.urunler')->with('success', 'Ürün eklendi. Admin onayından sonra yayına girecektir.');
    }

    public function edit($id)
    {
        $urun = Urun::where('id', $id)->where('kullanici_id', auth()->id())->with('varyantlar', 'gorseller')->firstOrFail();
        $kategoriler = Kategori::where('aktif', true)->orderBy('sira')->get();
        $magaza = Magaza::where('kullanici_id', auth()->id())->where('durum', 'onaylandi')->first();
        return view('satici.urun-duzenle', compact('urun', 'kategoriler', 'magaza'));
    }

    public function update(Request $request, $id)
    {
        $urun = Urun::where('id', $id)->where('kullanici_id', auth()->id())->firstOrFail();

        $request->validate([
            'urun_adi' => 'required|string|max:200',
            'kategori_id' => 'required|exists:kategoriler,id',
            'fiyat' => 'required|numeric|min:0',
            'aciklama' => 'nullable|string',
            'ana_foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        ]);

        $data = [
            'urun_adi' => $request->urun_adi,
            'kategori_id' => $request->kategori_id,
            'aciklama' => $request->aciklama,
            'kisa_aciklama' => $request->kisa_aciklama,
            'fiyat' => $request->fiyat,
            'kisinin_adi' => $request->boolean('kisinin_adi'),
            'fotograf_yukle' => $request->boolean('fotograf_yukle'),
            'renk_secimi' => $request->boolean('renk_secimi'),
            'olcu_secimi' => $request->boolean('olcu_secimi'),
            'ozel_not' => $request->boolean('ozel_not'),
            'varyant_renk' => $request->boolean('varyant_renk'),
            'varyant_beden' => $request->boolean('varyant_beden'),
            'varyant_olcu' => $request->boolean('varyant_olcu'),
            'varyant_yazi_tipi' => $request->boolean('varyant_yazi_tipi'),
            'teslim_suresi' => $request->teslim_suresi ?? 3,
            'stok_durumu' => $request->stok_durumu ?? 'var',
        ];

        if ($request->hasFile('ana_foto')) {
            $data['ana_foto'] = $request->file('ana_foto')->store('urunler', 'public');
        }

        $urun->update($data);

        return redirect()->route('satici.urunler')->with('success', 'Ürün güncellendi.');
    }

    public function destroy($id)
    {
        $urun = Urun::where('id', $id)->where('kullanici_id', auth()->id())->firstOrFail();
        $urun->delete();
        return redirect()->route('satici.urunler')->with('success', 'Ürün silindi.');
    }

    public function varyantlar($id)
    {
        $urun = Urun::where('id', $id)->where('kullanici_id', auth()->id())->with('varyantlar')->firstOrFail();
        return view('satici.varyantlar', compact('urun'));
    }

    public function varyantKaydet(Request $request)
    {
        $request->validate([
            'urun_id' => 'required|exists:urunler,id',
            'tur' => 'required|string|max:50',
            'deger' => 'required|string|max:100',
            'fiyat_farki' => 'nullable|numeric|min:0',
            'stok' => 'nullable|integer|min:0',
        ]);

        $urun = Urun::where('id', $request->urun_id)->where('kullanici_id', auth()->id())->firstOrFail();

        UrunVaryant::create([
            'urun_id' => $urun->id,
            'tur' => $request->tur,
            'deger' => $request->deger,
            'fiyat_farki' => $request->fiyat_farki ?? 0,
            'stok' => $request->stok ?? 0,
            'sira' => UrunVaryant::where('urun_id', $urun->id)->count() + 1,
        ]);

        return redirect()->route('satici.varyantlar', $urun->id)
            ->with('success', 'Varyant eklendi.');
    }

    public function varyantSil($id)
    {
        $varyant = UrunVaryant::whereHas('urun', function ($q) {
            $q->where('kullanici_id', auth()->id());
        })->findOrFail($id);

        $urunId = $varyant->urun_id;
        $varyant->delete();

        return redirect()->route('satici.varyantlar', $urunId)
            ->with('success', 'Varyant silindi.');
    }
}
