<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Kategori extends Model
{
    use Translatable;

    public $translatableFields = ['kategori_adi', 'aciklama'];
    protected $table = 'kategoriler';

    protected $fillable = ['ust_id', 'kategori_adi', 'slug', 'aciklama', 'foto', 'ikon', 'sira', 'aktif', 'translations'];

    public function ustKategori()
    {
        return $this->belongsTo(Kategori::class, 'ust_id');
    }

    public function altKategoriler()
    {
        return $this->hasMany(Kategori::class, 'ust_id');
    }

    public function urunler()
    {
        return $this->hasMany(Urun::class, 'kategori_id');
    }
}
