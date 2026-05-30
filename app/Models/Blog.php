<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Blog extends Model
{
    use Translatable;

    public $translatableFields = ['baslik', 'icerik', 'ozet'];
    protected $table = 'blog';

    protected $fillable = ['kullanici_id', 'baslik', 'slug', 'icerik', 'ozet', 'foto', 'durum', 'goruntulenme', 'kategori', 'translations'];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function yorumlar()
    {
        return $this->hasMany(BlogYorum::class, 'blog_id');
    }

    public function yayinliYorumlar()
    {
        return $this->hasMany(BlogYorum::class, 'blog_id')->where('onaylandi_mi', true);
    }
}
