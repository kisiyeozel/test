@extends('layouts.app')
@section('title', 'Sipariş Detayı')
@section('content')

<div class="bg-cream-50 border-b">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex items-center gap-2 text-sm text-dark-400 mb-2">
            <a href="{{ route('siparislerim') }}" class="hover:text-gold-600 transition"><i class="fas fa-arrow-left mr-1"></i>Siparişlerim</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-300"></i>
            <span class="text-dark-900 font-medium">{{ $siparis->siparis_no }}</span>
        </nav>
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Sipariş Detayı</h1>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    <div class="bg-white rounded-2xl border border-dark-100 p-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center"><i class="fas fa-receipt text-gold-500"></i></div>
                <div>
                    <p class="text-sm text-dark-400">Sipariş No</p>
                    <p class="font-mono font-bold text-dark-900 text-lg">{{ $siparis->siparis_no }}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm text-dark-400">{{ $siparis->created_at->format('d.m.Y H:i') }}</p>
                <span class="badge mt-1 inline-block
                    @if($siparis->siparis_durumu == 'teslim_edildi') badge-green
                    @elseif($siparis->siparis_durumu == 'kargoya_verildi') badge bg-blue-100 text-blue-700
                    @elseif($siparis->siparis_durumu == 'hazirlaniyor') badge-yellow
                    @else badge bg-cream-100 text-dark-700 @endif">
                    {{ str_replace(['_'], ' ', ucfirst($siparis->siparis_durumu)) }}
                </span>
            </div>
        </div>

        <div class="space-y-3">
            @foreach($siparis->urunler as $item)
                <div class="flex items-center gap-4 p-3 bg-cream-50 rounded-xl">
                    <div class="w-16 h-16 bg-white rounded-xl overflow-hidden shrink-0 shadow-sm">
                        @if($item->urun_foto)<img src="{{ \App\Services\ImageService::getUrl($item->urun_foto, 80, 80) }}" class="w-full h-full object-cover" loading="lazy" decoding="async" width="80" height="80">@endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-dark-900 truncate">{{ $item->urun_adi }}</p>
                        @if($item->kisisellestirme_bilgisi)
                            @php $k = is_array($item->kisisellestirme_bilgisi) ? $item->kisisellestirme_bilgisi : json_decode($item->kisisellestirme_bilgisi, true); @endphp
                            <div class="text-xs text-dark-400 mt-0.5 space-y-0.5">
                                @foreach($k as $key => $val)
                                    @if(!$val || $key == 'fotograf') @continue @endif
                                    <span><span class="text-dark-500">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span> {{ is_array($val) ? implode(', ', $val) : $val }}</span><br>
                                @endforeach
                            </div>
                        @endif
                        <p class="text-xs text-dark-400">{{ number_format($item->birim_fiyat, 2) }} ₺ x {{ $item->adet }} adet</p>
                    </div>
                    <p class="font-bold text-lg text-gold-600">{{ number_format($item->toplam, 2) }} ₺</p>
                </div>
            @endforeach
        </div>

        <div class="mt-6 pt-6 border-t border-dark-100 space-y-2 text-sm">
            @php $kdvOrani = (float)(\App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger') ?? 0); $kdvTutari = $kdvOrani > 0 ? $siparis->ara_toplam * $kdvOrani / (100 + $kdvOrani) : 0; @endphp
            <div class="flex justify-between"><span class="text-dark-400">Ara Toplam</span><span class="font-medium">{{ number_format($siparis->ara_toplam, 2) }} ₺</span></div>
            @if($kdvOrani > 0)
                <div class="flex justify-between text-xs text-dark-400"><span>KDV (%{{ $kdvOrani }})</span><span>{{ number_format($kdvTutari, 2) }} ₺</span></div>
            @endif
            <div class="flex justify-between"><span class="text-dark-400">Kargo Ücreti</span><span class="font-medium">{{ number_format($siparis->kargo_ucreti, 2) }} ₺</span></div>
            @if($siparis->indirim_tutari > 0)
                <div class="flex justify-between text-green-600"><span>İndirim</span><span>-{{ number_format($siparis->indirim_tutari, 2) }} ₺</span></div>
            @endif
            <hr class="border-dark-100">
            <div class="flex justify-between text-lg font-bold"><span>Toplam</span><span class="text-gold-600">{{ number_format($siparis->genel_toplam, 2) }} ₺</span></div>
        </div>
    </div>

    @if($siparis->kargo_firmasi)
        <div class="bg-white rounded-2xl border border-dark-100 p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-shipping-fast text-gold-500"></i>Kargo Takip</h3>
            <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-xl">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center"><i class="fas fa-truck text-blue-600"></i></div>
                <div>
                    <p class="font-medium text-dark-900">{{ $siparis->kargo_firmasi }}</p>
                    <p class="text-sm text-dark-400 font-mono">{{ $siparis->takip_kodu }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="flex items-center justify-between">
        <a href="{{ route('siparislerim') }}" class="text-sm text-dark-400 hover:text-gold-600 transition flex items-center gap-1"><i class="fas fa-arrow-left"></i> Tüm Siparişlerim</a>
    </div>
</div>
@endsection
