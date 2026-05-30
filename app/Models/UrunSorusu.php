<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunSorusu extends Model
{
    protected $table = 'urun_sorulari';
    public $timestamps = false;

    protected $fillable = ['urun_id', 'kullanici_id', 'musteri_adi', 'soru', 'cevap', 'durum', 'cevaplanma_tarihi', 'cevaplayan_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'cevaplanma_tarihi' => 'datetime',
    ];

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function cevaplayan()
    {
        return $this->belongsTo(User::class, 'cevaplayan_id');
    }
}
