<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siparis;
use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function index()
    {
        $siparisler = Siparis::with('kullanici', 'urunler')->orderBy('id', 'desc')->paginate(20);
        return view('admin.siparisler', compact('siparisler'));
    }

    public function detay($id)
    {
        $siparis = Siparis::with('kullanici', 'urunler.urun', 'kargoTakip')->findOrFail($id);
        return view('admin.siparis-detay', compact('siparis'));
    }
}
