<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favoriler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->unsignedBigInteger('urun_id');
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
            $table->unique(['kullanici_id', 'urun_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favoriler');
    }
};
