<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komisyon extends Model
{
    protected $table = 'komisyonlar';

    protected $fillable = ['kullanici_id', 'oran'];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }
}
