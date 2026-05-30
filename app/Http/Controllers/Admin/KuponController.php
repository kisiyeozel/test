<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kupon;
use Illuminate\Http\Request;

class KuponController extends Controller
{
    public function index()
    {
        $kuponlar = Kupon::orderBy('id', 'desc')->paginate(20);
        return view('admin.kuponlar', compact('kuponlar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kupon_kodu' => 'required|string|max:50|unique:kuponlar',
            'indirim_turu' => 'required|in:yuzde,tutar',
            'indirim_miktari' => 'required|numeric|min:0',
            'min_sepet_tutari' => 'nullable|numeric|min:0',
            'max_kullanim' => 'nullable|integer|min:0',
            'baslangic_tarihi' => 'required|date',
            'bitis_tarihi' => 'required|date|after:baslangic_tarihi',
        ]);

        Kupon::create($request->only([
            'kupon_kodu', 'indirim_turu', 'indirim_miktari',
            'min_sepet_tutari', 'max_kullanim', 'baslangic_tarihi', 'bitis_tarihi',
        ]));

        return redirect()->route('admin.kuponlar')->with('success', 'Kupon oluşturuldu.');
    }

    public function destroy($id)
    {
        Kupon::findOrFail($id)->delete();
        return redirect()->route('admin.kuponlar')->with('success', 'Kupon silindi.');
    }

    public function edit($id)
    {
        $kupon = Kupon::findOrFail($id);
        return view('admin.kupon-duzenle', compact('kupon'));
    }

    public function update(Request $request, $id)
    {
        $kupon = Kupon::findOrFail($id);

        $request->validate([
            'kupon_kodu' => 'required|string|max:50|unique:kuponlar,kupon_kodu,' . $kupon->id,
            'indirim_turu' => 'required|in:yuzde,tutar',
            'indirim_miktari' => 'required|numeric|min:0',
            'min_sepet_tutari' => 'nullable|numeric|min:0',
            'max_kullanim' => 'nullable|integer|min:0',
            'baslangic_tarihi' => 'required|date',
            'bitis_tarihi' => 'required|date|after:baslangic_tarihi',
            'aktif' => 'nullable|in:0,1',
        ]);

        $kupon->update($request->only([
            'kupon_kodu', 'indirim_turu', 'indirim_miktari',
            'min_sepet_tutari', 'max_kullanim', 'baslangic_tarihi', 'bitis_tarihi', 'aktif',
        ]));

        return redirect()->route('admin.kuponlar')->with('success', 'Kupon güncellendi.');
    }
}
