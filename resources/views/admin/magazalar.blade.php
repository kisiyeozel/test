@extends('layouts.admin') @section('title', 'Mağazalar')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Mağazalar</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">Mağaza</th><th class="text-left px-6 py-3 font-medium text-gray-500">Satıcı</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">İşlem</th></tr></thead>
            <tbody class="divide-y">
                @foreach($magazalar as $magaza)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $magaza->magaza_adi }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $magaza->kullanici->ad_soyad ?? '?' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($magaza->durum == 'onaylandi') bg-green-100 text-green-700
                                @elseif($magaza->durum == 'beklemede') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                @if($magaza->durum == 'onaylandi') Onaylı
                                @elseif($magaza->durum == 'beklemede') Beklemede
                                @else Reddedildi @endif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($magaza->durum == 'beklemede')
                                <form action="{{ route('admin.magaza-onayla', $magaza->id) }}" method="POST" class="inline">@csrf @method('POST')<button type="submit" class="px-3 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600 mr-1">Onayla</button></form>
                                <form action="{{ route('admin.magaza-reddet', $magaza->id) }}" method="POST" class="inline">@csrf @method('POST')<button type="submit" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">Reddet</button></form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $magazalar->links() }}</div>
</div>
@endsection
