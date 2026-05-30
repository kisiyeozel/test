<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->string('baslik', 200);
            $table->string('slug', 250)->unique();
            $table->text('icerik');
            $table->string('ozet', 500)->nullable();
            $table->string('foto', 255)->nullable();
            $table->enum('durum', ['taslak', 'yayinda'])->default('taslak');
            $table->integer('goruntulenme')->default(0);
            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
