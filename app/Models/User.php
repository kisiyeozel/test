<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'kullanicilar';

    const ROLE_ADMIN = 'admin';
    const ROLE_SATICI = 'satici';
    const ROLE_MUSTERI = 'musteri';

    protected $fillable = [
        'ad_soyad', 'email', 'telefon', 'sifre', 'avatar', 'durum', 'role',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'sifre', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->sifre;
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isSatici()
    {
        return $this->role === self::ROLE_SATICI;
    }

    public function isMusteri()
    {
        return $this->role === self::ROLE_MUSTERI;
    }

    public function magaza()
    {
        return $this->hasOne(Magaza::class, 'kullanici_id');
    }

    public function siparisler()
    {
        return $this->hasMany(Siparis::class, 'kullanici_id');
    }

    public function urunler()
    {
        return $this->hasMany(Urun::class, 'kullanici_id');
    }

    public function favoriler()
    {
        return $this->hasMany(Favori::class, 'kullanici_id');
    }

    public function yorumlar()
    {
        return $this->hasMany(Yorum::class, 'kullanici_id');
    }
}
