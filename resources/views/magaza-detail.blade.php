@extends('layouts.app')
@section('title', $magaza->magaza_adi)
@section('meta_desc', ($magaza->aciklama ?? $magaza->magaza_adi . ' mağazası') . ' – Her Ürün Size Özel')

@section('content')
{{-- Store Header --}}
<section class="relative overflow-hidden bg-gradient-to-br from-dark-950 via-dark-900 to-gold-950 noise-overlay">
    @if($magaza->banner)
        <div class="absolute inset-0">
            <img src="{{ \App\Services\ImageService::getUrl($magaza->banner, 1200, 600) }}"
                 class="w-full h-full object-cover opacity-30"
                 alt=""
                 loading="lazy"
                 decoding="async"
                 width="1200"
                 height="600">
            <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-dark-950/80 to-dark-900/60"></div>
        </div>
    @else
        <div class="absolute inset-0">
            <img src="{{ \App\Services\MagazaGorselService::getBannerUrl($magaza->magaza_adi, $magaza->slogan, 1200, 600) }}"
                 class="w-full h-full object-cover opacity-30"
                 alt=""
                 loading="lazy"
                 width="1200"
                 height="600">
            <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-dark-950/80 to-dark-900/60"></div>
        </div>
    @endif
    <div class="gradient-mesh absolute inset-0 opacity-60"></div>
    <div class="absolute inset-0 bg-luxury-pattern opacity-10"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="section-shape" style="width:500px;height:500px;background:radial-gradient(circle,rgba(212,168,83,0.08),transparent);top:-15%;right:-10%;--shape-dur:14s"></div>
    <div class="section-shape" style="width:400px;height:400px;background:radial-gradient(circle,rgba(212,168,83,0.06),transparent);bottom:-15%;left:-10%;--shape-dur:16s;--shape-delay:2s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8 reveal">
            <div class="w-28 h-28 md:w-36 md:h-36 bg-gradient-to-br from-gold-500/20 to-gold-300/10 rounded-3xl flex items-center justify-center shrink-0 overflow-hidden ring-4 ring-gold-500/20 shadow-2xl shadow-gold-500/20">
                @if($magaza->logo)
                    <img src="{{ \App\Services\ImageService::getUrl($magaza->logo, 150, 150) }}"
                         class="w-full h-full object-cover"
                         alt="{{ $magaza->magaza_adi }}"
                         loading="lazy"
                         decoding="async"
                         width="150"
                         height="150">
                @else
                    <img src="{{ \App\Services\MagazaGorselService::getLogoUrl($magaza->magaza_adi, 150) }}"
                         class="w-full h-full object-cover"
                         alt="{{ $magaza->magaza_adi }}"
                         loading="lazy"
                         width="150"
                         height="150">
                @endif
            </div>
            <div class="flex-1 text-center md:text-left">
                <div class="flex flex-col md:flex-row md:items-center gap-3 mb-1">
                    <h1 class="text-3xl md:text-5xl font-serif font-bold text-white leading-tight">{{ $magaza->magaza_adi }}</h1>
                    <div class="flex items-center justify-center md:justify-start gap-2">
                        <span class="px-3 py-1 bg-gold-500/15 text-gold-300 text-xs rounded-full border border-gold-500/20 font-medium"><i class="fas fa-check-circle mr-1"></i>Onaylı Mağaza</span>
                    </div>
                </div>
                @if($magaza->slogan)
                    <p class="text-lg md:text-xl text-gold-300 font-medium font-sans mb-3">"{{ $magaza->slogan }}"</p>
                @else
                    <p class="text-lg md:text-xl text-gold-300 font-medium font-sans mb-3">"Biz ki&#351;iye &#246;zel &#252;r&#252;nler tasarlan&#305;yoruz"</p>
                @endif
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 md:gap-6 text-sm text-dark-400 mb-5">
                    @if($magaza->sehir)
                        <span class="flex items-center gap-1.5"><i class="fas fa-map-marker-alt text-gold-400"></i>{{ $magaza->sehir }}</span>
                    @endif
                    <span class="flex items-center gap-1.5"><i class="fas fa-box text-gold-400"></i>{{ $urunler->total() }} ürün</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-calendar-alt text-gold-400"></i>{{ $magaza->created_at->diffForHumans() }} katıldı</span>
                </div>
                @if($magaza->aciklama)
                    <div class="max-w-2xl mx-auto md:mx-0">
                        <p class="text-dark-300 leading-relaxed font-sans text-sm md:text-base border-l-2 border-gold-500/30 pl-4 italic">{{ $magaza->aciklama }}</p>
                    </div>
                @endif
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mt-6">
                    <a href="#" class="btn-gold !py-2.5 !px-5 text-sm"><i class="fas fa-envelope mr-1.5"></i>Mağazaya Mesaj Gönder</a>
                    @if($magaza->website)
                        <a href="{{ $magaza->website }}" target="_blank" class="btn-outline-gold !py-2.5 !px-5 text-sm"><i class="fas fa-globe mr-1.5"></i>Web Sitesi</a>
                    @endif
                    <div class="flex items-center gap-2">
                        <a href="https://wa.me/?text={{ urlencode($magaza->magaza_adi . ' mağazasını keşfet: ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-dark-800 hover:bg-green-600 text-dark-400 hover:text-white rounded-xl flex items-center justify-center transition-all"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-dark-800 hover:bg-blue-600 text-dark-400 hover:text-white rounded-xl flex items-center justify-center transition-all"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($magaza->magaza_adi . ' — Her Ürün Size Özel') }}&url={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-dark-800 hover:bg-sky-500 text-dark-400 hover:text-white rounded-xl flex items-center justify-center transition-all"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-cream-50 to-transparent"></div>
