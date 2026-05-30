<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iletisim_mesajlari', function (Blueprint $table) {
            $table->id();
            $table->string('ad_soyad', 100);
            $table->string('email', 100);
            $table->string('telefon', 20)->nullable();
            $table->string('konu', 200);
            $table->text('mesaj');
            $table->boolean('okundu_mu')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iletisim_mesajlari');
    }
};
