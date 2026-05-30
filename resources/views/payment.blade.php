@extends('layouts.app')
@section('title', 'Ödeme')
@section('meta_desc', 'Güvenli ödeme sayfası')

@section('content')
<div class="bg-cream-50 border-b">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Ödeme</h1>
    </div>
</div>

<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    <div class="bg-white rounded-2xl border border-dark-100 p-6 text-center">
        <div class="w-16 h-16 mx-auto bg-gold-50 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-lock text-2xl text-gold-500"></i></div>
        <h2 class="text-xl font-bold text-dark-900 mb-1">Güvenli Ödeme</h2>
        <p class="text-dark-400 text-sm">Sipariş No: <span class="font-mono font-medium">{{ $siparis->siparis_no }}</span></p>
        <p class="text-3xl font-bold text-gold-600 mt-4">{{ number_format($siparis->genel_toplam, 2) }} <span class="text-sm font-normal">₺</span></p>
        <div class="flex items-center justify-center gap-2 mt-4 text-xs text-dark-400">
            <i class="fab fa-cc-visa text-xl"></i>
            <i class="fab fa-cc-mastercard text-xl"></i>
            <span>256-bit SSL</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-dark-100 overflow-hidden">
        <iframe src="https://www.paytr.com/odeme/guvenli/{{ $token }}" id="paytriframe" frameborder="0" scrolling="yes" style="width:100%;min-height:650px;"></iframe>
    </div>
</div>
@endsection
