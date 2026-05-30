@extends('layouts.admin') @section('title', 'Ayarlar')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl border p-6">
        <form action="{{ route('admin.ayarlar.update') }}" method="POST">
            @csrf
            <h3 class="font-semibold text-gray-900 mb-4">Genel Ayarlar</h3>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Site Başlığı</label><input type="text" name="site_basligi" value="{{ $ayarlar['site_basligi'] ?? config('app.name') }}" class="w-full border-gray-300 rounded-lg"></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Site Açıklaması</label><textarea name="site_aciklamasi" rows="2" class="w-full border-gray-300 rounded-lg">{{ $ayarlar['site_aciklamasi'] ?? '' }}</textarea></div>
            <hr class="my-4">
            <h3 class="font-semibold text-gray-900 mb-4">Komisyon Ayarları</h3>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Komisyon Oranı (%)</label><input type="number" name="komisyon_orani" value="{{ $komisyonOrani }}" step="0.1" min="0" max="100" class="w-32 border-gray-300 rounded-lg"></div>
            <hr class="my-4">
            <h3 class="font-semibold text-gray-900 mb-4">KDV Ayarları</h3>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">KDV Oranı (%)</label><input type="number" name="kdv_orani" value="{{ $ayarlar['kdv_orani'] ?? '20' }}" step="0.1" min="0" max="100" class="w-32 border-gray-300 rounded-lg"><p class="text-xs text-gray-400 mt-1">Ürün fiyatlarına uygulanacak KDV oranı. 0 girilirse KDV hesaplanmaz.</p></div>
            <hr class="my-4">
            <h3 class="font-semibold text-gray-900 mb-4">Kargo Ayarları</h3>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Sabit Kargo Ücreti (₺)</label><input type="text" name="sabit_kargo_ucreti" value="{{ $ayarlar['sabit_kargo_ucreti'] ?? '49.90' }}" class="w-32 border-gray-300 rounded-lg"></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Bedava Kargo Limiti (₺)</label><input type="text" name="bedava_kargo_limit" value="{{ $ayarlar['bedava_kargo_limit'] ?? '500' }}" class="w-32 border-gray-300 rounded-lg"></div>
            <hr class="my-4">
            <h3 class="font-semibold text-gray-900 mb-4">İletişim Bilgileri</h3>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">E-posta</label><input type="email" name="iletisim_email" value="{{ $ayarlar['iletisim_email'] ?? '' }}" class="w-full border-gray-300 rounded-lg"></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label><input type="text" name="iletisim_telefon" value="{{ $ayarlar['iletisim_telefon'] ?? '' }}" class="w-full border-gray-300 rounded-lg"></div>
            <button type="submit" class="bg-orange-500 text-white px-6 py-2.5 rounded-lg font-medium hover:bg-orange-600 transition">Kaydet</button>
        </form>
    </div>
</div>
@endsection
