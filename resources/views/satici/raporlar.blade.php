@extends('layouts.satici') @section('title', 'Raporlar') @section('page_title', 'Satış Raporları')
@section('content')
<div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
    <div class="luxury-card p-6">
        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mb-3"><i class="fas fa-money-bill-wave text-green-600"></i></div>
        <p class="text-sm text-dark-400">Toplam Kazanç</p>
        <p class="text-2xl font-bold text-green-600 mt-1">{{ number_format($toplamKazanc, 2) }} ₺</p>
    </div>
    <div class="luxury-card p-6">
        <div class="w-10 h-10 bg-gold-100 rounded-xl flex items-center justify-center mb-3"><i class="fas fa-shopping-bag text-gold-600"></i></div>
        <p class="text-sm text-dark-400">Toplam Sipariş</p>
        <p class="text-2xl font-bold text-dark-900 mt-1">{{ $siparisler->count() }}</p>
    </div>
</div>

<div class="luxury-card overflow-hidden">
    <div class="p-5 border-b border-cream-100 flex items-center gap-2">
        <i class="fas fa-chart-bar text-gold-500"></i>
        <h3 class="font-semibold text-dark-900">Aylık Satışlar</h3>
    </div>
    <div class="divide-y divide-cream-100">
        @forelse($aylikSatis as $satis)
            <div class="px-5 py-4 flex items-center justify-between hover:bg-cream-50 transition">
                <span class="text-sm font-medium text-dark-800">{{ $satis->ay }}.{{ $satis->yil }}</span>
                <span class="font-bold text-green-600">{{ number_format($satis->toplam, 2) }} ₺</span>
            </div>
        @empty
            <div class="px-5 py-12 text-center text-dark-400">
                <i class="fas fa-chart-line text-3xl text-dark-200 mb-3"></i>
                <p>Henüz satış verisi yok.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
