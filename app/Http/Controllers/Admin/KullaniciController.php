<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class KullaniciController extends Controller
{
    public function index()
    {
        $kullanicilar = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.kullanicilar', compact('kullanicilar'));
    }

    public function detay($id)
    {
        $kullanici = User::with('magaza', 'siparisler.urunler', 'urunler')->findOrFail($id);
        return view('admin.kullanici-detay', compact('kullanici'));
    }

    public function durumGuncelle(Request $request, $id)
    {
        $kullanici = User::findOrFail($id);
        $request->validate(['durum' => 'required|in:aktif,pasif,banli']);
        $kullanici->update(['durum' => $request->durum]);
        return redirect()->route('admin.kullanicilar')->with('success', 'Kullanıcı durumu güncellendi.');
    }

    public function roleGuncelle(Request $request, $id)
    {
        $kullanici = User::findOrFail($id);
        $request->validate(['role' => 'required|in:admin,satici,musteri']);
        $kullanici->update(['role' => $request->role]);
        return redirect()->route('admin.kullanicilar')->with('success', 'Kullanıcı rolü güncellendi.');
    }
}
