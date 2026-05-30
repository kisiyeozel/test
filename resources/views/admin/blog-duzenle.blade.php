@extends('layouts.admin') @section('title', 'Blog Düzenle')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.blog') }}" class="text-sm text-gray-500 hover:text-gray-700"><i class="fas fa-arrow-left mr-1"></i>Blog Yazılarına Dön</a>
</div>

<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Yazı Düzenle: {{ $yazi->baslik }}</h2></div>
    <form id="blogEditForm" action="{{ route('admin.blog-guncelle', $yazi->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Başlık</label><input type="text" id="blogBaslik" name="baslik" value="{{ $yazi->baslik }}" class="w-full border-gray-300 rounded-lg" required></div>
        <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Özet</label><textarea name="ozet" rows="2" class="w-full border-gray-300 rounded-lg">{{ $yazi->ozet }}</textarea></div>
        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Ana Resim</label>
            @if($yazi->foto)
                <div class="mb-2"><img src="{{ asset('storage/blog/' . $yazi->foto) }}" class="w-48 h-32 object-cover rounded-lg border"></div>
            @endif
            <input type="file" name="foto" accept="image/*" class="w-full border-gray-300 rounded-lg text-sm">
            <p class="text-xs text-gray-400 mt-1">Yeni resim seçmezseniz mevcut resim korunur</p>
        </div>
        <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">İçerik</label><textarea id="blogEditor" name="icerik" rows="12" class="w-full border-gray-300 rounded-lg" required>{{ html_entity_decode($yazi->icerik) }}</textarea></div>
        <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Durum</label><select name="durum" class="w-full border-gray-300 rounded-lg"><option value="taslak" {{ $yazi->durum == 'taslak' ? 'selected' : '' }}>Taslak</option><option value="yayinda" {{ $yazi->durum == 'yayinda' ? 'selected' : '' }}>Yayında</option></select></div>
        <div class="flex gap-2">
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">Güncelle</button>
            <a href="{{ route('admin.blog') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-300">İptal</a>
        </div>
    </form>
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

document.getElementById('blogEditForm').addEventListener('submit', function(e) {
    tinymce.activeEditor.save();
});
</script>
@endpush
@endsection