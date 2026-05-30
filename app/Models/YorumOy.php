<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YorumOy extends Model
{
    protected $table = 'yorum_oylar';

    protected $fillable = ['kullanici_id', 'yorum_id', 'oy'];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function yorum()
    {
        return $this->belongsTo(Yorum::class, 'yorum_id');
    }
}
