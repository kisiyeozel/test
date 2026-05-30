<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('urun_sorulari', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('urun_id');
            $table->unsignedBigInteger('kullanici_id')->nullable();
            $table->string('musteri_adi', 100)->nullable();
            $table->text('soru');
            $table->text('cevap')->nullable();
            $table->string('durum', 20)->default('beklemede');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('cevaplanma_tarihi')->nullable();
            $table->foreign('urun_id')->references('id')->on('urunler')->onDelete('cascade');
            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('urun_sorulari');
    }
};
