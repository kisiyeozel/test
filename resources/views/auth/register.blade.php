@extends('layouts.guest')

@section('title', 'Kayıt Ol')

@section('content')
<div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-gold-500/5 border border-gold-100/50 p-8 md:p-10">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-serif font-bold text-dark-900">Hesap Oluştur</h1>
        <p class="text-sm text-dark-400 mt-1.5 font-sans">Kişiye özel dünyaya adım atın</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">Ad Soyad</label>
            <input type="text" name="ad_soyad" value="{{ old('ad_soyad') }}" class="input-field" required placeholder="Adınız Soyadınız">
            @error('ad_soyad')<p class="text-red-500 text-sm mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">E-posta</label>
            <input type="email" name="email" value="{{ old('email') }}" class="input-field" required placeholder="ornek@email.com">
            @error('email')<p class="text-red-500 text-sm mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">Telefon</label>
            <input type="text" name="telefon" value="{{ old('telefon') }}" class="input-field" placeholder="05XX XXX XX XX">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">Şifre</label>
            <input type="password" name="password" class="input-field" required placeholder="En az 8 karakter">
            @error('password')<p class="text-red-500 text-sm mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">Şifre Tekrar</label>
            <input type="password" name="password_confirmation" class="input-field" required placeholder="Şifrenizi tekrar girin">
        </div>
        <div class="mb-8">
            <label class="block text-sm font-medium text-dark-700 mb-3 font-sans">Hesap Türü</label>
            <div class="grid grid-cols-2 gap-3">
                <label class="flex items-center gap-3 p-3.5 border-2 border-dark-200 rounded-xl cursor-pointer hover:border-gold-300 transition-all duration-200 has-[:checked]:border-gold-500 has-[:checked]:bg-gold-50/50">
                    <input type="radio" name="role" value="musteri" checked class="sr-only">
                    <div class="w-9 h-9 bg-gold-100 rounded-lg flex items-center justify-center"><i class="fas fa-user text-gold-600"></i></div>
                    <span class="text-sm font-medium text-dark-700 font-sans">Müşteri</span>
                </label>
                <label class="flex items-center gap-3 p-3.5 border-2 border-dark-200 rounded-xl cursor-pointer hover:border-gold-300 transition-all duration-200 has-[:checked]:border-gold-500 has-[:checked]:bg-gold-50/50">
                    <input type="radio" name="role" value="satici" class="sr-only">
                    <div class="w-9 h-9 bg-gold-100 rounded-lg flex items-center justify-center"><i class="fas fa-store text-gold-600"></i></div>
                    <span class="text-sm font-medium text-dark-700 font-sans">Satıcı</span>
                </label>
            </div>
        </div>
        <button type="submit" class="btn-gold w-full justify-center shadow-2xl shadow-gold-500/20">Kayıt Ol</button>
    </form>

    <p class="text-center text-sm text-dark-400 mt-8 font-sans">
        Zaten hesabın var mı? <a href="{{ route('login') }}" class="text-gold-600 hover:text-gold-700 font-semibold">Giriş Yap</a>
    </p>
</div>
@endsection
