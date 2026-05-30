<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yorum_oylar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->unsignedBigInteger('yorum_id');
            $table->enum('oy', ['faydali', 'faydasiz']);
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
            $table->foreign('yorum_id')->references('id')->on('yorumlar')->cascadeOnDelete();
            $table->unique(['kullanici_id', 'yorum_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yorum_oylar');
    }
};
