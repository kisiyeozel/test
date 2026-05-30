<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    protected $table = 'kuponlar';

    protected $fillable = [
        'kupon_kodu', 'indirim_turu', 'indirim_miktari', 'min_sepet_tutari',
        'max_kullanim', 'kullanim_sayisi', 'baslangic_tarihi', 'bitis_tarihi', 'aktif'
    ];

    protected $casts = [
        'baslangic_tarihi' => 'datetime',
        'bitis_tarihi' => 'datetime',
        'aktif' => 'boolean',
    ];

    public function kullanimlar()
    {
        return $this->hasMany(KuponKullanim::class, 'kupon_id');
    }
}
