<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Yorum;
use Illuminate\Http\Request;

class YorumController extends Controller
{
    public function index()
    {
        $yorumlar = Yorum::with('kullanici', 'urun')->orderBy('id', 'desc')->paginate(20);
        return view('admin.yorumlar', compact('yorumlar'));
    }

    public function onayla($id)
    {
        $yorum = Yorum::findOrFail($id);
        $yorum->update(['durum' => 'onayli']);

        $yorum->urun->update([
            'yorum_ortalamasi' => Yorum::where('urun_id', $yorum->urun_id)
                ->where('durum', 'onayli')->avg('puan') ?? 0,
            'yorum_sayisi' => Yorum::where('urun_id', $yorum->urun_id)
                ->where('durum', 'onayli')->count(),
        ]);

        return redirect()->route('admin.yorumlar')->with('success', 'Yorum onaylandı.');
    }

    public function destroy($id)
    {
        Yorum::findOrFail($id)->delete();
        return redirect()->route('admin.yorumlar')->with('success', 'Yorum silindi.');
    }
}
