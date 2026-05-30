<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MagazaGorsel extends Model
{
    protected $table = 'magaza_gorseller';

    protected $fillable = ['magaza_id', 'dosya_yolu', 'baslik', 'sira'];

    public function magaza()
    {
        return $this->belongsTo(Magaza::class, 'magaza_id');
    }
}