<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel') - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-gray-900 text-white shrink-0 hidden md:block overflow-y-auto">
            <div class="p-4 border-b border-gray-800">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}?v={{ filemtime(public_path('img/logo.png')) }}" alt="Kişiye Özel" class="h-12 w-auto brightness-0 invert"></a>
                <p class="text-xs text-gray-500 mt-1">Admin Paneli</p>
            </div>
            <nav class="p-4 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-chart-pie w-5"></i>Dashboard</a>
                <a href="{{ route('admin.kullanicilar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kullanicilar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-users w-5"></i>Kullanıcılar</a>
                <a href="{{ route('admin.urunler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.urunler*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-box w-5"></i>Ürünler</a>
                <a href="{{ route('admin.magazalar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.magazalar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-store w-5"></i>Mağazalar</a>
                <a href="{{ route('admin.siparisler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.siparisler*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-truck w-5"></i>Siparişler</a>
                <a href="{{ route('admin.kategoriler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kategoriler*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-tags w-5"></i>Kategoriler</a>
                <a href="{{ route('admin.kuponlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kuponlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-percent w-5"></i>Kuponlar</a>
                <a href="{{ route('admin.bannerlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.bannerlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-images w-5"></i>Bannerlar</a>
                <a href="{{ route('admin.yorumlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.yorumlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-comments w-5"></i>Yorumlar</a>
                <hr class="my-3 border-gray-800">
                <a href="{{ route('admin.blog') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.blog*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-newspaper w-5"></i>Blog</a>
                <a href="{{ route('admin.blog-yorumlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.blog-yorumlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-comment-dots w-5"></i>Blog Yorumları</a>
                <a href="{{ route('admin.mesajlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.mesajlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-envelope w-5"></i>Mesajlar</a>
                <a href="{{ route('admin.sorular') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.sorular*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-question-circle w-5"></i>Sorular</a>
                <a href="{{ route('admin.ayarlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.ayarlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition"><i class="fas fa-cog w-5"></i>Ayarlar</a>
                <hr class="my-3 border-gray-800">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition"><i class="fas fa-arrow-left w-5"></i>Siteye Dön</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition"><i class="fas fa-sign-out-alt w-5"></i>Çıkış Yap</button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden" x-data="{ menuOpen: false }">
            <header class="bg-white border-b px-6 py-4 flex items-center justify-between md:hidden">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}?v={{ filemtime(public_path('img/logo.png')) }}" alt="Kişiye Özel" class="h-11 w-auto"></a>
                <button @click="menuOpen = !menuOpen" class="text-gray-600"><i class="fas fa-bars text-xl"></i></button>
            </header>
            <div x-show="menuOpen" x-cloak class="md:hidden bg-gray-900 text-white">
                <nav class="p-4 space-y-1 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-chart-pie w-5"></i>Dashboard</a>
                    <a href="{{ route('admin.kullanicilar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kullanicilar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-users w-5"></i>Kullanıcılar</a>
                    <a href="{{ route('admin.urunler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.urunler*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-box w-5"></i>Ürünler</a>
                    <a href="{{ route('admin.magazalar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.magazalar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-store w-5"></i>Mağazalar</a>
                    <a href="{{ route('admin.siparisler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.siparisler*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-truck w-5"></i>Siparişler</a>
                    <a href="{{ route('admin.kategoriler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kategoriler*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-tags w-5"></i>Kategoriler</a>
                    <a href="{{ route('admin.kuponlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kuponlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-percent w-5"></i>Kuponlar</a>
                    <a href="{{ route('admin.bannerlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.bannerlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-images w-5"></i>Bannerlar</a>
                    <a href="{{ route('admin.yorumlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.yorumlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-comments w-5"></i>Yorumlar</a>
                    <hr class="my-3 border-gray-800">
                    <a href="{{ route('admin.blog') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.blog*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-newspaper w-5"></i>Blog</a>
                    <a href="{{ route('admin.blog-yorumlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.blog-yorumlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-comment-dots w-5"></i>Blog Yorumları</a>
                    <a href="{{ route('admin.mesajlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.mesajlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-envelope w-5"></i>Mesajlar</a>
                    <a href="{{ route('admin.sorular') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.sorular*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-question-circle w-5"></i>Sorular</a>
                    <a href="{{ route('admin.ayarlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.ayarlar*') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition"><i class="fas fa-cog w-5"></i>Ayarlar</a>
                    <hr class="my-3 border-gray-800">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-gray-800 transition"><i class="fas fa-arrow-left w-5"></i>Siteye Dön</a>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-gray-800 transition"><i class="fas fa-sign-out-alt w-5"></i>Çıkış Yap</button></form>
                </nav>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-b border-green-200 text-green-700 px-6 py-3 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-b border-red-200 text-red-700 px-6 py-3 text-sm"><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</div>
            @endif

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
