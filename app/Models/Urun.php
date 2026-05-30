<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Urun extends Model
{
    use Translatable;

    public $translatableFields = ['urun_adi', 'aciklama', 'kisa_aciklama'];
    protected $table = 'urunler';

    protected $fillable = [
        'kullanici_id', 'magaza_id', 'kategori_id', 'urun_adi', 'slug', 'aciklama',
        'kisa_aciklama', 'ana_foto', 'fiyat',
        'kisinin_adi', 'fotograf_yukle', 'renk_secimi', 'olcu_secimi', 'ozel_not',
        'varyant_renk', 'varyant_beden', 'varyant_olcu', 'varyant_yazi_tipi',
        'teslim_suresi', 'teslim_sure_birimi', 'stok_durumu',
        'durum', 'one_cikan',
        'e_baslik', 'e_aciklama', 'e_anahtar_kelime',
        'goruntulenme', 'satis_sayisi', 'yorum_ortalamasi', 'yorum_sayisi', 'translations'
    ];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function magaza()
    {
        return $this->belongsTo(Magaza::class, 'magaza_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function varyantlar()
    {
        return $this->hasMany(UrunVaryant::class, 'urun_id');
    }

    public function gorseller()
    {
        return $this->hasMany(UrunGorsel::class, 'urun_id');
    }

    public function etiketler()
    {
        return $this->belongsToMany(Etiket::class, 'urun_etiketler', 'urun_id', 'etiket_id');
    }

    public function yorumlar()
    {
        return $this->hasMany(Yorum::class, 'urun_id');
    }

    public function favoriler()
    {
        return $this->hasMany(Favori::class, 'urun_id');
    }

    public function sorular()
    {
        return $this->hasMany(UrunSorusu::class, 'urun_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('durum', 'onaylandi');
    }

    public function scopeOneCikan($query)
    {
        return $query->where('one_cikan', true);
    }
}
