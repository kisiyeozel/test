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
        if (!Schema::hasColumn('kategoriler', 'ikon')) {
            Schema::table('kategoriler', function (Blueprint $table) {
                $table->string('ikon', 100)->nullable()->after('foto');
            });
        }
    }

    public function down(): void
    {
        Schema::table('kategoriler', function (Blueprint $table) {
            $table->dropColumn('ikon');
        });
    }
};
