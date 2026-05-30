<?php

namespace App\Http\Controllers\Satici;

use App\Http\Controllers\Controller;
use App\Models\Magaza;
use App\Models\MagazaGorsel;
use App\Services\MagazaGorselService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MagazaController extends Controller
{
    protected function buildSlogan($input)
    {
        $prefix = 'Biz kişiye özel ';
        $default = 'ürünler tasarlanıyoruz';
        $slogan = $input ?: $default;
        
        if (str_starts_with($slogan, $prefix)) {
            $slogan = substr($slogan, strlen($prefix));
        }
        
        return $prefix . $slogan;
    }

    protected function sanitizeUtf8($value)
    {
        return $value ? iconv('UTF-8', 'UTF-8//IGNORE', $value) : null;
    }

    public function index()
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->first();
        return view('satici.magaza', compact('magaza'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'magaza_adi' => 'required|string|max:100|unique:magazalar,magaza_adi',
            'telefon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'aciklama' => 'nullable|string',
            'slogan' => 'nullable|string|max:200',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'kullanici_id' => auth()->id(),
            'magaza_adi' => $this->sanitizeUtf8($request->magaza_adi),
            'slug' => Str::slug($request->magaza_adi),
            'slogan' => $this->sanitizeUtf8($this->buildSlogan($request->slogan)),
            'telefon' => $request->telefon,
            'email' => $request->email,
            'aciklama' => $this->sanitizeUtf8($request->aciklama),
            'durum' => 'beklemede',
        ];

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('magaza', 'public');
        } else {
            $data['logo'] = 'magaza-logo-' . Str::slug($request->magaza_adi) . '.svg';
            $svgContent = file_get_contents(MagazaGorselService::getLogoUrl($request->magaza_adi));
            Storage::disk('public')->put('magaza/' . $data['logo'], $svgContent);
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('magaza', 'public');
        } else {
            $data['banner'] = MagazaGorselService::saveBanner($request->magaza_adi, $data['slogan']);
        }

        Magaza::create($data);

        return redirect()->route('satici.magaza')->with('success', 'Magaza basvurunuz alindi.');
    }

    public function update(Request $request)
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->firstOrFail();

        $request->validate([
            'magaza_adi' => 'required|string|max:100|unique:magazalar,magaza_adi,'.$magaza->id,
            'telefon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'aciklama' => 'nullable|string',
            'slogan' => 'nullable|string|max:200',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'magaza_adi' => $this->sanitizeUtf8($request->magaza_adi),
            'slug' => Str::slug($request->magaza_adi),
            'slogan' => $this->sanitizeUtf8($this->buildSlogan($request->slogan)),
            'telefon' => $request->telefon,
            'email' => $request->email,
            'aciklama' => $this->sanitizeUtf8($request->aciklama),
        ];

        if ($request->hasFile('logo')) {
            if ($magaza->logo) Storage::disk('public')->delete($magaza->logo);
            $data['logo'] = $request->file('logo')->store('magaza', 'public');
        } elseif (!$magaza->logo || str_contains($magaza->logo, 'magaza-logo-')) {
            $data['logo'] = 'magaza-logo-' . Str::slug($request->magaza_adi) . '.svg';
            $svgContent = file_get_contents(MagazaGorselService::getLogoUrl($request->magaza_adi));
            Storage::disk('public')->put('magaza/' . $data['logo'], $svgContent);
        }

        if ($request->hasFile('banner')) {
            if ($magaza->banner) Storage::disk('public')->delete($magaza->banner);
            $data['banner'] = $request->file('banner')->store('magaza', 'public');
        } elseif (!$magaza->banner || str_contains($magaza->banner, 'banner-')) {
            if ($magaza->banner) Storage::disk('public')->delete($magaza->banner);
            $data['banner'] = MagazaGorselService::saveBanner($request->magaza_adi, $data['slogan']);
        }

        $magaza->update($data);

        return redirect()->route('satici.magaza')->with('success', 'Magaza bilgileri guncellendi.');
    }

    public function galeri()
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->with('gorseller')->firstOrFail();
        return view('satici.galeri', compact('magaza'));
    }

    public function galeriYukle(Request $request)
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->firstOrFail();

        $request->validate([
            'gorseller' => 'required|array',
            'gorseller.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'baslik' => 'nullable|string|max:200',
        ]);

        foreach ($request->file('gorseller') as $file) {
            $ext = strtolower($file->getClientOriginalExtension());
            $image = match ($ext) {
                'png' => imagecreatefrompng($file->getPathname()),
                'webp' => imagecreatefromwebp($file->getPathname()),
                default => imagecreatefromjpeg($file->getPathname()),
            };

            $origW = imagesx($image);
            $origH = imagesy($image);
            $maxDim = 1200;

            if ($origW > $maxDim || $origH > $maxDim) {
                $ratio = min($maxDim / $origW, $maxDim / $origH);
                $newW = (int)round($origW * $ratio);
                $newH = (int)round($origH * $ratio);
                $resized = imagecreatetruecolor($newW, $newH);
                if ($ext === 'png') {
                    imagealphablending($resized, false);
                    imagesavealpha($resized, true);
                }
                imagecopyresampled($resized, $image, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
                imagedestroy($image);
                $image = $resized;
            }

            $tempPath = tempnam(sys_get_temp_dir(), 'galeri_') . '.' . $ext;
            match ($ext) {
                'png' => imagepng($image, $tempPath, 8),
                'webp' => imagewebp($image, $tempPath, 80),
                default => imagejpeg($image, $tempPath, 80),
            };
            imagedestroy($image);

            $dosyaYolu = 'magaza/galeri/' . $file->hashName();
            Storage::disk('public')->put($dosyaYolu, file_get_contents($tempPath));
            unlink($tempPath);

            $maxSira = MagazaGorsel::where('magaza_id', $magaza->id)->max('sira') ?? 0;
            MagazaGorsel::create([
                'magaza_id' => $magaza->id,
                'dosya_yolu' => $dosyaYolu,
                'baslik' => $request->baslik,
                'sira' => $maxSira + 1,
            ]);
        }

        return redirect()->route('satici.galeri')->with('success', 'Görseller yüklendi.');
    }

    public function galeriSil($id)
    {
        $gorsel = MagazaGorsel::whereHas('magaza', fn($q) => $q->where('kullanici_id', auth()->id()))
            ->findOrFail($id);

        Storage::disk('public')->delete($gorsel->dosya_yolu);
        $gorsel->delete();

        return redirect()->route('satici.galeri')->with('success', 'Görsel silindi.');
    }

    public function galeriSira(Request $request)
    {
        $magaza = Magaza::where('kullanici_id', auth()->id())->firstOrFail();

        foreach ($request->sira as $id => $sira) {
            MagazaGorsel::where('magaza_id', $magaza->id)->where('id', $id)->update(['sira' => $sira]);
        }

        return redirect()->route('satici.galeri')->with('success', 'Sıralama güncellendi.');
    }
}