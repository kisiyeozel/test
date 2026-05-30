@extends('layouts.app')

@section('title', 'SSS')
@section('meta_desc', 'Sık sorulan sorular ve cevapları')

@section('content')
<div class="bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950 border-b border-gold-500/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="flex items-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-400 text-sm tracking-[0.2em] uppercase font-sans font-medium">Yardım</span>
        </div>
        <h1 class="section-title text-white">Sık Sorulan Sorular</h1>
        <p class="section-subtitle text-dark-300">Merak ettiğiniz her şeyin cevabı burada</p>
    </div>
</div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @forelse($sssListe as $kategori => $sorular)
        <div class="mb-12 last:mb-0">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-gold-50 rounded-xl flex items-center justify-center shrink-0">
                    <i class="fas fa-question-circle text-gold-500"></i>
                </div>
                <h3 class="text-xl font-serif font-bold text-dark-900">{{ $kategori ?: 'Genel' }}</h3>
            </div>
            <div class="space-y-3">
                @foreach($sorular as $soru)
                    <div class="luxury-card overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-5 text-left">
                            <span class="font-medium text-dark-900 pr-4 text-sm">{{ $soru->soru }}</span>
                            <i class="fas fa-chevron-down text-dark-400 transition-transform shrink-0 text-xs" :class="open && 'rotate-180'"></i>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-dark-500 leading-relaxed text-sm border-t border-dark-100 pt-4">{{ $soru->cevap }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6"><i class="fas fa-question text-4xl text-dark-300"></i></div>
            <p class="text-dark-400 font-medium">Henüz soru eklenmemiş.</p>
        </div>
    @endforelse

    <div class="text-center mt-12 p-8 bg-gradient-to-br from-gold-50 to-cream-50 rounded-2xl border border-gold-100">
        <div class="w-14 h-14 mx-auto bg-gold-100 rounded-xl flex items-center justify-center mb-4">
            <i class="fas fa-headset text-gold-500 text-xl"></i>
        </div>
        <h3 class="font-serif text-xl font-bold text-dark-900 mb-2">Sorunuz mu var?</h3>
        <p class="text-dark-400 text-sm mb-5">Yukarıda cevabını bulamadıysanız, bize doğrudan ulaşın.</p>
        <a href="{{ route('contact') }}" class="btn-gold"><i class="fas fa-envelope"></i>Bize Yazın</a>
    </div>
</div>
@endsection
