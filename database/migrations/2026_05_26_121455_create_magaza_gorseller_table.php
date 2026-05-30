<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('magaza_gorseller', function (Blueprint $table) {
            $table->id();
            $table->foreignId('magaza_id')->constrained('magazalar')->cascadeOnDelete();
            $table->string('dosya_yolu');
            $table->string('baslik')->nullable();
            $table->integer('sira')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('magaza_gorseller');
    }
};