</section>

{{-- Gold Divider --}}
<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative -mt-6 z-20 flex items-center justify-center">
        <div class="bg-cream-50 px-8 py-3 rounded-2xl shadow-lg border border-gold-200/50 flex items-center gap-6 text-sm">
            <span class="text-dark-500"><i class="fas fa-check-circle text-gold-500 mr-1.5"></i>Güvenli Mağaza</span>
            <span class="w-px h-4 bg-gold-200"></span>
            <span class="text-dark-500"><i class="fas fa-truck text-gold-500 mr-1.5"></i>Hızlı Kargo</span>
            <span class="w-px h-4 bg-gold-200 hidden sm:block"></span>
            <span class="text-dark-500 hidden sm:inline"><i class="fas fa-undo text-gold-500 mr-1.5"></i>Kolay İade</span>
        </div>
    </div>
</div>

{{-- Products --}}
<section class="bg-cream-50 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10 reveal">
            <div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Ürünler</span>
                <div class="gold-line mt-2 mb-3"></div>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-dark-900">{{ $magaza->magaza_adi }} Ürünleri</h2>
            </div>
            <a href="{{ route('magazalar') }}" class="btn-outline-gold !py-2 !px-4 text-xs shrink-0"><i class="fas fa-store mr-1"></i>Tüm Mağazalar</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
            @forelse($urunler as $urun)
                <div class="reveal card-shine" style="transition-delay: {{ $loop->index * 0.08 }}s">
                    <x-urun-card :urun="$urun" :favoriIds="$favoriIds ?? []" />
                </div>
            @empty
                <div class="col-span-full">
                    <div class="luxury-card p-16 text-center">
                        <div class="w-28 h-28 mx-auto bg-gradient-to-br from-gold-50 to-cream-100 rounded-full flex items-center justify-center mb-6 shadow-inner">
                            <i class="fas fa-box-open text-5xl text-gold-300"></i>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-dark-700 mb-2">Henüz Ürün Eklenmemiş</h3>
                        <p class="text-dark-400 text-sm max-w-md mx-auto mb-6">Bu mağazaya henüz ürün eklenmemiş. Yeni ürünler eklendiğinde burada göreceksiniz.</p>
                        <a href="{{ route('products') }}" class="btn-gold !py-2.5 !px-6 text-sm"><i class="fas fa-arrow-right mr-1.5"></i>Diğer Ürünlere Göz At</a>
                    </div>
                </div>
            @endforelse
        </div>

        @if($urunler->hasPages())
            <div class="mt-12 reveal">{{ $urunler->links() }}</div>
        @endif
    </div>
</section>

