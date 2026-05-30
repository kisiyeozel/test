<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunEtiket extends Model
{
    protected $table = 'urun_etiketler';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['urun_id', 'etiket_id'];

    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }

    public function etiket()
    {
        return $this->belongsTo(Etiket::class, 'etiket_id');
    }
}
