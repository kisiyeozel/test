@extends('layouts.app')

@section('title', $urun->urun_adi)
@section('meta_desc', $urun->kisa_aciklama ?? $urun->urun_adi)

 @push('schemas')
<script type="application/ld+json">
@php
$productSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $urun->urun_adi,
    'description' => strip_tags($urun->kisa_aciklama ?? $urun->aciklama),
    'image' => $urun->ana_foto ? asset('storage/' . $urun->ana_foto) : asset('img/no-image.png'),
    'sku' => (string) $urun->id,
    'brand' => [
        '@type' => 'Brand',
        'name' => $urun->magaza->magaza_adi ?? 'kisiyeozel.org',
    ],
    'offers' => [
        '@type' => 'Offer',
        'price' => number_format($urun->fiyat, 2, '.', ''),
        'priceCurrency' => 'TRY',
        'availability' => $urun->stok_durumu == 'var' ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'url' => route('product.detail', $urun->slug),
    ],
];
if ($urun->yorum_sayisi > 0) {
    $productSchema['aggregateRating'] = [
        '@type' => 'AggregateRating',
        'ratingValue' => number_format($urun->yorum_ortalamasi, 1),
        'reviewCount' => $urun->yorum_sayisi,
    ];
}
@endphp
{!! json_encode($productSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('content')
{{-- Breadcrumb --}}
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <nav class="flex items-center gap-2 text-sm text-dark-400">
            <a href="{{ route('home') }}" class="hover:text-gold-600 transition">Ana Sayfa</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-300"></i>
            @if($urun->kategori)
                <a href="{{ route('category', $urun->kategori->slug) }}" class="hover:text-gold-600 transition">{{ $urun->kategori->kategori_adi }}</a>
                <i class="fas fa-chevron-right text-[10px] text-gray-300"></i>
            @endif
            <span class="text-dark-900 font-medium truncate">{{ $urun->urun_adi }}</span>
        </nav>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
        {{-- Ürün Görseli --}}
        <div>
            <div class="bg-white rounded-2xl border border-dark-100 overflow-hidden cursor-pointer relative" onclick="openGallery(0)">
                @if($urun->ana_foto)
                    <img src="{{ \App\Services\ImageService::getUrl($urun->ana_foto, 800, 800) }}"
                         srcset="{{ \App\Services\ImageService::getSrcset($urun->ana_foto, [400, 800, 1200]) }}"
                         sizes="(max-width: 768px) 400w, (max-width: 1200px) 800w, 1200w"
                         alt="{{ $urun->urun_adi }}"
                         class="w-full h-auto"
                         loading="eager"
                         decoding="async"
                         width="800"
                         height="800">
                    <div style="position:absolute;inset:0;pointer-events:none;z-index:2;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect width=%22200%22 height=%22200%22 fill=%22none%22/%3E%3Ctext x=%22100%22 y=%22100%22 text-anchor=%22middle%22 dominant-baseline=%22central%22 font-size=%2218%22 font-weight=%22800%22 font-family=%22serif%22 letter-spacing=%223%22 fill=%22%23d4a853%22 opacity=%220.4%22 transform=%22rotate(-35,100,100)%22%3Ekisiyeozel.org%3C/text%3E%3C/svg%3E');background-repeat:repeat;background-size:150px 150px"></div>
                @else
                    <div class="aspect-square flex items-center justify-center"><i class="fas fa-image text-6xl text-gray-200"></i></div>
                @endif
            </div>
            @if($urun->gorseller->count() > 0)
                <div class="grid grid-cols-4 gap-3 mt-4">
                    @foreach($urun->gorseller as $i => $gorsel)
                        <div class="bg-white rounded-xl border border-dark-100 overflow-hidden cursor-pointer hover:border-gold-300 transition relative" onclick="openGallery({{ $i + 1 }})">
                            <img src="{{ \App\Services\ImageService::getUrl($gorsel->dosya_yolu, 150, 150) }}"
                                 alt="{{ $urun->urun_adi }}"
                                 class="w-full aspect-square object-cover"
                                 loading="lazy"
                                 decoding="async"
                                 width="150"
                                 height="150">
                            <div style="position:absolute;inset:0;pointer-events:none;z-index:2;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22%3E%3Crect width=%22120%22 height=%22120%22 fill=%22none%22/%3E%3Ctext x=%2260%22 y=%2260%22 text-anchor=%22middle%22 dominant-baseline=%22central%22 font-size=%2211%22 font-weight=%22800%22 font-family=%22serif%22 letter-spacing=%222%22 fill=%22%23d4a853%22 opacity=%220.35%22 transform=%22rotate(-35,60,60)%22%3Ekisiyeozel.org%3C/text%3E%3C/svg%3E');background-repeat:repeat;background-size:80px 80px"></div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Ürün Bilgileri --}}
        <div>
            @if($urun->magaza)
                <a href="{{ route('magaza.detail', $urun->magaza->slug) }}" class="inline-flex items-center gap-2 text-sm text-gold-600 hover:text-gold-700 font-medium mb-3 bg-gold-50 px-3 py-1.5 rounded-full">
                    <i class="fas fa-store"></i>{{ $urun->magaza->magaza_adi }}
                </a>
            @endif

            <h1 class="text-2xl md:text-3xl font-bold text-dark-900 mb-4">{{ $urun->urun_adi }}</h1>

            <div class="flex items-center gap-4 mb-6">
                <div class="star-rating">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star{{ $i <= round($urun->yorum_ortalamasi) ? '' : '-o text-gray-200' }}"></i>
                    @endfor
                </div>
                <span class="text-sm text-dark-400">({{ $urun->yorum_sayisi }} yorum)</span>
                <span class="text-gray-300">|</span>
                <span class="text-sm text-dark-400"><i class="fas fa-question-circle mr-1 text-gold-500"></i>{{ $urun->sorular->where('durum', 'yayinda')->count() }} soru</span>
                <span class="text-gray-300">|</span>
                <span class="text-sm text-dark-400"><i class="fas fa-shopping-bag mr-1 text-gold-500"></i>{{ $urun->satis_sayisi }} satış</span>
            </div>

            <div class="flex items-center justify-between mb-6">
                <p class="text-3xl md:text-4xl font-bold text-gold-600">{{ number_format($urun->fiyat, 2) }} <span class="text-sm font-normal">₺</span>
                    @php $kdv = \App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger'); @endphp
                    @if($kdv > 0)
                        <span class="text-xs font-normal text-dark-400 ml-1">(KDV Dahil)</span>
                    @endif
                </p>
                @auth
                    <button type="button" onclick="toggleFavori({{ $urun->id }}, this)" class="favori-btn flex items-center gap-2 px-4 py-2 rounded-full border text-sm font-medium transition-all duration-200 {{ in_array($urun->id, $favoriIds ?? []) ? 'bg-red-50 border-red-200 text-red-500' : 'border-dark-200 text-dark-400 hover:border-red-200 hover:text-red-400 hover:bg-red-50' }}">
                        <i class="fa{{ in_array($urun->id, $favoriIds ?? []) ? 's' : 'r' }} fa-heart"></i>
                        <span>{{ in_array($urun->id, $favoriIds ?? []) ? 'Favorilerden Çıkar' : 'Favorilere Ekle' }}</span>
                    </button>
                @endauth
            </div>

            @if($urun->kisa_aciklama)
                <p class="text-dark-500 mb-6 leading-relaxed">{{ $urun->kisa_aciklama }}</p>
            @endif

            {{-- Adet ve Sepet (form başlangıcı) --}}
            <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $urun->id }}">

                {{-- Kişiselleştirme --}}
                @if($urun->kisinin_adi || $urun->fotograf_yukle || $urun->renk_secimi || $urun->olcu_secimi || $urun->ozel_not)
                    <div class="bg-gradient-to-br from-gold-50 to-cream-50 rounded-2xl p-6 mb-6 border border-gold-100">
                        <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-paint-brush text-gold-500"></i>Kişiselleştirme Seçenekleri</h3>
                        <div class="space-y-4">
                            @if($urun->kisinin_adi)
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">İsim / Yazı</label><input type="text" name="kisisellestirme[isim]" placeholder="Yazılmasını istediğiniz isim" class="input-field"></div>
                            @endif
                            @if($urun->fotograf_yukle)
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Fotoğraf Yükle</label>
                                    <input type="file" name="kisisellestirme[fotograf]" accept="image/*" class="w-full text-sm text-dark-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gold-50 file:text-gold-700 hover:file:bg-gold-100">
                                </div>
                            @endif
                            @if($urun->renk_secimi)
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Renk Seçimi</label>
                                    <div class="flex flex-wrap gap-2.5">
                                        @foreach(['#ef4444','#3b82f6','#22c55e','#eab308','#a855f7','#ec4899','#f97316','#6366f1','#14b8a6'] as $c)
                                            <label class="w-9 h-9 rounded-xl border-2 border-transparent has-[:checked]:border-gold-500 cursor-pointer transition-all hover:scale-110 shadow-sm" style="background:{{ $c }}">
                                                <input type="radio" name="kisisellestirme[renk]" value="{{ $c }}" class="hidden">
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if($urun->olcu_secimi)
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Ölçü / Beden</label>
                                    <select name="kisisellestirme[olcu]" class="input-field w-full">
                                        <option value="">Seçiniz</option>
                                        @foreach(['Standart','Small','Medium','Large','X-Large'] as $olcu)
                                            <option value="{{ $olcu }}">{{ $olcu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if($urun->ozel_not)
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Özel Not</label><textarea name="kisisellestirme[ozel_not]" rows="3" placeholder="Satıcıya iletmek istediğiniz not..." class="input-field"></textarea></div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Varyantlar --}}
                @if($urun->varyantlar->count() > 0)
                    <div class="mb-6">
                        <h3 class="font-semibold text-dark-900 mb-3">Varyantlar</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($urun->varyantlar as $varyant)
                                <label class="px-4 py-2.5 border border-dark-200 rounded-xl text-sm hover:border-gold-400 hover:text-gold-600 transition-all cursor-pointer has-[:checked]:border-gold-500 has-[:checked]:bg-gold-50">
                                    <input type="radio" name="varyant_id" value="{{ $varyant->id }}" class="hidden">
                                    {{ $varyant->deger }}
                                    @if($varyant->fiyat_farki > 0)
                                        <span class="text-gold-500 font-medium">+{{ number_format($varyant->fiyat_farki, 2) }} ₺</span>
                                    @endif
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Adet --}}
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex items-center border border-dark-200 rounded-xl overflow-hidden">
                        <button type="button" onclick="this.parentNode.querySelector('input').stepDown(); this.parentNode.querySelector('input').dispatchEvent(new Event('input'))" class="px-4 py-3 text-dark-400 hover:bg-cream-50 transition font-medium">-</button>
                        <input type="number" name="adet" value="1" min="1" class="w-16 text-center border-x-0 py-3 text-sm font-medium">
                        <button type="button" onclick="this.parentNode.querySelector('input').stepUp(); this.parentNode.querySelector('input').dispatchEvent(new Event('input'))" class="px-4 py-3 text-dark-400 hover:bg-cream-50 transition font-medium">+</button>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="btn-gold w-full justify-center !py-4 shadow-2xl shadow-gold-500/30">
                        <i class="fas fa-shopping-bag"></i> Sepete Ekle
                    </button>
                    @auth
                        <a href="{{ route('favori.add', $urun->id) }}" onclick="event.preventDefault(); document.getElementById('fav-form').submit();" class="w-14 h-14 border border-dark-200 rounded-xl flex items-center justify-center text-dark-400 hover:text-red-500 hover:border-red-200 hover:bg-red-50 transition-all">
                            <i class="far fa-heart text-xl"></i>
                        </a>
                    @endauth
                </div>
            </form>
            @auth
                <form id="fav-form" action="{{ route('favori.add', $urun->id) }}" method="POST" class="hidden">@csrf</form>
            @endauth

            {{-- Teslimat Bilgileri --}}
            <div class="mt-8 p-5 bg-cream-50 rounded-2xl space-y-3 text-sm">
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span>Teslim Süresi: <strong>{{ $urun->teslim_suresi }} {{ $urun->teslim_sure_birimi == 'gun' ? 'gün' : 'saat' }}</strong></span></div>
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span>Stok Durumu: <strong class="{{ $urun->stok_durumu == 'var' ? 'text-green-600' : 'text-red-600' }}">{{ $urun->stok_durumu == 'var' ? 'Stokta' : ($urun->stok_durumu == 'tukendi' ? 'Tükendi' : 'Stok Yok') }}</strong></span></div>
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span><strong>Güvenli Ödeme</strong> — 256-bit SSL ile şifrelenir</span></div>
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span><strong>İade Garantisi</strong> — Hatalı ürünlerde ücretsiz iade</span></div>
            </div>
        </div>
    </div>

    {{-- Ürün Açıklaması --}}
    @if($urun->aciklama)
        <div class="mt-12 bg-white rounded-2xl border border-dark-100 p-8">
            <h2 class="text-xl font-bold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-align-left text-gold-500"></i>Ürün Açıklaması</h2>
            <div class="prose max-w-none text-dark-500 leading-relaxed">{!! nl2br(e($urun->aciklama)) !!}</div>
        </div>
    @endif

    {{-- Yorumlar --}}
    <div class="mt-8 bg-white rounded-2xl border border-dark-100 p-8">
        <h2 class="text-xl font-bold text-dark-900 mb-6 flex items-center gap-2"><i class="fas fa-star text-yellow-500"></i>Yorumlar ({{ $urun->yorum_sayisi }})</h2>
        @forelse($urun->yorumlar->where('durum', 'onayli') as $yorum)
            <div class="border-b border-dark-100 pb-5 mb-5 last:border-0 last:pb-0 last:mb-0">
                <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                        @if($yorum->kullanici)
                        <div class="w-10 h-10 rounded-full overflow-hidden shrink-0{{ $yorum->kullanici->avatar ? '' : ' bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center text-white font-semibold text-sm shadow-sm' }}">
                            @if($yorum->kullanici->avatar)
                                <img src="{{ asset('img/'.$yorum->kullanici->avatar) }}" alt="" class="w-full h-full object-cover">
                            @else
                                {{ $yorum->kullanici->ad_soyad[0] ?? '?' }}
                            @endif
                        </div>
                        <div><p class="font-medium text-dark-900">{{ $yorum->kullanici->ad_soyad ?? 'Anonim' }}</p><p class="text-xs text-dark-400">{{ $yorum->created_at->diffForHumans() }}</p></div>
                        @else
                        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-white font-semibold text-sm">?</div>
                        <div><p class="font-medium text-dark-900">Anonim</p><p class="text-xs text-dark-400">{{ $yorum->created_at?->diffForHumans() ?? '' }}</p></div>
                        @endif
                        </div>
                    <div class="star-rating text-sm">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star{{ $i <= $yorum->puan ? '' : '-o text-gray-200' }}"></i>
                        @endfor
                    </div>
                </div>
                <p class="text-dark-500 text-sm leading-relaxed">{{ $yorum->yorum }}</p>
            </div>
        @empty
            <div class="text-center py-10">
                <div class="w-16 h-16 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-comment text-2xl text-gray-300"></i></div>
                <p class="text-dark-400">Henüz yorum yapılmamış. İlk yorumu siz yapın!</p>
            </div>
        @endforelse

        @auth
            <form action="{{ route('yorum.ekle') }}" method="POST" class="mt-6 border-t border-dark-100 pt-6">
                @csrf
                <input type="hidden" name="urun_id" value="{{ $urun->id }}">
                <h3 class="font-semibold text-dark-900 mb-4">Yorum Yap</h3>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark-700 mb-2">Puanınız</label>
                    <div class="flex gap-1 text-2xl star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <label class="cursor-pointer"><input type="radio" name="puan" value="{{ $i }}" class="hidden"><i class="fas fa-star text-gray-200 hover:text-yellow-400 transition" data-star="{{ $i }}"></i></label>
                        @endfor
                    </div>
                </div>
                <textarea name="yorum" rows="4" class="input-field" placeholder="Yorumunuz..." required></textarea>
                <button type="submit" class="btn-gold mt-3">Gönder</button>
            </form>
        @endauth
    </div>

    {{-- Soru & Cevap --}}
    <div class="mt-10 border-t border-dark-100 pt-8">
        <h2 class="text-xl font-bold text-dark-900 mb-6 flex items-center gap-2"><i class="fas fa-question-circle text-gold-500"></i>Soru & Cevap</h2>

        @if($urun->sorular->where('durum', 'yayinda')->count() > 0)
            <div class="space-y-4 mb-8">
                @foreach($urun->sorular->where('durum', 'yayinda') as $soru)
                    <div class="bg-white rounded-2xl border border-dark-100 p-5">
                        <div class="flex items-start gap-3 mb-2">
                            <div class="w-8 h-8 bg-gold-50 rounded-full flex items-center justify-center shrink-0"><i class="fas fa-user text-gold-500 text-xs"></i></div>
                            <div><p class="font-medium text-dark-900 text-sm">{{ $soru->musteri_adi }}</p><p class="text-xs text-dark-400">{{ $soru->created_at->diffForHumans() }}</p></div>
                        </div>
                        <p class="text-dark-500 text-sm mb-3 pl-11">{{ $soru->soru }}</p>
                        @if($soru->cevap)
                            <div class="bg-gold-50/50 rounded-xl p-4 ml-11 border border-gold-100/50">
                                <div class="flex items-center gap-2 mb-2"><div class="w-6 h-6 bg-gold-500 rounded-full flex items-center justify-center text-white text-[10px] font-bold">S</div><span class="text-xs font-semibold text-gold-700">{{ $soru->cevaplayan->ad_soyad ?? 'Satıcı' }}</span></div>
                                <p class="text-dark-600 text-sm">{{ $soru->cevap }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-dark-400 text-sm mb-6">Henüz soru sorulmamış. İlk soruyu siz sorun!</p>
        @endif

        <form action="{{ route('urun.soru-sor', $urun->id) }}" method="POST" class="bg-white rounded-2xl border border-dark-100 p-6">
            @csrf
            <h3 class="font-semibold text-dark-900 mb-4">Soru Sor</h3>
            @guest
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Adınız *</label>
                    <input type="text" name="musteri_adi" value="{{ old('musteri_adi') }}" class="input-field" required>
                </div>
            @endguest
            <div class="mb-4">
                <label class="block text-sm font-medium text-dark-700 mb-1.5">Sorunuz *</label>
                <textarea name="soru" rows="3" class="input-field" placeholder="Ürün hakkında merak ettiklerinizi sorun..." required>{{ old('soru') }}</textarea>
            </div>
            <button type="submit" class="btn-gold"><i class="fas fa-paper-plane"></i>Gönder</button>
        </form>
    </div>

    {{-- Benzer Ürünler --}}
    @if(count($benzerUrunler) > 0)
        <div class="mt-12">
            <h2 class="text-xl font-bold text-dark-900 mb-6">Benzer Ürünler</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                @foreach($benzerUrunler as $benzer)
                    <x-urun-card :urun="$benzer" :favoriIds="$favoriIds ?? []" />
                @endforeach
            </div>
        </div>
    @endif

    {{-- Sidebar Banner --}}
    @php $sidebarBanner = \App\Models\Banner::where('aktif', true)->where('pozisyon', 'sidebar')->inRandomOrder()->first(); @endphp
    @if($sidebarBanner)
        <a href="{{ $sidebarBanner->link ?: '#' }}" class="mt-8 block relative overflow-hidden rounded-xl h-40 group">
            <img src="{{ asset('storage/banner/' . $sidebarBanner->foto) }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" alt="{{ $sidebarBanner->baslik }}" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-dark-950/70 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4">
                <h3 class="text-white font-serif font-bold text-lg">{{ $sidebarBanner->baslik }}</h3>
                @if($sidebarBanner->alt_baslik)<p class="text-gold-300 text-sm">{{ $sidebarBanner->alt_baslik }}</p>@endif
            </div>
        </a>
    @endif
</div>

{{-- Galeri Lightbox --}}
<div id="productGallery" class="fixed inset-0 hidden" oncontextmenu="return false" style="z-index:99999;background:rgba(10,10,20,0.95);backdrop-filter:blur(8px)">
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative max-w-4xl w-full" style="border:3px solid rgba(212,168,83,0.6);border-radius:20px;padding:6px;background:linear-gradient(135deg,rgba(212,168,83,0.15),rgba(255,255,255,0.05));box-shadow:0 30px 80px rgba(0,0,0,0.6),0 0 60px rgba(212,168,83,0.1)">
            <div style="border-radius:14px;overflow:hidden;position:relative;background:#0a0a14">
                <img id="galleryImg" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain mx-auto" style="filter:drop-shadow(0 0 40px rgba(212,168,83,0.08))" oncontextmenu="return false" ondragstart="return false">
                <div style="position:absolute;inset:0;pointer-events:none;z-index:5;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect width=%22200%22 height=%22200%22 fill=%22none%22/%3E%3Ctext x=%22100%22 y=%22100%22 text-anchor=%22middle%22 dominant-baseline=%22central%22 font-size=%2222%22 font-weight=%22800%22 font-family=%22serif%22 letter-spacing=%223%22 fill=%22%23d4a853%22 opacity=%220.5%22 transform=%22rotate(-35,100,100)%22%3Ekisiyeozel.org%3C/text%3E%3C/svg%3E');background-repeat:repeat;background-size:200px 200px"></div>
            </div>
        </div>
        {{-- Üst çerçeve bilgisi --}}
        <div style="position:absolute;top:20px;left:50%;transform:translateX(-50%);background:rgba(212,168,83,0.12);backdrop-filter:blur(12px);border:1px solid rgba(212,168,83,0.25);border-radius:100px;padding:6px 20px;display:flex;align-items:center;gap:10px">
            <span style="color:#d4a853;font-size:12px;font-weight:600;letter-spacing:2px;text-transform:uppercase;font-family:serif">✦ kisiyeozel.org</span>
            <span id="galleryCounter" style="color:rgba(255,255,255,0.5);font-size:11px;font-weight:500"></span>
        </div>
    </div>
    <button onclick="closeGallery()" style="position:absolute;top:20px;right:20px;z-index:30;width:44px;height:44px;background:rgba(255,255,255,0.08);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.1);border-radius:50%;color:#fff;font-size:18px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s" onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'"><i class="fas fa-times"></i></button>
    <button onclick="prevImage()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);z-index:30;width:48px;height:48px;background:rgba(255,255,255,0.06);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.08);border-radius:50%;color:#d4a853;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s" onmouseover="this.style.background='rgba(212,168,83,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="nextImage()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);z-index:30;width:48px;height:48px;background:rgba(255,255,255,0.06);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.08);border-radius:50%;color:#d4a853;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s" onmouseover="this.style.background='rgba(212,168,83,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'"><i class="fas fa-chevron-right"></i></button>
</div>

@push('scripts')
<script>
const galleryImages = [
    '{{ asset("storage/" . $urun->ana_foto) }}',
    @foreach($urun->gorseller as $g)
        '{{ asset("storage/" . $g->dosya_yolu) }}',
    @endforeach
].filter(Boolean);
let currentIdx = 0;

function openGallery(idx) {
    currentIdx = idx;
    document.getElementById('productGallery').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    showImage();
}

function closeGallery() {
    document.getElementById('productGallery').classList.add('hidden');
    document.body.style.overflow = '';
}

function showImage() {
    document.getElementById('galleryImg').src = galleryImages[currentIdx];
    document.getElementById('galleryCounter').textContent = (currentIdx + 1) + ' / ' + galleryImages.length;
}

function prevImage() {
    currentIdx = (currentIdx - 1 + galleryImages.length) % galleryImages.length;
    showImage();
}

function nextImage() {
    currentIdx = (currentIdx + 1) % galleryImages.length;
    showImage();
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeGallery();
    if (e.key === 'ArrowLeft') prevImage();
    if (e.key === 'ArrowRight') nextImage();
});
</script>
@endpush
@endsection
