<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategoriler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ust_id')->nullable();
            $table->string('kategori_adi', 100);
            $table->string('slug', 150)->unique();
            $table->text('aciklama')->nullable();
            $table->string('foto', 255)->nullable();
            $table->integer('sira')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();

            $table->foreign('ust_id')->references('id')->on('kategoriler')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoriler');
    }
};
