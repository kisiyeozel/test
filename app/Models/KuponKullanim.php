<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuponKullanim extends Model
{
    protected $table = 'kupon_kullanim';

    protected $fillable = ['kupon_id', 'kullanici_id', 'siparis_id'];
}
