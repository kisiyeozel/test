@extends('layouts.app')
@section('title', $kategori->kategori_adi)
@section('meta_desc', $kategori->aciklama ?? $kategori->kategori_adi . ' kategorisindeki ürünler')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950 border-b border-dark-800/50">
    <div class="absolute inset-0 bg-luxury-pattern opacity-[0.07]"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 relative z-10">
        <nav class="flex items-center gap-2 text-sm text-dark-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-gold-300 transition">Ana Sayfa</a>
            <i class="fas fa-chevron-right text-[10px] text-dark-600"></i>
            <a href="{{ route('products') }}" class="hover:text-gold-300 transition">Ürünler</a>
            <i class="fas fa-chevron-right text-[10px] text-dark-600"></i>
            <span class="text-gold-300 font-medium">{{ $kategori->kategori_adi }}</span>
        </nav>
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div>
                <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-4 leading-tight">{{ $kategori->kategori_adi }}</h1>
                @if($kategori->aciklama)
                    <p class="text-dark-400 text-lg max-w-2xl leading-relaxed">{{ $kategori->aciklama }}</p>
                @endif
            </div>
            <div class="flex items-center gap-3 bg-white/[0.03] border border-white/[0.06] rounded-2xl px-5 py-3 backdrop-blur-sm">
                <div class="w-10 h-10 bg-gold-500/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-gold-400 text-sm"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white font-serif">{{ $urunler->total() }}</p>
                    <p class="text-xs text-dark-500">Ürün</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 md:py-16 bg-cream-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($kategori->altKategoriler && $kategori->altKategoriler->count() > 0)
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-5">
                    <span class="w-8 h-px bg-gold-400"></span>
                    <span class="text-gold-600 text-sm font-medium tracking-wider uppercase">Alt Kategoriler</span>
                </div>
                <div class="flex flex-wrap gap-3">
                    @foreach($kategori->altKategoriler as $alt)
                        <a href="{{ route('category', $alt->slug) }}" class="bg-white border border-dark-100 rounded-full px-5 py-2.5 text-sm text-dark-600 hover:border-gold-300 hover:text-gold-600 hover:shadow-md hover:shadow-gold-500/10 transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-folder-open text-gold-400 text-xs"></i>
                            {{ $alt->kategori_adi }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if($urunler->count() > 0)
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-dark-400">{{ $urunler->firstItem() }} - {{ $urunler->lastItem() }} / {{ $urunler->total() }} ürün</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-dark-400">Sıralama:</span>
                    <select onchange="window.location.href=this.value" class="bg-white border border-dark-200 rounded-lg px-3 py-2 text-sm text-dark-700 focus:border-gold-400 focus:ring-1 focus:ring-gold-400/20 outline-none cursor-pointer">
                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'newest']) }}" {{ request('sort')=='newest' || !request('sort') ? 'selected' : '' }}>En Yeniler</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_asc']) }}" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Fiyat: Düşükten Yükseğe</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_desc']) }}" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Fiyat: Yüksekten Düşüğe</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort'=>'popular']) }}" {{ request('sort')=='popular' ? 'selected' : '' }}>En Çok Satan</option>
                    </select>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-6">
            @forelse($urunler as $urun)
                <x-urun-card :urun="$urun" :favoriIds="$favoriIds ?? []" />
            @empty
                <div class="col-span-full text-center py-24">
                    <div class="w-28 h-28 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6 shadow-inner">
                        <i class="fas fa-box-open text-5xl text-dark-200"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-dark-800 mb-2">Henüz Ürün Yok</h3>
                    <p class="text-dark-400 mb-8 max-w-md mx-auto">Bu kategoride henüz ürün bulunmuyor. Diğer kategorilerimize göz atabilirsiniz.</p>
                    <a href="{{ route('products') }}" class="btn-gold">
                        <i class="fas fa-th-large mr-2"></i>Tüm Ürünleri Keşfet
                    </a>
                </div>
            @endforelse
        </div>

        @if($urunler->count() > 0)
            <div class="mt-12 flex justify-center">
                <div class="bg-white rounded-xl shadow-sm border border-dark-100/50 px-4 py-2">
                    {{ $urunler->links() }}
                </div>
            </div>
        @endif
    </div>
</section>
@endsection