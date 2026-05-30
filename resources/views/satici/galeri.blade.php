@extends('layouts.satici')
@section('title', 'Galeri')
@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-dark-900">Galeri</h1>
        <p class="text-dark-400 text-sm mt-1">Mağaza portföyünüzü sergileyin</p>
    </div>
</div>

<div class="luxury-card p-6 mb-6">
    <form action="{{ route('satici.galeri-yukle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-2 border-dashed border-dark-200 rounded-xl p-8 text-center hover:border-gold-400 transition cursor-pointer" onclick="document.getElementById('gorseller-input').click()">
            <i class="fas fa-cloud-upload-alt text-4xl text-gold-500 mb-3"></i>
            <p class="text-dark-500 font-medium">Görsel yüklemek için tıklayın</p>
            <p class="text-dark-400 text-xs mt-1">JPG, PNG veya WebP (max 5MB) — birden fazla seçebilirsiniz</p>
            <input id="gorseller-input" type="file" name="gorseller[]" multiple accept="image/*" class="hidden">
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-dark-700 mb-1">Açıklama (tüm görseller için)</label>
            <input type="text" name="baslik" placeholder="Örn: El işi tasarımlar, özel siparişler..." class="w-full px-4 py-2.5 bg-dark-50/50 border border-dark-200 rounded-lg text-sm focus:border-gold-300 focus:ring-2 focus:ring-gold-500/10 transition">
        </div>
        <button type="submit" class="btn-gold mt-4 !py-2.5 !px-6 text-sm"><i class="fas fa-upload mr-1.5"></i>Yükle</button>
    </form>
</div>

@if($magaza->gorseller->count())
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($magaza->gorseller as $gorsel)
            <div class="group relative luxury-card overflow-hidden rounded-xl">
                <img src="{{ asset('storage/' . $gorsel->dosya_yolu) }}"
                     class="w-full h-48 object-cover"
                     alt="">
                @if($gorsel->baslik)
                    <div class="px-3 py-2 border-t border-dark-100">
                        <p class="text-xs text-dark-500 truncate">{{ $gorsel->baslik }}</p>
                    </div>
                @endif
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-3">
                    <form action="{{ route('satici.galeri-sil', $gorsel->id) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                        @csrf @method('DELETE')
                        <button class="w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <div class="absolute bottom-2 left-2 bg-dark-900/70 text-white text-xs px-2 py-1 rounded">{{ $gorsel->sira }}</div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-16">
        <div class="w-20 h-20 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-images text-3xl text-dark-300"></i></div>
        <p class="text-dark-400 font-medium">Henüz görsel eklenmemiş</p>
        <p class="text-dark-300 text-sm mt-1">Yukarıdan görsel yükleyerek portföyünüzü oluşturun</p>
    </div>
@endif
@endsection