@extends('layouts.admin') @section('title', 'Kullanıcılar')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Tüm Kullanıcılar</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">ID</th><th class="text-left px-6 py-3 font-medium text-gray-500">Ad Soyad</th><th class="text-left px-6 py-3 font-medium text-gray-500">E-posta</th><th class="text-left px-6 py-3 font-medium text-gray-500">Rol</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">İşlem</th></tr></thead>
            <tbody class="divide-y">
                @foreach($kullanicilar as $kullanici)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $kullanici->id }}</td>
                        <td class="px-6 py-4 font-medium">{{ $kullanici->ad_soyad }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $kullanici->email }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($kullanici->role == 'admin') bg-purple-100 text-purple-700
                                @elseif($kullanici->role == 'satici') bg-orange-100 text-orange-700
                                @else bg-blue-100 text-blue-700 @endif">
                                {{ $kullanici->role == 'admin' ? 'Admin' : ($kullanici->role == 'satici' ? 'Satıcı' : 'Müşteri') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($kullanici->durum == 'aktif') bg-green-100 text-green-700
                                @elseif($kullanici->durum == 'pasif') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ $kullanici->durum }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <form action="{{ route('admin.kullanici-durum', $kullanici->id) }}" method="POST" class="inline">
                                    @csrf
                                    <select name="durum" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1">
                                        <option value="aktif" {{ $kullanici->durum == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="pasif" {{ $kullanici->durum == 'pasif' ? 'selected' : '' }}>Pasif</option>
                                        <option value="banli" {{ $kullanici->durum == 'banli' ? 'selected' : '' }}>Banlı</option>
                                    </select>
                                </form>
                                <form action="{{ route('admin.kullanici-role', $kullanici->id) }}" method="POST" class="inline">
                                    @csrf
                                    <select name="role" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1">
                                        <option value="musteri" {{ $kullanici->role == 'musteri' ? 'selected' : '' }}>Müşteri</option>
                                        <option value="satici" {{ $kullanici->role == 'satici' ? 'selected' : '' }}>Satıcı</option>
                                        <option value="admin" {{ $kullanici->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $kullanicilar->links() }}</div>
</div>
@endsection
