<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    protected $table = 'siparisler';

    protected $fillable = [
        'kullanici_id', 'siparis_no', 'ara_toplam', 'kargo_ucreti', 'indirim_tutari',
        'komisyon_tutari', 'genel_toplam', 'kupon_kodu',
        'odeme_turu', 'odeme_durumu', 'siparis_durumu',
        'ad_soyad', 'email', 'telefon', 'adres', 'sehir', 'ilce', 'posta_kodu', 'notlar',
        'kargo_firmasi', 'takip_kodu', 'odeme_id', 'odeme_cevabi'
    ];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function urunler()
    {
        return $this->hasMany(SiparisUrun::class, 'siparis_id');
    }

    public function kargoTakip()
    {
        return $this->hasOne(KargoTakip::class, 'siparis_id');
    }
}
