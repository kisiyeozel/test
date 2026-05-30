<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sss', function (Blueprint $table) {
            $table->id();
            $table->string('soru', 255);
            $table->text('cevap');
            $table->string('kategori', 100)->nullable();
            $table->integer('sira')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sss');
    }
};
