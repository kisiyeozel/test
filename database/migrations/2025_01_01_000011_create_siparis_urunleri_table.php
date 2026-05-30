<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siparis_urunleri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siparis_id');
            $table->unsignedBigInteger('urun_id');
            $table->unsignedBigInteger('varyant_id')->nullable();
            $table->string('urun_adi', 200);
            $table->string('urun_foto', 255)->nullable();
            $table->decimal('birim_fiyat', 10, 2);
            $table->integer('adet');
            $table->decimal('toplam', 10, 2);
            $table->json('kisisellestirme_bilgisi')->nullable();
            $table->timestamps();

            $table->foreign('siparis_id')->references('id')->on('siparisler')->cascadeOnDelete();
            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
            $table->foreign('varyant_id')->references('id')->on('urun_varyantlari')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siparis_urunleri');
    }
};
