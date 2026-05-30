@extends('layouts.admin') @section('title', 'Siparişler')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Tüm Siparişler</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3">Sipariş No</th><th class="text-left px-6 py-3">Müşteri</th><th class="text-left px-6 py-3">Tutar</th><th class="text-left px-6 py-3">Ödeme</th><th class="text-left px-6 py-3">Durum</th><th class="text-left px-6 py-3">Tarih</th><th class="text-left px-6 py-3">İşlem</th></tr></thead>
            <tbody class="divide-y">
                @foreach($siparisler as $siparis)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs">{{ $siparis->siparis_no }}</td>
                        <td class="px-6 py-4">{{ $siparis->kullanici->ad_soyad ?? '-' }}</td>
                        <td class="px-6 py-4 font-medium">{{ number_format($siparis->genel_toplam, 2) }} ₺</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-xs font-medium {{ $siparis->odeme_durumu == 'basarili' ? 'bg-green-100 text-green-700' : ($siparis->odeme_durumu == 'beklemede' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">{{ $siparis->odeme_durumu }}</span>
                        </td>
                        <td class="px-6 py-4">{{ $siparis->siparis_durumu }}</td>
                        <td class="px-6 py-4 text-gray-500 text-xs">{{ $siparis->created_at->format('d.m.Y') }}</td>
                        <td class="px-6 py-4"><a href="#" class="text-orange-600 hover:text-orange-700 text-xs">Detay</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $siparisler->links() }}</div>
</div>
@endsection
