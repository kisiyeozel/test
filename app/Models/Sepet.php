<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    protected $table = 'sepet';

    protected $fillable = ['session_id', 'kullanici_id', 'urun_id', 'varyant_id', 'adet', 'kisisellestirme_notu', 'kisisellestirme_verisi'];

    protected $casts = [
        'kisisellestirme_verisi' => 'array',
    ];

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }

    public function varyant()
    {
        return $this->belongsTo(UrunVaryant::class, 'varyant_id');
    }
}
