<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::with('ustKategori')->orderBy('sira')->orderBy('id', 'desc')->get();
        $ustKategoriler = Kategori::whereNull('ust_id')->get();
        return view('admin.kategoriler', compact('kategoriler', 'ustKategoriler'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_adi' => 'required|string|max:100|unique:kategoriler',
            'ust_id' => 'nullable|exists:kategoriler,id',
            'aciklama' => 'nullable|string',
            'sira' => 'nullable|integer',
        ]);

        $data = [
            'kategori_adi' => $request->kategori_adi,
            'slug' => Str::slug($request->kategori_adi),
            'ust_id' => $request->ust_id,
            'aciklama' => $request->aciklama,
            'sira' => $request->sira ?? 0,
            'aktif' => true,
        ];

        if ($request->filled('en_kategori_adi') || $request->filled('en_aciklama')) {
            $data['translations'] = [
                'en' => [
                    'kategori_adi' => $request->en_kategori_adi ?? '',
                    'aciklama' => $request->en_aciklama ?? '',
                ],
            ];
        }

        Kategori::create($data);

        return redirect()->route('admin.kategoriler')->with('success', 'Kategori eklendi.');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $request->validate([
            'kategori_adi' => 'required|string|max:100|unique:kategoriler,kategori_adi,' . $id,
            'ust_id' => 'nullable|exists:kategoriler,id',
            'aciklama' => 'nullable|string',
            'sira' => 'nullable|integer',
            'aktif' => 'boolean',
        ]);

        $data = [
            'kategori_adi' => $request->kategori_adi,
            'slug' => Str::slug($request->kategori_adi),
            'ust_id' => $request->ust_id,
            'aciklama' => $request->aciklama,
            'sira' => $request->sira ?? 0,
            'aktif' => $request->boolean('aktif', true),
        ];

        $translations = $kategori->translations ?? [];
        $translations['en'] = [
            'kategori_adi' => $request->en_kategori_adi ?? ($translations['en']['kategori_adi'] ?? ''),
            'aciklama' => $request->en_aciklama ?? ($translations['en']['aciklama'] ?? ''),
        ];
        $data['translations'] = $translations;

        $kategori->update($data);

        return redirect()->route('admin.kategoriler')->with('success', 'Kategori güncellendi.');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('admin.kategoriler')->with('success', 'Kategori silindi.');
    }
}
