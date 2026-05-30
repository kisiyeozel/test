@extends('layouts.admin') @section('title', 'Ürünler')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">Tüm Ürünler</h2>
        <span class="text-sm text-gray-500">{{ $urunler->count() }} ürün</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">Ürün</th><th class="text-left px-6 py-3 font-medium text-gray-500">Satıcı</th><th class="text-left px-6 py-3 font-medium text-gray-500">Kategori</th><th class="text-left px-6 py-3 font-medium text-gray-500">Fiyat</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">İşlem</th></tr></thead>
            <tbody class="divide-y">
                @foreach($urunler as $urun)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden">
                                    @if($urun->ana_foto)<img src="{{ \App\Services\ImageService::getUrl($urun->ana_foto, 50, 50) }}" class="w-full h-full object-cover" loading="lazy" decoding="async" width="50" height="50">@endif
                                </div>
                                <span class="font-medium">{{ $urun->urun_adi }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $urun->kullanici->ad_soyad ?? '?' }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $urun->kategori->kategori_adi ?? '-' }}</td>
                        <td class="px-6 py-4 font-medium">{{ number_format($urun->fiyat, 2) }} ₺</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($urun->durum == 'onaylandi') bg-green-100 text-green-700
                                @elseif($urun->durum == 'beklemede') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                @if($urun->durum == 'onaylandi') Onaylı
                                @elseif($urun->durum == 'beklemede') Beklemede
                                @else Reddedildi @endif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                @if($urun->durum != 'onaylandi')
                                    <a href="{{ route('admin.urun-onayla', $urun->id) }}" class="px-3 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600">Onayla</a>
                                @endif
                                @if($urun->durum != 'reddedildi')
                                    <a href="{{ route('admin.urun-reddet', $urun->id) }}" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">Reddet</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $urunler->links() }}</div>
</div>
@endsection
