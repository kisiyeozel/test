<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'bannerlar';

    protected $fillable = ['baslik', 'alt_baslik', 'link', 'foto', 'pozisyon', 'sira', 'aktif'];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
