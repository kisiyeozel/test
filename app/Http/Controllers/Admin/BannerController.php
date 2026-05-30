<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $bannerlar = Banner::orderBy('pozisyon')->orderBy('sira')->get();
        return view('admin.bannerlar', compact('bannerlar'));
    }

    public function store(Request $request)
    {
        $banners = $request->input('banners', []);
        if (empty($banners)) {
            return redirect()->route('admin.bannerlar')->with('error', 'En az bir banner ekleyin.');
        }

        $files = $request->file('banners', []);
        $eklenen = 0;

        foreach ($banners as $idx => $data) {
            $hasFile = isset($files[$idx]['foto']) && $files[$idx]['foto']->isValid();
            if (!$hasFile) continue;

            $validator = validator($data, [
                'baslik' => 'required|string|max:200',
                'alt_baslik' => 'nullable|string|max:300',
                'link' => 'nullable|string|max:500',
                'pozisyon' => 'required|in:hero,sidebar,between,footer',
                'sira' => 'nullable|integer',
            ]);

            if ($validator->fails()) continue;

            $file = $files[$idx]['foto'];
            $filename = 'banner-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $stored = $file->storeAs('banner', $filename, 'public');
            if (!$stored) continue;

            Banner::create([
                'baslik' => $data['baslik'],
                'alt_baslik' => $data['alt_baslik'] ?? null,
                'link' => $data['link'] ?? null,
                'foto' => $filename,
                'pozisyon' => $data['pozisyon'] ?? 'hero',
                'sira' => $data['sira'] ?? 0,
                'aktif' => ($data['aktif'] ?? '1') === '1',
            ]);

            $eklenen++;
        }

        if ($eklenen > 0) {
            return redirect()->route('admin.bannerlar')->with('success', "$eklenen banner eklendi.");
        }

        return redirect()->route('admin.bannerlar')->with('error', 'Hiçbir banner eklenemedi. Dosya ve alanları kontrol edin.');
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $request->validate([
            'baslik' => 'required|string|max:200',
            'alt_baslik' => 'nullable|string|max:300',
            'link' => 'nullable|string|max:500',
            'pozisyon' => 'required|in:hero,sidebar,between,footer',
            'sira' => 'nullable|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = [
            'baslik' => $request->baslik,
            'alt_baslik' => $request->alt_baslik,
            'link' => $request->link,
            'pozisyon' => $request->pozisyon,
            'sira' => $request->sira ?? 0,
            'aktif' => $request->boolean('aktif', true),
        ];

        if ($request->hasFile('foto')) {
            $filename = 'banner-' . time() . '-' . Str::random(8) . '.' . $request->file('foto')->getClientOriginalExtension();
            $stored = $request->file('foto')->storeAs('banner', $filename, 'public');
            if (!$stored) {
                return redirect()->route('admin.bannerlar')->with('error', 'Dosya kaydedilemedi.');
            }
            $data['foto'] = $filename;
        }

        $banner->update($data);
        return redirect()->route('admin.bannerlar')->with('success', 'Banner güncellendi.');
    }

    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();
        return redirect()->route('admin.bannerlar')->with('success', 'Banner silindi.');
    }
}
