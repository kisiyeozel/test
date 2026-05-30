<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use App\Models\Urun;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    public function index()
    {
        $favoriler = Favori::where('kullanici_id', auth()->id())
            ->with('urun.kategori', 'urun.magaza')
            ->orderBy('id', 'desc')
            ->get();
        return view('favoriler', compact('favoriler'));
    }

    public function add($urunId)
    {
        $urun = Urun::findOrFail($urunId);
        $favori = Favori::firstOrCreate([
            'kullanici_id' => auth()->id(),
            'urun_id' => $urun->id,
        ]);

        return back()->with('success', 'Ürün favorilere eklendi.');
    }

    public function remove($id)
    {
        $favori = Favori::where('id', $id)->where('kullanici_id', auth()->id())->firstOrFail();
        $favori->delete();

        return back()->with('success', 'Ürün favorilerden çıkarıldı.');
    }

    public function toggle($urunId)
    {
        $favori = Favori::where('kullanici_id', auth()->id())->where('urun_id', $urunId)->first();
        if ($favori) {
            $favori->delete();
            $eklendi = false;
        } else {
            Favori::create(['kullanici_id' => auth()->id(), 'urun_id' => $urunId]);
            $eklendi = true;
        }

        if (request()->wantsJson()) {
            return response()->json(['favori' => $eklendi]);
        }
        return back();
    }
}
