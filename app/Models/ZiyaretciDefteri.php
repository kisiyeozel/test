<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZiyaretciDefteri extends Model
{
    protected $table = 'ziyaretci_defteri';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['ad_soyad', 'email', 'mesaj', 'durum'];
}
