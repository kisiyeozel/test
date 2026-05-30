<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komisyonlar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id')->nullable();
            $table->decimal('oran', 5, 2);
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komisyonlar');
    }
};