{{-- Gallery --}}
@if($magaza->gorseller->count())
@php $gorseller = $magaza->gorseller->values(); $gorsellerJson = json_encode($gorseller->toArray()); @endphp
<section class="relative py-12 md:py-16 overflow-hidden"
         style="background: linear-gradient(160deg, #fdf8ed 0%, #fcf6e8 30%, #fefcf7 60%, #f9edcc 100%);"
         x-data='{
             items: {!! $gorsellerJson !!},
             index: -1,
             get current() { return this.items[this.index] },
             get total() { return this.items.length },
             prev() { this.index = (this.index - 1 + this.total) % this.total },
             next() { this.index = (this.index + 1) % this.total },
             open(i) { this.index = i; document.body.style.overflow = "hidden" },
             close() { this.index = -1; document.body.style.overflow = "" }
         }'
         @keydown.left.window="if (index >= 0) prev()"
         @keydown.right.window="if (index >= 0) next()"
         @keydown.escape.window="if (index >= 0) close()">
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-300/40 to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 pointer-events-none opacity-30" style="background: radial-gradient(circle, rgba(212,168,83,0.15), transparent 70%);"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 pointer-events-none opacity-20" style="background: radial-gradient(circle, rgba(212,168,83,0.12), transparent 70%); transform: translate(-20%, 20%);"></div>
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 reveal">
            <div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Portföy</span>
                <div class="gold-line mt-2 mb-3"></div>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-dark-900">{{ $magaza->magaza_adi }} Galerisi</h2>
            </div>
            <div class="flex gap-2 shrink-0">
                <button @click="$refs.scroller.scrollBy({ left: -320, behavior: 'smooth' })"
                        class="w-11 h-11 bg-white border border-dark-200 hover:bg-gradient-to-br hover:from-gold-50 hover:to-gold-100 hover:border-gold-400 text-dark-500 hover:text-gold-600 rounded-xl flex items-center justify-center transition-all shadow-sm hover:shadow-md"><i class="fas fa-chevron-left"></i></button>
                <button @click="$refs.scroller.scrollBy({ left: 320, behavior: 'smooth' })"
                        class="w-11 h-11 bg-white border border-dark-200 hover:bg-gradient-to-br hover:from-gold-50 hover:to-gold-100 hover:border-gold-400 text-dark-500 hover:text-gold-600 rounded-xl flex items-center justify-center transition-all shadow-sm hover:shadow-md"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="relative">
            <div class="absolute left-0 top-0 bottom-0 w-16 z-10 pointer-events-none"
                 style="background: linear-gradient(to right, white 10%, transparent);"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 z-10 pointer-events-none"
                 style="background: linear-gradient(to left, white 10%, transparent);"></div>

            <div x-ref="scroller"
                 class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 pt-2 px-2"
                 style="scrollbar-width: none; -ms-overflow-style: none;">
                <style>.flex.gap-6::-webkit-scrollbar { display: none; }</style>
                @foreach($gorseller as $i => $gorsel)
                    <div class="snap-start shrink-0 w-48 group cursor-pointer"
                         @click="open({{ $i }})">
                        <div class="relative rounded-xl overflow-hidden bg-white shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-400 border border-dark-100/50 hover:border-gold-300/60">
                            <div class="absolute top-0 left-0 right-0 h-0.5 z-20"
                                 style="background: linear-gradient(90deg, #d4a853, #f5d77b, #d4a853);"></div>

                            <div class="relative h-36 overflow-hidden bg-gradient-to-br from-dark-50 to-cream-50">
                                <img src="{{ asset('storage/' . $gorsel->dosya_yolu) }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                     loading="lazy"
                                     alt="{{ $gorsel->baslik ?? '' }}">

                                <div class="absolute inset-0 bg-dark-900/40 opacity-0 group-hover:opacity-100 transition-all duration-400 flex items-center justify-center">
                                    <div class="w-10 h-10 bg-white/90 rounded-xl flex items-center justify-center text-dark-700 shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-400">
                                        <i class="fas fa-expand text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="px-3.5 py-2.5">
                                @if($gorsel->baslik)
                                    <p class="text-xs font-medium text-dark-700 truncate">{{ $gorsel->baslik }}</p>
                                @else
                                    <p class="text-xs text-dark-400 truncate">{{ $magaza->magaza_adi }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex items-center justify-center gap-2 mt-6">
                @foreach($gorseller as $i => $gorsel)
                    <button @click="$refs.scroller.children[{{ $i }}].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' })"
                            class="rounded-full transition-all duration-400 {{ $i === 0 ? 'bg-gold-500 w-8 h-2.5' : 'bg-dark-200 hover:bg-gold-400 w-2.5 h-2.5' }}"></button>
                @endforeach
            </div>
        </div>
    </div>

    <div x-show="index >= 0" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center"
         style="background: rgba(0,0,0,0.92); backdrop-filter: blur(4px);"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         @click="close()">

        <div class="relative max-w-4xl w-full mx-4" @click.stop>
            <div class="flex items-center justify-between px-5 py-3 mb-3 rounded-xl"
                 style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg overflow-hidden bg-gold-500/20 flex items-center justify-center shrink-0">
                        @if($magaza->logo)
                            <img src="{{ \App\Services\ImageService::getUrl($magaza->logo, 40, 40) }}" class="w-full h-full object-cover" alt="">
                        @else
                            <i class="fas fa-store text-gold-400 text-sm"></i>
                        @endif
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold">{{ $magaza->magaza_adi }}</p>
                        <p class="text-white/50 text-xs" x-text="(index + 1) + ' / ' + total"></p>
                    </div>
                </div>
                <button @click="close()" class="w-10 h-10 hover:bg-white/10 text-white/70 hover:text-white rounded-xl flex items-center justify-center transition"><i class="fas fa-times text-lg"></i></button>
            </div>

            <div class="relative flex items-center justify-center">
                <button @click="prev()" class="absolute left-0 z-10 -translate-x-3 w-10 h-10 bg-white/10 hover:bg-white/25 text-white rounded-full flex items-center justify-center transition shadow-lg backdrop-blur-sm"><i class="fas fa-chevron-left"></i></button>

                <div class="flex flex-col items-center w-full">
                    <div class="w-full rounded-xl overflow-hidden shadow-2xl"
                         style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                        <img :src="current.dosya_yolu ? '/storage/' + current.dosya_yolu : ''"
                             class="w-full max-h-[55vh] object-contain mx-auto"
                             alt="">
                    </div>
                    <p class="mt-4 text-white/70 text-sm font-medium text-center max-w-lg" x-text="current.baslik || ''" x-show="current.baslik"></p>
                </div>

                <button @click="next()" class="absolute right-0 z-10 translate-x-3 w-10 h-10 bg-white/10 hover:bg-white/25 text-white rounded-full flex items-center justify-center transition shadow-lg backdrop-blur-sm"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
