<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KargoTakip extends Model
{
    protected $table = 'kargo_takip';

    protected $fillable = ['siparis_id', 'kargo_firmasi', 'takip_kodu', 'durum'];

    public function siparis()
    {
        return $this->belongsTo(Siparis::class, 'siparis_id');
    }
}
