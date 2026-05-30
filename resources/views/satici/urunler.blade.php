@extends('layouts.satici') @section('title', 'Ürünlerim') @section('page_title', 'Ürünlerim')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-dark-400">{{ $urunler->count() }} ürün</p>
    <a href="{{ route('satici.urun-ekle') }}" class="btn-gold px-5 py-2.5 rounded-xl text-sm font-semibold"><i class="fas fa-plus mr-1"></i>Yeni Ürün</a>
</div>

<div class="luxury-card overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-cream-100"><tr><th class="text-left px-6 py-3.5 font-semibold text-dark-600 text-xs uppercase tracking-wider">Ürün</th><th class="text-left px-6 py-3.5 font-semibold text-dark-600 text-xs uppercase tracking-wider">Kategori</th><th class="text-left px-6 py-3.5 font-semibold text-dark-600 text-xs uppercase tracking-wider">Fiyat</th><th class="text-left px-6 py-3.5 font-semibold text-dark-600 text-xs uppercase tracking-wider">Durum</th><th class="text-left px-6 py-3.5 font-semibold text-dark-600 text-xs uppercase tracking-wider">İşlem</th></tr></thead>
        <tbody class="divide-y divide-cream-200">
            @forelse($urunler as $urun)
                <tr class="hover:bg-cream-50 transition">
                    <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-11 h-11 bg-cream-100 rounded-lg overflow-hidden shrink-0">@if($urun->ana_foto)<img src="{{ \App\Services\ImageService::getUrl($urun->ana_foto, 50, 50) }}" class="w-full h-full object-cover" loading="lazy" decoding="async" width="50" height="50">@endif</div><span class="font-medium text-dark-800">{{ $urun->urun_adi }}</span></div></td>
                    <td class="px-6 py-4 text-dark-400">{{ $urun->kategori->kategori_adi ?? '-' }}</td>
                    <td class="px-6 py-4 font-semibold text-dark-700">{{ number_format($urun->fiyat, 2) }} ₺</td>
                    <td class="px-6 py-4">
                        <span class="badge
                            @if($urun->durum == 'onaylandi') badge-green
                            @elseif($urun->durum == 'beklemede') badge-gold
                            @else badge-dark @endif">
                            {{ $urun->durum == 'onaylandi' ? 'Onaylı' : ($urun->durum == 'beklemede' ? 'Beklemede' : 'Reddedildi') }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('satici.urun-duzenle', $urun->id) }}" class="text-gold-600 hover:text-gold-700 transition" title="Düzenle"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('satici.varyantlar', $urun->id) }}" class="text-gold-600 hover:text-gold-700 transition" title="Varyantlar"><i class="fas fa-layer-group"></i></a>
                            <form action="{{ route('satici.urun-sil', $urun->id) }}" method="POST" onsubmit="return confirm('Emin misiniz?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Sil"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-16 text-center"><div class="text-dark-300 text-4xl mb-3"><i class="fas fa-box-open"></i></div><p class="text-dark-400 text-sm">Henüz ürün eklemediniz.</p><a href="{{ route('satici.urun-ekle') }}" class="text-gold-600 font-medium text-sm hover:text-gold-700">İlk ürünü ekle <i class="fas fa-arrow-right ml-1"></i></a></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $urunler->links() }}</div>
@endsection
