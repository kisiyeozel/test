<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kullanici_id');
            $table->unsignedBigInteger('magaza_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('urun_adi', 200);
            $table->string('slug', 250)->unique();
            $table->text('aciklama')->nullable();
            $table->string('kisa_aciklama', 300)->nullable();
            $table->string('ana_foto', 255)->nullable();
            $table->decimal('fiyat', 10, 2);

            // Kişiselleştirme alanları
            $table->boolean('kisinin_adi')->default(false);
            $table->boolean('fotograf_yukle')->default(false);
            $table->boolean('renk_secimi')->default(false);
            $table->boolean('olcu_secimi')->default(false);
            $table->boolean('ozel_not')->default(false);

            // Varyasyon tipleri
            $table->boolean('varyant_renk')->default(false);
            $table->boolean('varyant_beden')->default(false);
            $table->boolean('varyant_olcu')->default(false);
            $table->boolean('varyant_yazi_tipi')->default(false);

            $table->integer('teslim_suresi')->default(3);
            $table->enum('teslim_sure_birimi', ['gun', 'saat'])->default('gun');
            $table->enum('stok_durumu', ['var', 'yok', 'tukendi'])->default('var');

            $table->enum('durum', ['beklemede', 'onaylandi', 'reddedildi'])->default('beklemede');
            $table->boolean('one_cikan')->default(false);

            // SEO
            $table->string('e_baslik', 200)->nullable();
            $table->text('e_aciklama')->nullable();
            $table->text('e_anahtar_kelime')->nullable();

            $table->integer('goruntulenme')->default(0);
            $table->integer('satis_sayisi')->default(0);
            $table->decimal('yorum_ortalamasi', 3, 2)->default(0);
            $table->integer('yorum_sayisi')->default(0);

            $table->timestamps();

            $table->foreign('kullanici_id')->references('id')->on('kullanicilar')->cascadeOnDelete();
            $table->foreign('magaza_id')->references('id')->on('magazalar')->nullOnDelete();
            $table->foreign('kategori_id')->references('id')->on('kategoriler')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urunler');
    }
};
