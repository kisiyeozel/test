<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yorumlar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->unsignedBigInteger('urun_id');
            $table->unsignedBigInteger('siparis_id')->nullable();
            $table->tinyInteger('puan')->unsigned();
            $table->text('yorum');
            $table->enum('durum', ['onayli', 'beklemede', 'reddedildi'])->default('beklemede');
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
            $table->foreign('siparis_id')->references('id')->on('siparisler')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yorumlar');
    }
};
