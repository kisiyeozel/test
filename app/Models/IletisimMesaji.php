<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IletisimMesaji extends Model
{
    protected $table = 'iletisim_mesajlari';

    protected $fillable = ['ad_soyad', 'email', 'telefon', 'konu', 'mesaj', 'okundu_mu'];

    protected $casts = [
        'okundu_mu' => 'boolean',
    ];
}
