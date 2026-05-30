@extends('layouts.app')

@section('title', 'Favorilerim')
@section('meta_desc', 'Beğendiğiniz özel ürünler')

@section('content')
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Favorilerim</h1>
        <p class="text-dark-400 mt-2">{{ $favoriler->count() }} ürün</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if($favoriler->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @foreach($favoriler as $favori)
                <div class="group bg-white rounded-2xl border border-dark-100 overflow-hidden card-hover relative">
                    <a href="{{ route('product.detail', $favori->urun->slug) }}">
                        <div class="aspect-square bg-cream-100 overflow-hidden">
                            @if($favori->urun->ana_foto)
                                <img src="{{ asset('storage/' . $favori->urun->ana_foto) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-200"><i class="fas fa-image text-4xl"></i></div>
                            @endif
                        </div>
                        <div class="p-4 md:p-5">
                            @if($favori->urun->magaza)
                                <p class="text-xs text-dark-400 mb-1">{{ $favori->urun->magaza->magaza_adi }}</p>
                            @endif
                            <h3 class="font-semibold text-dark-900 group-hover:text-gold-600 transition truncate text-sm md:text-base">{{ $favori->urun->urun_adi }}</h3>
                            <p class="text-lg font-bold text-gold-600 mt-2">{{ number_format($favori->urun->fiyat, 2) }} <span class="text-xs font-normal">₺</span></p>
                        </div>
                    </a>
                    <form action="{{ route('favori.remove', $favori->id) }}" method="POST" class="absolute top-3 right-3">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-9 h-9 bg-white rounded-xl shadow-md flex items-center justify-center text-red-500 hover:bg-red-50 hover:scale-110 transition-all"><i class="fas fa-heart text-sm"></i></button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6"><i class="fas fa-heart text-4xl text-gray-300"></i></div>
            <h2 class="text-2xl font-bold text-dark-900 mb-2">Favorileriniz Boş</h2>
            <p class="text-dark-400 mb-8">Beğendiğiniz ürünleri favorilerinize ekleyerek kolayca bulun.</p>
            <a href="{{ route('products') }}" class="btn-gold">Ürünleri Keşfet</a>
        </div>
    @endif
</div>
@endsection
