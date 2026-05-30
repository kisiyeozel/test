<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magaza;
use Illuminate\Http\Request;

class MagazaController extends Controller
{
    public function index()
    {
        $magazalar = Magaza::with('kullanici')->orderBy('id', 'desc')->paginate(20);
        return view('admin.magazalar', compact('magazalar'));
    }

    public function onayla($id)
    {
        $magaza = Magaza::with('kullanici')->findOrFail($id);
        $magaza->update(['durum' => 'onaylandi']);
        $magaza->kullanici->update(['role' => 'satici']);
        return redirect()->route('admin.magazalar')->with('success', 'Mağaza onaylandı.');
    }

    public function reddet($id)
    {
        $magaza = Magaza::findOrFail($id);
        $magaza->update(['durum' => 'reddedildi']);
        return redirect()->route('admin.magazalar')->with('success', 'Mağaza reddedildi.');
    }
}
