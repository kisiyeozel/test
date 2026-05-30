@extends('layouts.guest')

@section('title', 'Giriş Yap')

@section('content')
<div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-gold-500/5 border border-gold-100/50 p-8 md:p-10">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-serif font-bold text-dark-900">Hoş Geldiniz</h1>
        <p class="text-sm text-dark-400 mt-1.5 font-sans">Hesabınıza giriş yapın</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-5">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">E-posta</label>
            <input type="email" name="email" value="{{ old('email') }}" class="input-field" required autofocus placeholder="ornek@email.com">
            @error('email')<p class="text-red-500 text-sm mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
        </div>
        <div class="mb-5">
            <label class="block text-sm font-medium text-dark-700 mb-1.5 font-sans">Şifre</label>
            <input type="password" name="password" class="input-field" required placeholder="••••••••">
            @error('password')<p class="text-red-500 text-sm mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center justify-between mb-8">
            <label class="flex items-center text-sm cursor-pointer font-sans">
                <input type="checkbox" name="remember" class="rounded border-dark-200 text-gold-500 focus:ring-gold-500/20">
                <span class="ml-2 text-dark-500">Beni Hatırla</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-gold-600 hover:text-gold-700 font-medium font-sans">Şifremi Unuttum</a>
            @endif
        </div>
        <button type="submit" class="btn-gold w-full justify-center shadow-2xl shadow-gold-500/20">Giriş Yap</button>
    </form>

    <p class="text-center text-sm text-dark-400 mt-8 font-sans">
        Hesabın yok mu? <a href="{{ route('register') }}" class="text-gold-600 hover:text-gold-700 font-semibold">Kayıt Ol</a>
    </p>
</div>
@endsection
