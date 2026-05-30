@extends('layouts.admin') @section('title', 'Mesaj Detayı')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.mesajlar') }}" class="text-sm text-gray-500 hover:text-gray-700"><i class="fas fa-arrow-left mr-1"></i>Mesajlara Dön</a>
</div>

<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">Mesaj Detayı</h2>
        <span class="px-2 py-1 rounded-full text-xs font-medium
            @if($mesaj->okundu_mu) bg-green-100 text-green-700
            @else bg-yellow-100 text-yellow-700 @endif">
            {{ $mesaj->okundu_mu ? 'Okundu' : 'Okunmadı' }}
        </span>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Gönderen</p>
                <p class="font-medium text-gray-900">{{ $mesaj->ad_soyad }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">E-posta</p>
                <p class="font-medium text-gray-900">{{ $mesaj->email }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Telefon</p>
                <p class="font-medium text-gray-900">{{ $mesaj->telefon ?: '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Konu</p>
                <p class="font-medium text-gray-900">{{ $mesaj->konu }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Tarih</p>
                <p class="font-medium text-gray-900">{{ $mesaj->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>
        <hr class="border-gray-200 mb-6">
        <div>
            <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Mesaj</p>
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 leading-relaxed whitespace-pre-line">{{ $mesaj->mesaj }}</div>
        </div>
        <div class="mt-6 flex gap-3">
            @if($mesaj->email)
                <a href="mailto:{{ $mesaj->email }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition"><i class="fas fa-envelope mr-2"></i>Yanıtla</a>
            @endif
            @if($mesaj->telefon)
                <a href="tel:{{ $mesaj->telefon }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition"><i class="fas fa-phone mr-2"></i>Ara</a>
            @endif
        </div>
    </div>
</div>
@endsection