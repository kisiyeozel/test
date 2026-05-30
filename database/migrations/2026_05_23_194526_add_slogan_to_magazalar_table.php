<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('magazalar', function (Blueprint $table) {
            $table->string('slogan', 200)->nullable()->after('aciklama');
        });
    }

    public function down(): void
    {
        Schema::table('magazalar', function (Blueprint $table) {
            $table->dropColumn('slogan');
        });
    }
};
