<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    public function index()
    {
        $urunler = Urun::with('kullanici', 'kategori', 'magaza')->orderBy('id', 'desc')->paginate(20);
        return view('admin.urunler', compact('urunler'));
    }

    public function onayla($id)
    {
        $urun = Urun::findOrFail($id);
        $urun->update(['durum' => 'onaylandi']);
        return redirect()->route('admin.urunler')->with('success', 'Ürün onaylandı.');
    }

    public function reddet($id)
    {
        $urun = Urun::findOrFail($id);
        $urun->update(['durum' => 'reddedildi']);
        return redirect()->route('admin.urunler')->with('success', 'Ürün reddedildi.');
    }

    public function destroy($id)
    {
        Urun::findOrFail($id)->delete();
        return redirect()->route('admin.urunler')->with('success', 'Ürün silindi.');
    }
}
