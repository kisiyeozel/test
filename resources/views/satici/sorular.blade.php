@extends('layouts.satici')

@section('title', 'Ürün Soruları')
@section('page_title', 'Ürün Soruları')

@section('content')
<div class="space-y-4">
    @if($sorular->count() > 0)
        @foreach($sorular as $soru)
            <div class="bg-white rounded-xl border p-5 {{ $soru->durum == 'beklemede' ? 'border-l-4 border-l-gold-500' : '' }}">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <p class="font-medium text-dark-900">{{ $soru->musteri_adi }}</p>
                        <p class="text-xs text-dark-400">
                            {{ $soru->created_at ? $soru->created_at->diffForHumans() : '' }}
                            — <a href="{{ route('product.detail', $soru->urun->slug) }}" class="text-gold-600 hover:underline" target="_blank">{{ $soru->urun->urun_adi }}</a>
                        </p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full {{ $soru->durum == 'yayinda' ? 'bg-green-100 text-green-700' : 'bg-gold-100 text-gold-700' }}">{{ $soru->durum == 'yayinda' ? 'Cevaplanmış' : 'Beklemede' }}</span>
                </div>
                <p class="text-dark-700 text-sm bg-cream-50 rounded-lg p-3 mb-4">{{ $soru->soru }}</p>

                    @if($soru->cevap)
                        <div class="bg-green-50 rounded-lg p-3 mb-3 border border-green-100">
                            <p class="text-xs font-semibold text-green-700 mb-1">CEVABINIZ: @if($soru->cevaplayan)<span class="font-normal text-green-600">({{ $soru->cevaplayan->ad_soyad }})</span>@endif</p>
                            <p class="text-sm text-dark-700">{{ $soru->cevap }}</p>
                        </div>
                    @endif

                @if($soru->durum == 'beklemede' || !$soru->cevap)
                    <form action="{{ route('satici.soru-cevapla', $soru->id) }}" method="POST" class="mt-3">
                        @csrf
                        <textarea name="cevap" rows="2" class="w-full border border-dark-200 rounded-lg px-3 py-2 text-sm bg-white" placeholder="Cevabınız..." required>{{ $soru->cevap }}</textarea>
                        <div class="flex gap-2 mt-2">
                            <button type="submit" class="px-4 py-2 bg-gold-500 text-white rounded-lg text-sm hover:bg-gold-600 transition">Cevapla & Yayınla</button>
                        </div>
                    </form>
                @endif
            </div>
        @endforeach

        <div class="mt-4">{{ $sorular->links() }}</div>
    @else
        <div class="text-center py-16 bg-white rounded-xl border">
            <div class="w-16 h-16 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-4"><i class="fas fa-question text-2xl text-dark-300"></i></div>
            <p class="text-dark-500">Henüz ürünlerinize soru gelmemiş.</p>
        </div>
    @endif
</div>
@endsection