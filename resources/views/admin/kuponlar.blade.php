@extends('layouts.admin') @section('title', 'Kuponlar')
@section('content')
<div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border p-6">
        <h3 class="font-semibold text-gray-900 mb-4">Yeni Kupon</h3>
        <form action="{{ route('admin.kupon-ekle') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-3">
                <div class="col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Kupon Kodu</label><input type="text" name="kupon_kodu" class="w-full border-gray-300 rounded-lg uppercase" required></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">İndirim Türü</label><select name="indirim_turu" class="w-full border-gray-300 rounded-lg"><option value="yuzde">Yüzde</option><option value="tutar">Tutar</option></select></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">İndirim Miktarı</label><input type="text" name="indirim_miktari" class="w-full border-gray-300 rounded-lg" required></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Min. Sepet</label><input type="text" name="min_sepet_tutari" value="0" class="w-full border-gray-300 rounded-lg"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Max. Kullanım</label><input type="number" name="max_kullanim" value="0" class="w-full border-gray-300 rounded-lg"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Başlangıç</label><input type="date" name="baslangic_tarihi" class="w-full border-gray-300 rounded-lg" required></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Bitiş</label><input type="date" name="bitis_tarihi" class="w-full border-gray-300 rounded-lg" required></div>
            </div>
            <button type="submit" class="mt-4 bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">Oluştur</button>
        </form>
    </div>
    <div class="bg-white rounded-xl border overflow-hidden">
        <div class="p-4 border-b"><h3 class="font-semibold text-gray-900">Kuponlar</h3></div>
        <div class="divide-y">
            @foreach($kuponlar as $kupon)
                <div class="p-4 flex items-center justify-between">
                    <div>
                        <span class="font-mono font-bold text-gray-900">{{ $kupon->kupon_kodu }}</span>
                        <span class="text-sm text-gray-500 ml-2">{{ $kupon->indirim_turu == 'yuzde' ? '%' . number_format($kupon->indirim_miktari, 0) : number_format($kupon->indirim_miktari, 2) . ' ₺' }}</span>
                        <span class="text-xs text-gray-400 block">{{ $kupon->kullanim_sayisi }}/{{ $kupon->max_kullanim ?: '∞' }} kullanım</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.kupon-duzenle', $kupon->id) }}" class="text-blue-500 hover:text-blue-600"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.kupon-sil', $kupon->id) }}" method="POST" onsubmit="return confirm('Emin misiniz?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-4">{{ $kuponlar->links() }}</div>
</div>
@endsection
