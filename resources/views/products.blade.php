@extends('layouts.app')

@section('title', 'Ürünler')

@section('content')
<div class="bg-cream-100/50 border-b border-gold-100/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center gap-4 mb-2">
            <div class="gold-line"></div>
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Koleksiyon</span>
        </div>
        <h1 class="section-title">Tüm Ürünler</h1>
        <p class="section-subtitle">{{ $urunler->total() }} ürün bulundu</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-10">
        {{-- Filtreler --}}
        <aside class="lg:w-64 shrink-0">
            <div class="luxury-card p-6 sticky top-24">
                <h3 class="font-serif font-semibold text-dark-900 mb-5 flex items-center gap-2"><i class="fas fa-filter text-gold-500"></i>Filtrele</h3>

                <div class="mb-7">
                    <h4 class="text-xs font-sans font-semibold text-dark-500 uppercase tracking-wider mb-3">Kategoriler</h4>
                    <div class="space-y-2">
                        <a href="{{ route('products') }}" class="block text-sm {{ !request('kategori') ? 'text-gold-600 font-semibold' : 'text-dark-500 hover:text-gold-600' }} transition font-sans flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full {{ !request('kategori') ? 'bg-gold-500' : 'bg-dark-300' }}"></span>Tümü
                        </a>
                        @foreach($kategoriler as $kategori)
                            <a href="{{ route('products', ['kategori' => $kategori->id]) }}" class="block text-sm {{ request('kategori') == $kategori->id ? 'text-gold-600 font-semibold' : 'text-dark-500 hover:text-gold-600' }} transition font-sans flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full {{ request('kategori') == $kategori->id ? 'bg-gold-500' : 'bg-dark-300' }}"></span>{{ $kategori->kategori_adi }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-sans font-semibold text-dark-500 uppercase tracking-wider mb-3">Sıralama</h4>
                    <div class="space-y-2">
                        @foreach(['yeni' => 'En Yeni', 'artan' => 'Fiyat (Artan)', 'azalan' => 'Fiyat (Azalan)', 'cok_satan' => 'Çok Satanlar'] as $key => $label)
                            <a href="{{ route('products', ['siralama' => $key]) }}" class="block text-sm {{ request('siralama') == $key ? 'text-gold-600 font-semibold' : 'text-dark-500 hover:text-gold-600' }} transition font-sans flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full {{ request('siralama') == $key ? 'bg-gold-500' : 'bg-dark-300' }}"></span>{{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </aside>

        {{-- Ürünler --}}
        <div class="flex-1">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-5 md:gap-6">
                @forelse($urunler as $urun)
                    <x-urun-card :urun="$urun" :favoriIds="$favoriIds ?? []" />
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="w-20 h-20 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-5"><i class="fas fa-box-open text-3xl text-dark-300"></i></div>
                        <p class="text-dark-400 font-medium font-sans">Henüz ürün bulunamadı.</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-12">{{ $urunler->links() }}</div>
        </div>
    </div>
</div>
@endsection
