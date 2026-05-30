@extends('layouts.app')
@section('title', $query ? '"' . $query . '" arama sonuçları' : 'Arama')
@section('meta_desc', $query ? $query . ' için arama sonuçları' : 'Ürünlerde arama yapın')

@section('content')
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Arama</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <form action="{{ route('search') }}" method="GET" class="flex gap-3">
            <input type="text" name="q" value="{{ $query }}" placeholder="Ürün, mağaza veya kategori ara..."
                   class="flex-1 border-dark-200 rounded-2xl text-lg px-6 py-4 focus:border-gold-400 focus:ring-4 focus:ring-gold-100 transition">
            <button type="submit" class="btn-gold"><i class="fas fa-search"></i><span class="hidden sm:inline">Ara</span></button>
        </form>
    </div>
    @if($query)
        <p class="text-sm text-dark-400 mb-8 flex items-center gap-2">
            <i class="fas fa-search text-gold-400"></i>
            "<strong class="text-dark-900">{{ $query }}</strong>" için <strong>{{ $urunler->total() }}</strong> sonuç bulundu
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @forelse($urunler as $urun)
                <x-urun-card :urun="$urun" :favoriIds="$favoriIds ?? []" />
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="w-24 h-24 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6"><i class="fas fa-search text-4xl text-gray-300"></i></div>
                    <p class="text-dark-400 font-medium mb-2">Aramanızla eşleşen ürün bulunamadı.</p>
                    <p class="text-dark-400 text-sm">Farklı anahtar kelimelerle tekrar deneyin.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-10">{{ $urunler->links() }}</div>
    @endif
</div>
@endsection
