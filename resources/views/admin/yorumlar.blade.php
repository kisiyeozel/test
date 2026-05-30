@extends('layouts.admin') @section('title', 'Yorumlar')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Yorum Yönetimi</h2></div>
    <div class="divide-y">
        @foreach($yorumlar as $yorum)
            <div class="p-6 flex items-start gap-4">
                <div class="w-10 h-10 rounded-full overflow-hidden shrink-0{{ $yorum->kullanici->avatar ? '' : ' bg-orange-100 flex items-center justify-center text-orange-600 font-semibold' }}">
                    @if($yorum->kullanici->avatar)
                        <img src="{{ asset('img/'.$yorum->kullanici->avatar) }}" alt="" class="w-full h-full object-cover">
                    @else
                        {{ $yorum->kullanici->ad_soyad[0] ?? '?' }}
                    @endif
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="font-medium text-gray-900">{{ $yorum->kullanici->ad_soyad ?? '?' }}</span>
                        <div class="flex text-yellow-400 text-xs">@for($i=1;$i<=5;$i++)<i class="fas fa-star{{ $i<=$yorum->puan?'':'-o' }}"></i>@endfor</div>
                        <span class="text-xs text-gray-400">{{ $yorum->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">{{ $yorum->yorum }}</p>
                    <p class="text-xs text-gray-400">Ürün: {{ $yorum->urun->urun_adi ?? '-' }}</p>
                </div>
                <div class="flex gap-2 shrink-0">
                    @if($yorum->durum == 'beklemede')
                        <a href="{{ route('admin.yorum-onayla', $yorum->id) }}" class="px-3 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600">Onayla</a>
                    @endif
                    <form action="{{ route('admin.yorum-sil', $yorum->id) }}" method="POST" onsubmit="return confirm('Emin misiniz?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">Sil</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $yorumlar->links() }}</div>
</div>
@endsection
