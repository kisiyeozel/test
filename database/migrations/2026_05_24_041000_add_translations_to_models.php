<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kategoriler', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('aktif');
        });
        Schema::table('urunler', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('e_anahtar_kelime');
        });
        Schema::table('magazalar', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('durum');
        });
        Schema::table('blog', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('kategori');
        });
        Schema::table('sss', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('aktif');
        });
    }

    public function down(): void
    {
        Schema::table('kategoriler', fn(Blueprint $t) => $t->dropColumn('translations'));
        Schema::table('urunler', fn(Blueprint $t) => $t->dropColumn('translations'));
        Schema::table('magazalar', fn(Blueprint $t) => $t->dropColumn('translations'));
        Schema::table('blog', fn(Blueprint $t) => $t->dropColumn('translations'));
        Schema::table('sss', fn(Blueprint $t) => $t->dropColumn('translations'));
    }
};
