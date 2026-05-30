@extends('layouts.admin') @section('title', 'Sipariş Detayı')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.siparisler') }}" class="text-sm text-gray-500 hover:text-gray-700"><i class="fas fa-arrow-left mr-1"></i>Siparişlere Dön</a>
</div>

{{-- Sipariş Bilgileri --}}
<div class="bg-white rounded-xl border overflow-hidden mb-6">
    <div class="p-6 border-b flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">Sipariş: {{ $siparis->siparis_no }}</h2>
        <span class="px-3 py-1 rounded-full text-xs font-medium
            @if($siparis->odeme_durumu == 'basarili') bg-green-100 text-green-700
            @else bg-red-100 text-red-700 @endif">
            Ödeme: {{ $siparis->odeme_durumu }}
        </span>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-3 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Müşteri</p>
                <p class="font-medium text-gray-900">{{ $siparis->ad_soyad }}</p>
                <p class="text-sm text-gray-500">{{ $siparis->email }}</p>
                <p class="text-sm text-gray-500">{{ $siparis->telefon }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Teslimat Adresi</p>
                <p class="font-medium text-gray-900">{{ $siparis->adres }}</p>
                <p class="text-sm text-gray-500">{{ $siparis->ilce }} / {{ $siparis->sehir }} {{ $siparis->posta_kodu }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Sipariş Bilgileri</p>
                <p class="text-sm text-gray-500">Tarih: {{ $siparis->created_at->format('d.m.Y H:i') }}</p>
                <p class="text-sm text-gray-500">Ödeme: {{ $siparis->odeme_turu }}</p>
                @if($siparis->notlar)<p class="text-sm text-gray-500 mt-1">Not: {{ $siparis->notlar }}</p>@endif
            </div>
        </div>
    </div>
</div>

{{-- Ürünler --}}
<div class="bg-white rounded-xl border overflow-hidden mb-6">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Ürünler</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">Ürün</th><th class="text-left px-6 py-3 font-medium text-gray-500">Birim Fiyat</th><th class="text-left px-6 py-3 font-medium text-gray-500">Adet</th><th class="text-left px-6 py-3 font-medium text-gray-500">Toplam</th></tr></thead>
            <tbody class="divide-y">
                @foreach($siparis->urunler as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($item->urun_foto)
                                    <img src="{{ asset('storage/' . $item->urun_foto) }}" class="w-12 h-12 rounded-lg object-cover">
                                @endif
                                <div>
                                    <p class="font-medium text-gray-900">{{ $item->urun_adi }}</p>
                                    @if($item->kisisellestirme_bilgisi)
                                        <p class="text-xs text-gray-400 mt-0.5">{{ $item->kisisellestirme_bilgisi }}</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ number_format($item->birim_fiyat, 2) }} ₺</td>
                        <td class="px-6 py-4">{{ $item->adet }}</td>
                        <td class="px-6 py-4 font-medium">{{ number_format($item->toplam, 2) }} ₺</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Özet --}}
<div class="bg-white rounded-xl border overflow-hidden mb-6">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Özet</h2></div>
    <div class="p-6">
        <div class="flex flex-col items-end gap-2 text-sm">
            @php $kdvOrani = (float)(\App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger') ?? 0); $kdvTutari = $kdvOrani > 0 ? $siparis->ara_toplam * $kdvOrani / (100 + $kdvOrani) : 0; @endphp
            <div class="flex justify-between w-64"><span class="text-gray-500">Ara Toplam</span><span>{{ number_format($siparis->ara_toplam, 2) }} ₺</span></div>
            @if($kdvOrani > 0)
                <div class="flex justify-between w-64 text-xs text-gray-400"><span>KDV (%{{ $kdvOrani }})</span><span>{{ number_format($kdvTutari, 2) }} ₺</span></div>
            @endif
            <div class="flex justify-between w-64"><span class="text-gray-500">Kargo</span><span>{{ number_format($siparis->kargo_ucreti, 2) }} ₺</span></div>
            @if($siparis->indirim_tutari > 0)
                <div class="flex justify-between w-64"><span class="text-gray-500">İndirim</span><span class="text-red-500">-{{ number_format($siparis->indirim_tutari, 2) }} ₺</span></div>
            @endif
            @if($siparis->kupon_kodu)
                <div class="flex justify-between w-64"><span class="text-gray-500">Kupon</span><span class="text-green-600">{{ $siparis->kupon_kodu }}</span></div>
            @endif
            <hr class="w-64 my-2">
            <div class="flex justify-between w-64 font-bold text-lg"><span>Genel Toplam</span><span class="text-green-600">{{ number_format($siparis->genel_toplam, 2) }} ₺</span></div>
        </div>
    </div>
</div>

{{-- Kargo --}}
@if($siparis->kargoTakip)
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Kargo Bilgileri</h2></div>
    <div class="p-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Kargo Firması</p>
                <p class="font-medium text-gray-900">{{ $siparis->kargo_firmasi ?: $siparis->kargoTakip->kargo_firmasi }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Takip Kodu</p>
                <p class="font-medium text-gray-900 font-mono">{{ $siparis->takip_kodu ?: $siparis->kargoTakip->takip_kodu }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection