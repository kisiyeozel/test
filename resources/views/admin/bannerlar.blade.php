@extends('layouts.admin') @section('title', 'Banner Yönetimi')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Banner Yönetimi</h1>
</div>

<div class="bg-white rounded-xl border overflow-hidden mb-6" x-data="{ rows: [{id: Date.now()}] }">
    <div class="p-4 border-b bg-gray-50 flex items-center justify-between">
        <h3 class="font-semibold text-gray-900">Yeni Banner</h3>
        <button @click="rows.push({id: Date.now()})" type="button" class="text-sm text-orange-500 hover:text-orange-600 font-medium"><i class="fas fa-plus mr-1"></i>Satır Ekle</button>
    </div>
    <div class="p-4">
        <form action="{{ route('admin.banner-ekle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <template x-for="(row, idx) in rows" :key="row.id">
                <div class="grid md:grid-cols-12 gap-3 items-end mb-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Fotoğraf</label>
                        <input type="file" :name="'banners['+idx+'][foto]'" accept="image/*" class="w-full text-sm" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Başlık</label>
                        <input type="text" :name="'banners['+idx+'][baslik]'" class="w-full border-gray-300 rounded-lg text-sm" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Alt Başlık</label>
                        <input type="text" :name="'banners['+idx+'][alt_baslik]'" class="w-full border-gray-300 rounded-lg text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Link</label>
                        <input type="text" :name="'banners['+idx+'][link]'" placeholder="https://" class="w-full border-gray-300 rounded-lg text-sm">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Poz.</label>
                        <select :name="'banners['+idx+'][pozisyon]'" class="w-full border-gray-300 rounded-lg text-sm">
                            <option value="hero">Hero</option>
                            <option value="sidebar">Sidebar</option>
                            <option value="between">Arası</option>
                            <option value="footer">Footer</option>
                        </select>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Sıra</label>
                        <input type="number" :name="'banners['+idx+'][sira]'" value="0" class="w-full border-gray-300 rounded-lg text-sm">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Aktif</label>
                        <select :name="'banners['+idx+'][aktif]'" class="w-full border-gray-300 rounded-lg text-sm">
                            <option value="1">Evet</option>
                            <option value="0">Hayır</option>
                        </select>
                    </div>
                    <div class="md:col-span-1">
                        <button @click="rows = rows.filter(r => r.id !== row.id)" type="button" class="text-red-500 hover:text-red-600 text-sm px-2 py-2"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </template>
            <div class="flex items-center gap-3 mt-2">
                <button class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600"><i class="fas fa-save mr-1"></i>Kaydet</button>
            </div>
        </form>
    </div>
</div>

<div class="bg-white rounded-xl border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">Görsel</th>
                    <th class="px-4 py-3 text-left">Başlık</th>
                    <th class="px-4 py-3 text-left">Pozisyon</th>
                    <th class="px-4 py-3 text-center">Sıra</th>
                    <th class="px-4 py-3 text-center">Durum</th>
                    <th class="px-4 py-3 text-center">İşlem</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($bannerlar as $banner)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><img src="{{ asset('storage/banner/' . $banner->foto) }}" class="h-12 w-20 object-cover rounded"></td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $banner->baslik }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-700">{{ $banner->pozisyon }}</span>
                        </td>
                        <td class="px-4 py-3 text-center text-gray-500">{{ $banner->sira }}</td>
                        <td class="px-4 py-3 text-center">
                            @if($banner->aktif)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Aktif</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Pasif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="document.getElementById('edit-{{ $banner->id }}').classList.toggle('hidden')" class="text-blue-500 hover:text-blue-600 text-sm"><i class="fas fa-edit"></i></button>
                                <form action="{{ route('admin.banner-sil', $banner->id) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-600 text-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                            <div id="edit-{{ $banner->id }}" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" onclick="if(event.target===this)this.classList.add('hidden')">
                                <div class="bg-white rounded-xl p-6 w-full max-w-lg max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
                                    <h3 class="font-semibold text-gray-900 mb-4">Banner Düzenle</h3>
                                    <form action="{{ route('admin.banner-guncelle', $banner->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid md:grid-cols-2 gap-4">
                                            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Başlık</label><input type="text" name="baslik" value="{{ $banner->baslik }}" class="w-full border-gray-300 rounded-lg" required></div>
                                            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Alt Başlık</label><input type="text" name="alt_baslik" value="{{ $banner->alt_baslik }}" class="w-full border-gray-300 rounded-lg"></div>
                                            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Link</label><input type="text" name="link" value="{{ $banner->link }}" class="w-full border-gray-300 rounded-lg"></div>
                                            <div><label class="block text-sm font-medium text-gray-700 mb-1">Pozisyon</label><select name="pozisyon" class="w-full border-gray-300 rounded-lg"><option value="hero" {{ $banner->pozisyon=='hero'?'selected':'' }}>Hero</option><option value="sidebar" {{ $banner->pozisyon=='sidebar'?'selected':'' }}>Sidebar</option><option value="between" {{ $banner->pozisyon=='between'?'selected':'' }}>Arası</option><option value="footer" {{ $banner->pozisyon=='footer'?'selected':'' }}>Footer</option></select></div>
                                            <div><label class="block text-sm font-medium text-gray-700 mb-1">Sıra</label><input type="number" name="sira" value="{{ $banner->sira }}" class="w-24 border-gray-300 rounded-lg"></div>
                                            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Yeni Foto (boş bırakılırsa aynı kalır)</label><input type="file" name="foto" accept="image/*" class="w-full text-sm"></div>
                                            <div class="md:col-span-2 flex items-center gap-2"><input type="checkbox" name="aktif" value="1" {{ $banner->aktif?'checked':'' }} class="rounded border-gray-300"><label class="text-sm text-gray-600">Aktif</label></div>
                                        </div>
                                        <div class="flex gap-2 mt-4">
                                            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">Güncelle</button>
                                            <button type="button" onclick="document.getElementById('edit-{{ $banner->id }}').classList.add('hidden')" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">İptal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Henüz banner eklenmemiş.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
