<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table = 'yorumlar';

    protected $fillable = ['kullanici_id', 'urun_id', 'siparis_id', 'puan', 'yorum', 'durum'];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }

    public function oylar()
    {
        return $this->hasMany(YorumOy::class, 'yorum_id');
    }
}
