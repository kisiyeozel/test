@extends('layouts.admin')

@section('title', 'Ürün Soruları')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Ürün Soruları</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
    @endif

    @if($sorular->count() > 0)
        <div class="space-y-4">
            @foreach($sorular as $soru)
                <div class="bg-white rounded-xl border p-5 {{ $soru->durum == 'beklemede' ? 'border-l-4 border-l-orange-400' : '' }}">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="font-medium text-gray-900">{{ $soru->musteri_adi }}</p>
                            <p class="text-xs text-gray-500">{{ $soru->created_at->diffForHumans() }} — <a href="{{ route('product.detail', $soru->urun->slug) }}" class="text-orange-600 hover:underline">{{ $soru->urun->urun_adi }}</a></p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full {{ $soru->durum == 'yayinda' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">{{ $soru->durum }}</span>
                    </div>
                    <p class="text-gray-700 text-sm mb-4 bg-gray-50 rounded-lg p-3">{{ $soru->soru }}</p>

                    @if($soru->cevap)
                        <div class="bg-green-50 rounded-lg p-3 mb-3 border border-green-100">
                            <p class="text-xs font-semibold text-green-700 mb-1">CEVAP: @if($soru->cevaplayan)<span class="font-normal text-green-600">({{ $soru->cevaplayan->ad_soyad }})</span>@endif</p>
                            <p class="text-sm text-gray-700">{{ $soru->cevap }}</p>
                        </div>
                    @endif

                    @if($soru->durum == 'beklemede' || !$soru->cevap)
                        <form action="{{ route('admin.soru-cevapla', $soru->id) }}" method="POST" class="mt-3">
                            @csrf
                            <textarea name="cevap" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm" placeholder="Cevabınız..." required>{{ $soru->cevap }}</textarea>
                            <div class="flex gap-2 mt-2">
                                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg text-sm hover:bg-orange-600">Cevapla & Yayınla</button>
                            </div>
                        </form>
                    @endif
                    <div class="mt-2">
                        <form action="{{ route('admin.soru-sil', $soru->id) }}" method="POST" onsubmit="return confirm('Emin misiniz?')" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600">Sil</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-xl border">
            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4"><i class="fas fa-question text-2xl text-gray-400"></i></div>
            <p class="text-gray-500">Henüz soru bulunmuyor.</p>
        </div>
    @endif
    <div class="mt-4">{{ $sorular->links() }}</div>
</div>
@endsection
