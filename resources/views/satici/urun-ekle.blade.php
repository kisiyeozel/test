@extends('layouts.satici') @section('title', 'Ürün Ekle') @section('page_title', 'Yeni Ürün')
@section('content')
<div class="max-w-3xl">
    <div class="luxury-card p-6">
        <form action="{{ route('satici.urun-kaydet') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Ürün Adı</label><input type="text" name="urun_adi" class="input-field w-full" required></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Kategori</label><select name="kategori_id" class="input-field w-full" required>@foreach($kategoriler as $k)<option value="{{ $k->id }}">{{ $k->kategori_adi }}</option>@endforeach</select></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Fiyat (₺)</label><input type="text" name="fiyat" class="input-field w-full" required></div>
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Kısa Açıklama</label><input type="text" name="kisa_aciklama" maxlength="300" class="input-field w-full"></div>
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Açıklama</label><textarea name="aciklama" rows="4" class="input-field w-full"></textarea></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Ana Fotoğraf</label><input type="file" name="ana_foto" accept="image/*" class="w-full text-sm text-dark-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gold-50 file:text-gold-700 hover:file:bg-gold-100"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Teslim Süresi (gün)</label><input type="number" name="teslim_suresi" value="3" min="1" class="input-field w-full"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Stok Durumu</label><select name="stok_durumu" class="input-field w-full"><option value="var">Stokta Var</option><option value="yok">Stok Yok</option><option value="tukendi">Tükendi</option></select></div>
            </div>

            <hr class="my-6 border-cream-200">
            <h3 class="font-semibold text-dark-900 mb-4"><i class="fas fa-palette text-gold-500 mr-2"></i>Kişiselleştirme Seçenekleri</h3>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="kisinin_adi" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">İsim Yazılacak</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="fotograf_yukle" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Fotoğraf Yüklenecek</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="renk_secimi" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Renk Seçilecek</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="olcu_secimi" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Ölçü Seçilecek</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="ozel_not" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Özel Not Alanı</span></label>
            </div>

            <hr class="my-6 border-cream-200">
            <h3 class="font-semibold text-dark-900 mb-4"><i class="fas fa-layer-group text-gold-500 mr-2"></i>Varyasyon Tipleri</h3>
            <div class="grid grid-cols-2 gap-4 mb-6">
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="varyant_renk" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Renk Varyasyonu</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="varyant_beden" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Beden Varyasyonu</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="varyant_olcu" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Ölçü Varyasyonu</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="varyant_yazi_tipi" value="1" class="accent-gold-500"> <span class="text-sm text-dark-700">Yazı Tipi Varyasyonu</span></label>
            </div>

            <button type="submit" class="btn-gold px-10 py-3 rounded-xl font-semibold text-sm"><i class="fas fa-save mr-2"></i>Ürünü Kaydet</button>
        </form>
    </div>
</div>
@endsection
