<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogYorum extends Model
{
    protected $table = 'blog_yorumlari';

    protected $fillable = ['blog_id', 'kullanici_id', 'ad_soyad', 'email', 'yorum', 'onaylandi_mi'];

    protected $casts = [
        'onaylandi_mi' => 'boolean',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }
}
