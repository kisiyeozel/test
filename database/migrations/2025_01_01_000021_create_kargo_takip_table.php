<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kargo_takip', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siparis_id');
            $table->string('kargo_firmasi', 100)->nullable();
            $table->string('takip_kodu', 100)->nullable();
            $table->string('durum', 50)->default('hazirlaniyor');
            $table->timestamps();
            $table->foreign('siparis_id')->references('id')->on('siparisler')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kargo_takip');
    }
};
