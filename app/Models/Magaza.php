<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Magaza extends Model
{
    use Translatable;

    public $translatableFields = ['magaza_adi', 'aciklama', 'slogan'];
    protected $table = 'magazalar';

    protected $fillable = [
        'kullanici_id', 'magaza_adi', 'slug', 'slogan', 'aciklama', 'logo', 'banner',
        'telefon', 'email', 'adres', 'sehir', 'website', 'durum', 'translations'
    ];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function urunler()
    {
        return $this->hasMany(Urun::class, 'magaza_id');
    }

    public function gorseller()
    {
        return $this->hasMany(MagazaGorsel::class, 'magaza_id')->orderBy('sira');
    }
}
