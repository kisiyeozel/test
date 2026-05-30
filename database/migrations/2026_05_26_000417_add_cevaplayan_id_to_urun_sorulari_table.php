<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('urun_sorulari', function (Blueprint $table) {
            $table->unsignedBigInteger('cevaplayan_id')->nullable()->after('kullanici_id');
            $table->foreign('cevaplayan_id')->references('id')->on('kullanicilar')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('urun_sorulari', function (Blueprint $table) {
            $table->dropForeign(['cevaplayan_id']);
            $table->dropColumn('cevaplayan_id');
        });
    }
};
