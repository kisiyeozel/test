<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiparisUrun extends Model
{
    protected $table = 'siparis_urunleri';

    protected $fillable = [
        'siparis_id', 'urun_id', 'varyant_id', 'urun_adi', 'urun_foto',
        'birim_fiyat', 'adet', 'toplam', 'kisisellestirme_bilgisi'
    ];

    protected $casts = [
        'kisisellestirme_bilgisi' => 'array',
    ];

    public function siparis()
    {
        return $this->belongsTo(Siparis::class, 'siparis_id');
    }

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
}
