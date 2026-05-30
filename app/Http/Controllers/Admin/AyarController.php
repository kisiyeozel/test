<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ayar;
use Illuminate\Http\Request;

class AyarController extends Controller
{
    public function index()
    {
        $ayarlar = Ayar::all()->pluck('deger', 'anahtar')->toArray();
        $komisyonOrani = Ayar::where('anahtar', 'komisyon_orani')->value('deger') ?? 10;
        return view('admin.ayarlar', compact('ayarlar', 'komisyonOrani'));
    }

    public function update(Request $request)
    {
        $keys = [
            'site_basligi', 'site_aciklamasi', 'site_anahtar_kelimeler',
            'site_logo', 'site_favicon', 'komisyon_orani', 'kdv_orani',
            'paytr_merchant_id', 'paytr_merchant_key', 'paytr_merchant_salt',
            'paytr_test_mode', 'sabit_kargo_ucreti', 'bedava_kargo_limit',
            'smtp_host', 'smtp_port', 'smtp_kullanici', 'smtp_sifre',
            'iletisim_email', 'iletisim_telefon', 'iletisim_adres',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Ayar::updateOrCreate(
                    ['anahtar' => $key],
                    ['deger' => $request->$key]
                );
            }
        }

        return redirect()->route('admin.ayarlar')->with('success', 'Ayarlar güncellendi.');
    }
}
