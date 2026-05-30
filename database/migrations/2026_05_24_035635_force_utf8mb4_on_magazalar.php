<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Force table charset
        DB::statement('ALTER TABLE magazalar CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
        
        // Force specific columns
        DB::statement('ALTER TABLE magazalar MODIFY magaza_adi VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL');
        DB::statement('ALTER TABLE magazalar MODIFY slogan VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
        DB::statement('ALTER TABLE magazalar MODIFY aciklama TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE magazalar CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
    }
};
