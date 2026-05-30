<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_yorumlari', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained('blog')->cascadeOnDelete();
            $table->foreignId('kullanici_id')->nullable()->constrained('kullanicilar')->nullOnDelete();
            $table->string('ad_soyad');
            $table->string('email');
            $table->text('yorum');
            $table->boolean('onaylandi_mi')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_yorumlari');
    }
};
