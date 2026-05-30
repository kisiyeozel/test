<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('urun_gorseller', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('urun_id');
            $table->string('dosya_yolu', 255);
            $table->boolean('one_cikan')->default(false);
            $table->integer('sira')->default(0);
            $table->timestamps();

            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urun_gorseller');
    }
};
