@extends('layouts.admin') @section('title', 'Kupon Düzenle')
@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-xl border p-6">
        <h3 class="font-semibold text-gray-900 mb-4">Kupon Düzenle: {{ $kupon->kupon_kodu }}</h3>
        <form action="{{ route('admin.kupon-guncelle', $kupon->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-3">
                <div class="col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Kupon Kodu</label><input type="text" name="kupon_kodu" value="{{ $kupon->kupon_kodu }}" class="w-full border-gray-300 rounded-lg uppercase" required></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">İndirim Türü</label><select name="indirim_turu" class="w-full border-gray-300 rounded-lg"><option value="yuzde" {{ $kupon->indirim_turu == 'yuzde' ? 'selected' : '' }}>Yüzde</option><option value="tutar" {{ $kupon->indirim_turu == 'tutar' ? 'selected' : '' }}>Tutar</option></select></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">İndirim Miktarı</label><input type="text" name="indirim_miktari" value="{{ $kupon->indirim_miktari }}" class="w-full border-gray-300 rounded-lg" required></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Min. Sepet</label><input type="text" name="min_sepet_tutari" value="{{ $kupon->min_sepet_tutari }}" class="w-full border-gray-300 rounded-lg"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Max. Kullanım</label><input type="number" name="max_kullanim" value="{{ $kupon->max_kullanim }}" class="w-full border-gray-300 rounded-lg"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Başlangıç</label><input type="date" name="baslangic_tarihi" value="{{ $kupon->baslangic_tarihi }}" class="w-full border-gray-300 rounded-lg" required></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Bitiş</label><input type="date" name="bitis_tarihi" value="{{ $kupon->bitis_tarihi }}" class="w-full border-gray-300 rounded-lg" required></div>
                <div class="col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Aktif</label><select name="aktif" class="w-full border-gray-300 rounded-lg"><option value="1" {{ $kupon->aktif ? 'selected' : '' }}>Evet</option><option value="0" {{ !$kupon->aktif ? 'selected' : '' }}>Hayır</option></select></div>
            </div>
            <div class="flex gap-2 mt-4">
                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">Güncelle</button>
                <a href="{{ route('admin.kuponlar') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-300">İptal</a>
            </div>
        </form>
    </div>
</div>
@endsection
