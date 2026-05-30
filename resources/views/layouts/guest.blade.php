<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="Kişiye özel ürünlerin buluşma noktası">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="font-sans antialiased text-dark-800 min-h-screen">
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12 bg-gradient-to-b from-cream-50 via-cream-100/30 to-gold-50/30 relative overflow-hidden">
        <div class="absolute inset-0 bg-luxury-pattern opacity-[0.03] pointer-events-none"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gold-500/5 rounded-full blur-3xl animate-float-slow pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-48 h-48 bg-gold-500/5 rounded-full blur-3xl animate-float pointer-events-none" style="animation-delay:2s"></div>
        <a href="{{ route('home') }}" class="mb-2 group relative z-10">
            <img src="{{ asset('img/logo.png') }}?v={{ filemtime(public_path('img/logo.png')) }}" alt="Kişiye Özel" class="h-16 w-auto">
        </a>
        <p class="text-gold-500/80 text-xs tracking-wider uppercase font-sans mb-12">Her Ürün Size Özel</p>
        @yield('content')
    </div>
</body>
</html>
