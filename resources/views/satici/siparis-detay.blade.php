@extends('layouts.satici') @section('title', 'Sipariş Detay') @section('page_title', 'Sipariş Detay - ' . $siparis->siparis_no)
@section('content')
<div class="grid md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-6">
        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-box text-gold-500"></i>Sipariş Ürünleri</h3>
            @foreach($siparis->urunler as $item)
                <div class="flex items-center gap-4 p-3 border-b border-cream-100 last:border-0">
                    <div class="w-16 h-16 bg-cream-100 rounded-xl overflow-hidden shrink-0">
                        @if($item->urun && $item->urun->ana_foto)<img src="{{ \App\Services\ImageService::getUrl($item->urun->ana_foto, 80, 80) }}" class="w-full h-full object-cover" loading="lazy" decoding="async" width="80" height="80">@endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-dark-900 truncate">{{ $item->urun_adi }} <span class="text-dark-400 font-normal">x{{ $item->adet }}</span></p>
                        <p class="text-sm text-dark-400">{{ number_format($item->birim_fiyat, 2) }} ₺</p>
                        @if($item->kisisellestirme_bilgisi)
                            <p class="text-xs text-gold-600 mt-1"><i class="fas fa-paint-brush mr-1"></i>Kişiselleştirilmiş</p>
                        @endif
                    </div>
                    <p class="font-bold text-dark-900 shrink-0">{{ number_format($item->toplam, 2) }} ₺</p>
                </div>
            @endforeach
        </div>

        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-user text-gold-500"></i>Müşteri Bilgileri</h3>
            <div class="space-y-3 text-sm">
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">Ad Soyad:</span><span class="text-dark-800">{{ $siparis->ad_soyad }}</span></div>
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">E-posta:</span><span class="text-dark-800">{{ $siparis->email }}</span></div>
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">Telefon:</span><span class="text-dark-800">{{ $siparis->telefon }}</span></div>
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">Adres:</span><span class="text-dark-800">{{ $siparis->adres }}, {{ $siparis->ilce }}/{{ $siparis->sehir }}</span></div>
                @if($siparis->notlar)<div class="flex"><span class="text-dark-400 w-24 shrink-0">Not:</span><span class="text-dark-600 italic">{{ $siparis->notlar }}</span></div>@endif
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-receipt text-gold-500"></i>Sipariş Özeti</h3>
            <div class="space-y-3 text-sm">
                @php $kdvOrani = (float)(\App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger') ?? 0); $kdvTutari = $kdvOrani > 0 ? $siparis->ara_toplam * $kdvOrani / (100 + $kdvOrani) : 0; @endphp
                <div class="flex justify-between"><span class="text-dark-400">Ara Toplam</span><span class="text-dark-800">{{ number_format($siparis->ara_toplam, 2) }} ₺</span></div>
                @if($kdvOrani > 0)
                    <div class="flex justify-between text-xs text-dark-400"><span>KDV (%{{ $kdvOrani }})</span><span>{{ number_format($kdvTutari, 2) }} ₺</span></div>
                @endif
                <div class="flex justify-between"><span class="text-dark-400">Kargo</span><span class="text-dark-800">{{ number_format($siparis->kargo_ucreti, 2) }} ₺</span></div>
                <hr class="border-cream-200">
                <div class="flex justify-between font-bold text-lg"><span class="text-dark-900">Toplam</span><span class="text-gold-600">{{ number_format($siparis->genel_toplam, 2) }} ₺</span></div>
            </div>
        </div>

        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-truck text-gold-500"></i>Durum Güncelle</h3>
            <form action="{{ route('satici.siparis-durum', $siparis->id) }}" method="POST" class="mb-5">
                @csrf
                <label class="block text-sm font-medium text-dark-700 mb-1.5">Sipariş Durumu</label>
                <select name="durum" class="input-field mb-3">
                    <option value="hazirlaniyor" {{ $siparis->siparis_durumu == 'hazirlaniyor' ? 'selected' : '' }}>Hazırlanıyor</option>
                    <option value="kargoya_verildi" {{ $siparis->siparis_durumu == 'kargoya_verildi' ? 'selected' : '' }}>Kargoya Verildi</option>
                    <option value="teslim_edildi" {{ $siparis->siparis_durumu == 'teslim_edildi' ? 'selected' : '' }}>Teslim Edildi</option>
                </select>
                <button type="submit" class="btn-gold w-full justify-center !py-2.5">Güncelle</button>
            </form>

            <hr class="border-cream-200 mb-5">
            <h4 class="font-medium text-dark-900 mb-3 text-sm">Kargo Bilgisi Ekle</h4>
            <form action="{{ route('satici.siparis-kargo', $siparis->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium text-dark-700 mb-1">Kargo Firması</label>
                    <input type="text" name="kargo_firmasi" placeholder="Kargo firması adı" class="input-field">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-dark-700 mb-1">Takip Kodu</label>
                    <input type="text" name="takip_kodu" placeholder="Takip kodu" class="input-field">
                </div>
                <button type="submit" class="btn-outline-gold w-full justify-center !py-2.5">Kaydet</button>
            </form>
        </div>
    </div>
</div>
@endsection
