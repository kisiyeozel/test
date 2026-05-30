<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuponlar', function (Blueprint $table) {
            $table->id();
            $table->string('kupon_kodu', 50)->unique();
            $table->enum('indirim_turu', ['yuzde', 'tutar']);
            $table->decimal('indirim_miktari', 10, 2);
            $table->decimal('min_sepet_tutari', 10, 2)->default(0);
            $table->integer('max_kullanim')->default(0);
            $table->integer('kullanim_sayisi')->default(0);
            $table->dateTime('baslangic_tarihi');
            $table->dateTime('bitis_tarihi');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        Schema::create('kupon_kullanim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kupon_id');
            $table->unsignedBigInteger('kullanici_id');
            $table->unsignedBigInteger('siparis_id');
            $table->timestamps();

            $table->foreign('kupon_id')->references('id')->on('kuponlar')->cascadeOnDelete();
            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
            $table->foreign('siparis_id')->references('id')->on('siparisler')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kupon_kullanim');
        Schema::dropIfExists('kuponlar');
    }
};
