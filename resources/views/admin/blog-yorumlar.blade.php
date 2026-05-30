@extends('layouts.admin')
@section('title', 'Blog Yorumları')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Blog Yorumları</h1>
</div>

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">Ad Soyad</th>
                    <th class="px-4 py-3 text-left">Yazı</th>
                    <th class="px-4 py-3 text-left">Yorum</th>
                    <th class="px-4 py-3 text-left">Tarih</th>
                    <th class="px-4 py-3 text-center">Durum</th>
                    <th class="px-4 py-3 text-center">İşlem</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($yorumlar as $yorum)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <span class="font-medium text-gray-800">{{ $yorum->ad_soyad }}</span>
                            <div class="text-xs text-gray-400">{{ $yorum->email }}</div>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('blog.detail', $yorum->blog->slug) }}" class="text-orange-600 hover:underline" target="_blank">{{ Str::limit($yorum->blog->baslik, 40) }}</a>
                        </td>
                        <td class="px-4 py-3 text-gray-600 max-w-xs">{{ Str::limit($yorum->yorum, 80) }}</td>
                        <td class="px-4 py-3 text-gray-500 text-xs">{{ $yorum->created_at->format('d.m.Y H:i') }}</td>
                        <td class="px-4 py-3 text-center">
                            @if($yorum->onaylandi_mi)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Onaylı</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Bekliyor</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                @if(!$yorum->onaylandi_mi)
                                    <form action="{{ route('admin.blog-yorum-onayla', $yorum->id) }}" method="POST" class="inline">
                                        @csrf @method('POST')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-green-500 text-white rounded-lg hover:bg-green-600 transition" onclick="return confirm('Yorum onaylansın mı?')">
                                            <i class="fas fa-check mr-1"></i>Onayla
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.blog-yorum-sil', $yorum->id) }}" method="POST" onsubmit="return confirm('Yorum silinsin mi?')">
                                    @csrf @method('DELETE')
                                    <button class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                        <i class="fas fa-trash mr-1"></i>Sil
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Henüz yorum yok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t"> {{ $yorumlar->links() }} </div>
</div>
@endsection
