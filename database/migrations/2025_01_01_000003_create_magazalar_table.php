<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('magazalar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->string('magaza_adi', 100);
            $table->string('slug', 150)->unique();
            $table->text('aciklama')->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('banner', 255)->nullable();
            $table->string('telefon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('adres')->nullable();
            $table->string('sehir', 50)->nullable();
            $table->string('website', 255)->nullable();
            $table->enum('durum', ['beklemede', 'onaylandi', 'reddedildi'])->default('beklemede');
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('magazalar');
    }
};
