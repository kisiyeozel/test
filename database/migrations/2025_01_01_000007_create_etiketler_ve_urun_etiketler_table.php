<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etiketler', function (Blueprint $table) {
            $table->id();
            $table->string('etiket_adi', 100);
            $table->string('slug', 150)->unique();
            $table->timestamps();
        });

        Schema::create('urun_etiketler', function (Blueprint $table) {
            $table->unsignedBigInteger('urun_id');
            $table->unsignedBigInteger('etiket_id');
            $table->primary(['urun_id', 'etiket_id']);
            $table->foreign('urun_id')->references('id')->on('urunler')->cascadeOnDelete();
            $table->foreign('etiket_id')->references('id')->on('etiketler')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urun_etiketler');
        Schema::dropIfExists('etiketler');
    }
};
