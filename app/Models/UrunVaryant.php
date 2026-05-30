<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunVaryant extends Model
{
    protected $table = 'urun_varyantlari';

    protected $fillable = ['urun_id', 'tur', 'deger', 'fiyat_farki', 'stok', 'foto', 'sira'];

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
}
