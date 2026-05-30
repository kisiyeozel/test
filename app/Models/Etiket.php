<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etiket extends Model
{
    protected $table = 'etiketler';

    protected $fillable = ['etiket_adi', 'slug'];

    public function urunler()
    {
        return $this->belongsToMany(Urun::class, 'urun_etiketler', 'etiket_id', 'urun_id');
    }
}
