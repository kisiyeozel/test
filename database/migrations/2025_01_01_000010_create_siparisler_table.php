<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siparisler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->string('siparis_no', 50)->unique();
            $table->decimal('ara_toplam', 10, 2)->default(0);
            $table->decimal('kargo_ucreti', 10, 2)->default(0);
            $table->decimal('indirim_tutari', 10, 2)->default(0);
            $table->decimal('komisyon_tutari', 10, 2)->default(0);
            $table->decimal('genel_toplam', 10, 2)->default(0);
            $table->string('kupon_kodu', 50)->nullable();

            $table->enum('odeme_turu', ['kredi_karti', 'havale', 'kapida_odeme'])->default('kredi_karti');
            $table->enum('odeme_durumu', ['beklemede', 'basarili', 'basarisiz', 'iade'])->default('beklemede');
            $table->enum('siparis_durumu', ['alinan', 'hazirlaniyor', 'kargoya_verildi', 'teslim_edildi', 'iade_edildi'])->default('alinan');

            $table->string('ad_soyad', 100);
            $table->string('email', 100);
            $table->string('telefon', 20);
            $table->text('adres');
            $table->string('sehir', 50);
            $table->string('ilce', 50);
            $table->string('posta_kodu', 20)->nullable();
            $table->text('notlar')->nullable();

            $table->string('kargo_firmasi', 100)->nullable();
            $table->string('takip_kodu', 100)->nullable();

            $table->string('odeme_id', 100)->nullable();
            $table->text('odeme_cevabi')->nullable();

            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siparisler');
    }
};
