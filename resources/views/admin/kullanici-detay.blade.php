@extends('layouts.admin') @section('title', 'Kullanıcı Detayı')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.kullanicilar') }}" class="text-sm text-gray-500 hover:text-gray-700"><i class="fas fa-arrow-left mr-1"></i>Kullanıcılara Dön</a>
</div>

{{-- Kullanıcı Bilgileri --}}
<div class="bg-white rounded-xl border overflow-hidden mb-6">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Kullanıcı Bilgileri</h2></div>
    <div class="p-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Ad Soyad</p>
                <p class="font-medium text-gray-900">{{ $kullanici->ad_soyad }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">E-posta</p>
                <p class="font-medium text-gray-900">{{ $kullanici->email }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Telefon</p>
                <p class="font-medium text-gray-900">{{ $kullanici->telefon ?: '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Kayıt Tarihi</p>
                <p class="font-medium text-gray-900">{{ $kullanici->created_at->format('d.m.Y H:i') }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Rol</p>
                <span class="px-2 py-1 rounded-full text-xs font-medium
                    @if($kullanici->role == 'admin') bg-purple-100 text-purple-700
                    @elseif($kullanici->role == 'satici') bg-orange-100 text-orange-700
                    @else bg-blue-100 text-blue-700 @endif">
                    {{ $kullanici->role == 'admin' ? 'Admin' : ($kullanici->role == 'satici' ? 'Satıcı' : 'Müşteri') }}
                </span>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Durum</p>
                <span class="px-2 py-1 rounded-full text-xs font-medium
                    @if($kullanici->durum == 'aktif') bg-green-100 text-green-700
                    @elseif($kullanici->durum == 'pasif') bg-yellow-100 text-yellow-700
                    @else bg-red-100 text-red-700 @endif">
                    {{ $kullanici->durum }}
                </span>
            </div>
        </div>
        <div class="mt-6 pt-6 border-t">
            <form action="{{ route('admin.kullanici-durum', $kullanici->id) }}" method="POST" class="inline mr-3">
                @csrf
                <label class="text-xs text-gray-500 mr-2">Durum:</label>
                <select name="durum" onchange="this.form.submit()" class="text-sm border rounded px-3 py-1.5">
                    <option value="aktif" {{ $kullanici->durum == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pasif" {{ $kullanici->durum == 'pasif' ? 'selected' : '' }}>Pasif</option>
                    <option value="banli" {{ $kullanici->durum == 'banli' ? 'selected' : '' }}>Banlı</option>
                </select>
            </form>
            <form action="{{ route('admin.kullanici-role', $kullanici->id) }}" method="POST" class="inline">
                @csrf
                <label class="text-xs text-gray-500 mr-2">Rol:</label>
                <select name="role" onchange="this.form.submit()" class="text-sm border rounded px-3 py-1.5">
                    <option value="musteri" {{ $kullanici->role == 'musteri' ? 'selected' : '' }}>Müşteri</option>
                    <option value="satici" {{ $kullanici->role == 'satici' ? 'selected' : '' }}>Satıcı</option>
                    <option value="admin" {{ $kullanici->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </form>
        </div>
    </div>
</div>

{{-- Mağaza --}}
@if($kullanici->magaza)
<div class="bg-white rounded-xl border overflow-hidden mb-6">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Mağaza</h2></div>
    <div class="p-6">
        <div class="flex items-center gap-4">
            @if($kullanici->magaza->logo)
                <img src="{{ asset('storage/' . $kullanici->magaza->logo) }}" class="w-16 h-16 rounded-lg object-cover">
            @else
                <img src="{{ \App\Services\MagazaGorselService::getLogoUrl($kullanici->magaza->magaza_adi, 100) }}" class="w-16 h-16 rounded-lg object-cover">
            @endif
            <div>
                <p class="font-medium text-gray-900">{{ $kullanici->magaza->magaza_adi }}</p>
                <p class="text-sm text-gray-500">{{ $kullanici->magaza->slogan ?: 'Slogan yok' }}</p>
                <span class="px-2 py-1 rounded-full text-xs font-medium mt-1 inline-block
                    @if($kullanici->magaza->durum == 'onaylandi') bg-green-100 text-green-700
                    @elseif($kullanici->magaza->durum == 'beklemede') bg-yellow-100 text-yellow-700
                    @else bg-red-100 text-red-700 @endif">
                    {{ $kullanici->magaza->durum }}
                </span>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Siparişler --}}
<div class="bg-white rounded-xl border overflow-hidden mb-6">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Siparişler ({{ $kullanici->siparisler->count() }})</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">Sipariş No</th><th class="text-left px-6 py-3 font-medium text-gray-500">Tutar</th><th class="text-left px-6 py-3 font-medium text-gray-500">Ödeme</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">Tarih</th></tr></thead>
            <tbody class="divide-y">
                @forelse($kullanici->siparisler as $siparis)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs">{{ $siparis->siparis_no }}</td>
                        <td class="px-6 py-4 font-medium">{{ number_format($siparis->genel_toplam, 2) }} ₺</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($siparis->odeme_durumu == 'basarili') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ $siparis->odeme_durumu }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($siparis->siparis_durumu == 'teslim_edildi') bg-green-100 text-green-700
                                @elseif($siparis->siparis_durumu == 'kargoya_verildi') bg-blue-100 text-blue-700
                                @elseif($siparis->siparis_durumu == 'hazirlaniyor') bg-yellow-100 text-yellow-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ $siparis->siparis_durumu }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $siparis->created_at->format('d.m.Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Henüz sipariş yok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Ürünler --}}
@if($kullanici->urunler->count() > 0)
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Ürünler ({{ $kullanici->urunler->count() }})</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">Ürün</th><th class="text-left px-6 py-3 font-medium text-gray-500">Fiyat</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">Satış</th></tr></thead>
            <tbody class="divide-y">
                @foreach($kullanici->urunler as $urun)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($urun->ana_foto)
                                    <img src="{{ asset('storage/' . $urun->ana_foto) }}" class="w-10 h-10 rounded-lg object-cover">
                                @endif
                                <span class="font-medium">{{ $urun->urun_adi }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ number_format($urun->fiyat, 2) }} ₺</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($urun->durum == 'onaylandi') bg-green-100 text-green-700
                                @elseif($urun->durum == 'beklemede') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ $urun->durum }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $urun->satis_sayisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection