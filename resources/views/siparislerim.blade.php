@extends('layouts.app')

@section('title', 'Siparişlerim')
@section('meta_desc', 'Sipariş geçmişiniz ve durum takibi')

@section('content')
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Siparişlerim</h1>
        <p class="text-dark-400 mt-2">Tüm siparişlerinizi buradan takip edin</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if($siparisler->count() > 0)
        <div class="space-y-4">
            @foreach($siparisler as $siparis)
                <div class="bg-white rounded-2xl border border-dark-100 p-6 card-hover">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center"><i class="fas fa-receipt text-gold-500"></i></div>
                            <div>
                                <p class="text-sm text-dark-400">Sipariş No</p>
                                <p class="font-mono font-medium text-dark-900">{{ $siparis->siparis_no }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <p class="text-sm text-dark-400 hidden sm:block">{{ $siparis->created_at->format('d.m.Y H:i') }}</p>
                            <span class="badge
                                @if($siparis->siparis_durumu == 'teslim_edildi') badge-green
                                @elseif($siparis->siparis_durumu == 'kargoya_verildi') badge bg-blue-100 text-blue-700
                                @elseif($siparis->siparis_durumu == 'hazirlaniyor') badge-yellow
                                @else badge bg-cream-100 text-dark-700 @endif">
                                @switch($siparis->siparis_durumu)
                                    @case('alinan') <i class="fas fa-check-circle"></i> Sipariş Alındı @break
                                    @case('hazirlaniyor') <i class="fas fa-spinner"></i> Hazırlanıyor @break
                                    @case('kargoya_verildi') <i class="fas fa-truck"></i> Kargoya Verildi @break
                                    @case('teslim_edildi') <i class="fas fa-check-double"></i> Teslim Edildi @break
                                    @case('iade_edildi') <i class="fas fa-undo"></i> İade Edildi @break
                                    @default {{ $siparis->siparis_durumu }}
                                @endswitch
                            </span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        @foreach($siparis->urunler as $item)
                            <div class="flex items-center gap-4 py-2 border-b border-dark-50 last:border-0">
                                <div class="w-14 h-14 bg-cream-50 rounded-xl overflow-hidden shrink-0">
                                    @if($item->urun_foto)<img src="{{ asset('storage/' . $item->urun_foto) }}" class="w-full h-full object-cover">@endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-dark-900 truncate">{{ $item->urun_adi }}</p>
                                    <p class="text-xs text-dark-400">{{ $item->adet }} adet x {{ number_format($item->birim_fiyat, 2) }} ₺</p>
                                </div>
                                <p class="text-sm font-semibold">{{ number_format($item->toplam, 2) }} ₺</p>
                            </div>
                        @endforeach
                    </div>
                    @if($siparis->kargo_firmasi)
                        <div class="mt-4 pt-4 border-t border-dark-50 flex items-center gap-2 text-xs text-dark-400">
                            <i class="fas fa-shipping-fast text-gold-400"></i>
                            {{ $siparis->kargo_firmasi }} — {{ $siparis->takip_kodu }}
                        </div>
                    @endif
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-dark-100">
                        <div></div>
                        <div class="flex items-center gap-4">
                            <p class="text-xl font-bold text-gold-600">{{ number_format($siparis->genel_toplam, 2) }} <span class="text-sm font-normal">₺</span></p>
                            <a href="{{ route('siparis.detay', $siparis->id) }}" class="btn-outline-gold !py-2 !px-4 text-sm">Detay <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6"><i class="fas fa-box text-4xl text-gray-300"></i></div>
            <h2 class="text-2xl font-bold text-dark-900 mb-2">Henüz Siparişiniz Yok</h2>
            <p class="text-dark-400 mb-8">İlk siparişinizi vermek için alışverişe başlayın.</p>
            <a href="{{ route('products') }}" class="btn-gold">Alışverişe Başla</a>
        </div>
    @endif
</div>

@push('styles')
<style>
    .badge i { margin-right: 4px; }
</style>
@endpush
@endsection
