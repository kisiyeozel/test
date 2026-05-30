<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunGorsel extends Model
{
    protected $table = 'urun_gorseller';

    protected $fillable = ['urun_id', 'dosya_yolu', 'one_cikan', 'sira'];

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }
}
