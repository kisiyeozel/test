@extends('layouts.admin') @section('title', 'Blog')
@section('content')
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">Blog Yazıları</h2>
        <button onclick="document.getElementById('blogForm').classList.remove('hidden'); document.getElementById('blogForm').scrollIntoView({behavior:'smooth'})" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-600"><i class="fas fa-plus mr-1"></i>Yeni Yazı</button>
    </div>

    {{-- Blog Form --}}
    <div id="blogForm" class="hidden p-6 border-b bg-gray-50">
        <h3 class="font-semibold text-gray-900 mb-4">Yeni Yazı</h3>
        <form id="blogFormSubmit" action="{{ route('admin.blog-ekle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Başlık</label><input type="text" id="blogBaslik" name="baslik" class="w-full border-gray-300 rounded-lg" required></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Özet</label><textarea name="ozet" rows="2" class="w-full border-gray-300 rounded-lg"></textarea></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Ana Resim</label><input type="file" name="foto" accept="image/*" class="w-full border-gray-300 rounded-lg text-sm"></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">İçerik</label><textarea id="blogEditor" name="icerik" rows="10" class="w-full border-gray-300 rounded-lg" required></textarea></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Durum</label><select name="durum" class="w-full border-gray-300 rounded-lg"><option value="taslak">Taslak</option><option value="yayinda">Yayında</option></select></div>
            <div class="flex gap-2">
                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">Yayınla</button>
                <button type="button" onclick="document.getElementById('blogForm').classList.add('hidden')" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-300">İptal</button>
            </div>
        </form>
    </div>

    {{-- Blog List --}}
    <div class="divide-y">
        @foreach($yazilar as $yazi)
            <div class="p-4 flex items-center justify-between">
                <div class="flex-1">
                    <span class="font-medium text-gray-900">{{ $yazi->baslik }}</span>
                    <span class="px-2 py-0.5 rounded-full text-xs font-medium ml-2
                        @if($yazi->durum == 'yayinda') bg-green-100 text-green-700
                        @else bg-yellow-100 text-yellow-700 @endif">
                        {{ $yazi->durum == 'yayinda' ? 'Yayında' : 'Taslak' }}
                    </span>
                    <span class="text-xs text-gray-400 block mt-1">{{ $yazi->created_at->format('d.m.Y') }} - {{ $yazi->goruntulenme }} görüntülenme</span>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.blog-duzenle', $yazi->id) }}" class="text-blue-500 hover:text-blue-600 p-2"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.blog-sil', $yazi->id) }}" method="POST" onsubmit="return confirm('Emin misiniz?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600 p-2"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4">{{ $yazilar->links() }}</div>
</div>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/l5db751zbe60hzofqiqch61xfkoveax3rkob87g44ffhgbu1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#blogEditor',
    height: 400,
    menubar: false,
    plugins: 'lists link image code table wordcount',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
    content_style: 'body { font-family: sans-serif; font-size: 14px; }',
    entity_encoding: 'raw',
    images_upload_url: '{{ route("admin.blog-resim-yukle") }}',
    images_upload_handler: function (blobInfo) {
        return new Promise(function (resolve, reject) {
            var xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{ route("admin.blog-resim-yukle") }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onload = function () {
                if (xhr.status != 200) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }
                var json = JSON.parse(xhr.responseText);
                if (!json.location || typeof json.location != 'string') {
                    reject('Geçersiz yanıt: ' + xhr.responseText);
                    return;
                }
                resolve(json.location);
            };
            xhr.onerror = function () {
                reject('Resim yükleme başarısız. Ağ hatası.');
            };
            var formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        });
    },
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});

document.getElementById('blogFormSubmit').addEventListener('submit', function(e) {
    tinymce.activeEditor.save();
});
</script>
@endpush
@endsection