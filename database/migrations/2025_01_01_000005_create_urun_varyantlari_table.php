<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('urun_varyantlari', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('urun_id');
            $table->string('tur', 50);
            $table->string('deger', 100);
            $table->decimal('fiyat_farki', 10, 2)->default(0);
            $table->integer('stok')->default(0);
            $table->string('foto', 255)->nullable();
            $table->integer('sira')->default(0);
            $table->timestamps();

            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urun_varyantlari');
    }
};
