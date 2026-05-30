@extends('layouts.satici') @section('title', 'Siparişler') @section('page_title', 'Siparişler')
@section('content')
<div class="luxury-card overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-cream-100"><tr><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Sipariş No</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Müşteri</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Tutar</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Durum</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Tarih</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">İşlem</th></tr></thead>
        <tbody class="divide-y divide-cream-100">
            @forelse($siparisler as $siparis)
                <tr class="hover:bg-cream-50 transition">
                    <td class="px-6 py-4 font-mono text-xs text-dark-800">{{ $siparis->siparis_no }}</td>
                    <td class="px-6 py-4 text-dark-800">{{ $siparis->kullanici->ad_soyad ?? '-' }}</td>
                    <td class="px-6 py-4 font-medium text-dark-900">{{ number_format($siparis->genel_toplam, 2) }} ₺</td>
                    <td class="px-6 py-4">
                        <span class="badge
                            @if($siparis->siparis_durumu == 'teslim_edildi') badge-green
                            @elseif($siparis->siparis_durumu == 'kargoya_verildi') badge-dark
                            @elseif($siparis->siparis_durumu == 'hazirlaniyor') badge-gold
                            @else badge-dark @endif">{{ $siparis->siparis_durumu }}</span>
                    </td>
                    <td class="px-6 py-4 text-dark-400 text-xs">{{ $siparis->created_at->format('d.m.Y') }}</td>
                    <td class="px-6 py-4"><a href="{{ route('satici.siparis-detay', $siparis->id) }}" class="text-gold-600 hover:text-gold-700 text-xs font-medium">Detay <i class="fas fa-arrow-right ml-1"></i></a></td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-16 text-center text-dark-400">
                    <div class="w-16 h-16 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-truck text-2xl text-dark-300"></i></div>
                    Henüz sipariş yok.
                </td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $siparisler->links() }}</div>
@endsection
