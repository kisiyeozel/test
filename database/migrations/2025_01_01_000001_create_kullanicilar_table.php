<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kullanicilar', function (Blueprint $table) {
            $table->id();
            $table->string('ad_soyad', 100);
            $table->string('email', 100)->unique();
            $table->string('telefon', 20)->nullable();
            $table->string('sifre');
            $table->string('avatar', 255)->nullable();
            $table->enum('durum', ['aktif', 'pasif', 'banli'])->default('aktif');
            $table->enum('role', ['musteri', 'satici', 'admin'])->default('musteri');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kullanicilar');
    }
};
