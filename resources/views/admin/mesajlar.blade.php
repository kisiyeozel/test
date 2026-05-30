@extends('layouts.admin') @section('title', 'Mesajlar')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">İletişim Mesajları</h2></div>
    <div class="divide-y">
        @forelse($mesajlar as $mesaj)
            <div class="p-6 {{ !$mesaj->okundu_mu ? 'bg-orange-50' : '' }}">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="font-medium text-gray-900">{{ $mesaj->ad_soyad }}</span>
                        <span class="text-sm text-gray-500 ml-2">{{ $mesaj->email }}</span>
                        @if($mesaj->telefon)<span class="text-sm text-gray-400 ml-2">{{ $mesaj->telefon }}</span>@endif
                    </div>
                    <span class="text-xs text-gray-400">{{ $mesaj->created_at->format('d.m.Y H:i') }}</span>
                </div>
                <p class="text-sm font-medium text-gray-700 mb-1">{{ $mesaj->konu }}</p>
                <p class="text-sm text-gray-600">{{ $mesaj->mesaj }}</p>
            </div>
        @empty
            <div class="p-6 text-center text-gray-500">Henüz mesaj yok.</div>
        @endforelse
    </div>
    <div class="mt-4">{{ $mesajlar->links() }}</div>
</div>
@endsection
