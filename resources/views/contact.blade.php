@extends('layouts.app')

@section('title', 'İletişim')
@section('meta_desc', 'Sorularınız veya özel talepleriniz için bizimle iletişime geçin')

@section('content')
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">İletişim</h1>
        <p class="text-dark-400 mt-2">Sorularınız veya özel talepleriniz için bize yazın</p>
    </div>
</div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(session('success'))
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl text-sm mb-8">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shrink-0"><i class="fas fa-check-circle text-green-600"></i></div>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-8 mb-10">
        <div class="bg-white rounded-2xl border border-dark-100 p-6">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-envelope text-gold-500"></i></div>
            <h3 class="font-semibold text-dark-900 mb-1">E-posta</h3>
            <p class="text-dark-400 text-sm">info@kisiyeozel.org</p>
        </div>
        <div class="bg-white rounded-2xl border border-dark-100 p-6">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-phone text-gold-500"></i></div>
            <h3 class="font-semibold text-dark-900 mb-1">Telefon</h3>
            <p class="text-dark-400 text-sm">0850 000 00 00</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-dark-100 p-8">
        <h2 class="text-xl font-bold text-dark-900 mb-6">Mesaj Gönder</h2>
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="col-span-2 sm:col-span-1">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Ad Soyad *</label>
                    <input type="text" name="ad_soyad" required value="{{ old('ad_soyad') }}" class="input-field">
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">E-posta *</label>
                    <input type="email" name="email" required value="{{ old('email') }}" class="input-field">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Telefon</label>
                    <input type="text" name="telefon" value="{{ old('telefon') }}" class="input-field">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Konu</label>
                    <input type="text" name="konu" value="{{ old('konu') }}" class="input-field">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Mesajınız *</label>
                    <textarea name="mesaj" rows="5" required class="input-field">{{ old('mesaj') }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn-gold"><i class="fas fa-paper-plane"></i>Mesajı Gönder</button>
        </form>
    </div>
</div>
@endsection
