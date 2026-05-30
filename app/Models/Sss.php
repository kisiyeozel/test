<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Sss extends Model
{
    use Translatable;

    public $translatableFields = ['soru', 'cevap'];
    protected $table = 'sss';

    protected $fillable = ['soru', 'cevap', 'kategori', 'sira', 'aktif', 'translations'];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
