<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sepet', function (Blueprint $table) {
            $table->id();
            $table->string('session_id', 100);
            $table->unsignedBigInteger('kullanici_id')->nullable();
            $table->unsignedBigInteger('urun_id');
            $table->unsignedBigInteger('varyant_id')->nullable();
            $table->integer('adet')->default(1);
            $table->text('kisisellestirme_notu')->nullable();
            $table->json('kisisellestirme_verisi')->nullable();
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
            $table->foreign('varyant_id')->references('id')->on('urun_varyantlari')->cascadeOnDelete();
            $table->index('session_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sepet');
    }
};
