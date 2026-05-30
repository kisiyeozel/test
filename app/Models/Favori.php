<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $table = 'favoriler';

    protected $fillable = ['kullanici_id', 'urun_id'];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
}
