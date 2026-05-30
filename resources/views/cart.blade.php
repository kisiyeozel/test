@extends('layouts.app')

@section('title', 'Sepetim')

@section('content')
<div class="bg-cream-100/50 border-b border-gold-100/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center gap-4 mb-2">
            <div class="gold-line"></div>
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Alışveriş</span>
        </div>
        <h1 class="section-title">Sepetim</h1>
        <p class="section-subtitle">{{ count($cart) }} ürün</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(count($cart) > 0)
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $key => $item)
                    <div class="luxury-card p-4 md:p-6 flex items-center gap-4">
                        <div class="w-20 h-20 md:w-24 md:h-24 bg-cream-100 rounded-xl overflow-hidden shrink-0">
                            @if($item['resim'])
                                <img src="{{ \App\Services\ImageService::getUrl($item['resim'], 100, 100) }}" class="w-full h-full object-cover" loading="lazy" decoding="async" width="100" height="100">
                            @else
                                <div class="w-full h-full flex items-center justify-center"><i class="fas fa-image text-dark-200"></i></div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-serif font-semibold text-dark-900 truncate">{{ $item['ad'] }}</h3>
                            @if(!empty($item['kisisellestirme']))
                                <div class="mt-1.5 space-y-0.5">
                                    @foreach($item['kisisellestirme'] as $k => $v)
                                        @if(!$v || $k == 'fotograf') @continue @endif
                                        <span class="text-xs text-dark-500 block"><span class="text-dark-400 font-medium">{{ ucfirst(str_replace('_', ' ', $k)) }}:</span> {{ is_array($v) ? implode(', ', $v) : $v }}</span>
                                    @endforeach
                                    @if(!empty($item['kisisellestirme']['fotograf']) && !is_string($item['kisisellestirme']['fotograf']))
                                        <span class="text-xs text-dark-500 block"><span class="text-dark-400 font-medium">Fotoğraf:</span> Yüklendi</span>
                                    @endif
                                </div>
                            @endif
                            <p class="text-gold-600 font-bold mt-1 font-serif">{{ number_format($item['fiyat'], 2) }} <span class="text-xs font-sans text-dark-400">₺</span></p>
                        </div>
                        <div class="text-right shrink-0">
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <div class="flex items-center border border-dark-200 rounded-lg overflow-hidden">
                                    <button type="button" onclick="this.parentElement.querySelector('input').stepDown(); this.closest('form').submit();" class="px-3 py-2 text-dark-500 hover:bg-gold-50 transition text-sm">-</button>
                                    <input type="number" name="adet[{{ $key }}]" value="{{ $item['adet'] }}" min="1" class="w-14 text-center border-x-0 py-2 text-sm font-medium">
                                    <button type="button" onclick="this.parentElement.querySelector('input').stepUp(); this.closest('form').submit();" class="px-3 py-2 text-dark-500 hover:bg-gold-50 transition text-sm">+</button>
                                </div>
                            </form>
                            <p class="text-sm font-semibold text-dark-900 mt-2 font-serif">{{ number_format($item['fiyat'] * $item['adet'], 2) }} ₺</p>
                            <a href="{{ route('cart.remove', $key) }}" class="text-xs text-red-500 hover:text-red-600 transition mt-1 inline-block font-sans"><i class="fas fa-trash mr-1"></i>Sil</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="lg:col-span-1">
                <div class="luxury-card p-6 sticky top-24">
                    <h3 class="text-lg font-serif font-bold text-dark-900 mb-6">Sipariş Özeti</h3>
                    <div class="space-y-3 text-sm font-sans">
                        @php $kdvOrani = (float)(\App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger') ?? 0); $kdvTutari = $kdvOrani > 0 ? $araToplam * $kdvOrani / (100 + $kdvOrani) : 0; @endphp
                        <div class="flex justify-between"><span class="text-dark-500">Ara Toplam</span><span class="font-medium text-dark-900">{{ number_format($araToplam, 2) }} ₺</span></div>
                        @if($kdvOrani > 0)
                            <div class="flex justify-between text-xs text-dark-400"><span>KDV (%{{ $kdvOrani }})</span><span>{{ number_format($kdvTutari, 2) }} ₺</span></div>
                        @endif
                        <div class="flex justify-between"><span class="text-dark-500">Kargo</span>
                            <span class="font-medium {{ $kargoUcreti > 0 ? 'text-dark-900' : 'text-emerald-600' }}">
                                {{ $kargoUcreti > 0 ? number_format($kargoUcreti, 2) . ' ₺' : 'Ücretsiz' }}
                            </span>
                        </div>
                        @if($araToplam >= 500)
                            <div class="bg-emerald-50 rounded-lg p-3 flex items-center gap-2 text-xs text-emerald-700"><i class="fas fa-check-circle"></i>500₺ üzeri ücretsiz kargo hakkı kazandınız!</div>
                        @else
                            <div class="bg-gold-50 rounded-lg p-3 flex items-center gap-2 text-xs text-gold-700"><i class="fas fa-info-circle"></i>{{ number_format(500 - $araToplam, 2) }} ₺ daha ekleyin, kargo bedava!</div>
                        @endif
                        <hr class="border-dark-100">
                        <div class="flex justify-between text-lg"><span class="font-semibold text-dark-900">Toplam</span><span class="font-bold text-gold-600 font-serif">{{ number_format($araToplam + $kargoUcreti, 2) }} ₺</span></div>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn-gold w-full justify-center mt-6 shadow-2xl shadow-gold-500/20"><i class="fas fa-lock"></i>Ödemeye Geç</a>
                    <a href="{{ route('products') }}" class="block mt-3 text-center text-sm text-dark-400 hover:text-gold-600 transition font-sans">Alışverişe Devam Et</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-6"><i class="fas fa-shopping-bag text-4xl text-dark-300"></i></div>
            <h2 class="text-2xl font-serif font-bold text-dark-900 mb-2">Sepetiniz Boş</h2>
            <p class="text-dark-400 mb-8 font-sans">Henüz sepete ürün eklemediniz. Alışverişe başlamak için ürünleri keşfedin.</p>
            <a href="{{ route('products') }}" class="btn-gold">Alışverişe Başla</a>
        </div>
    @endif
</div>
@endsection
