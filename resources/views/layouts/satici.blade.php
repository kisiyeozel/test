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
<body class="bg-cream-50 font-sans antialiased">
    <div x-data="{ sidebarOpen: true }" class="flex h-screen overflow-hidden">
        <aside x-show="sidebarOpen" class="w-64 bg-dark-950 border-r border-dark-800 shrink-0 overflow-y-auto" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0">
            <div class="p-5 border-b border-dark-800">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}?v={{ filemtime(public_path('img/logo.png')) }}" alt="Kişiye Özel" class="h-12 w-auto brightness-0 invert"></a>
                <p class="text-xs text-dark-400 mt-1"><i class="fas fa-store mr-1"></i>Satıcı Paneli</p>
            </div>
            <nav class="p-4 space-y-1 text-sm">
                <a href="{{ route('satici.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.dashboard') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition"><i class="fas fa-chart-pie w-5"></i>Dashboard</a>
                <a href="{{ route('satici.magaza') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.magaza*') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition"><i class="fas fa-store w-5"></i>Mağazam</a>
                <a href="{{ route('satici.urunler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.urunler*') || request()->routeIs('satici.urun-*') || request()->routeIs('satici.varyant*') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition"><i class="fas fa-box w-5"></i>Ürünlerim</a>
                <a href="{{ route('satici.siparisler') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.siparis*') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition"><i class="fas fa-truck w-5"></i>Siparişler</a>
                <a href="{{ route('satici.raporlar') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.raporlar*') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition"><i class="fas fa-file-invoice w-5"></i>Raporlar</a>
                <a href="{{ route('satici.galeri') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.galeri*') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition"><i class="fas fa-images w-5"></i>Galeri</a>
                @php $bekleyenSoru = \App\Models\UrunSorusu::whereIn('urun_id', \App\Models\Urun::where('kullanici_id', auth()->id())->pluck('id'))->where('durum', 'beklemede')->count(); @endphp
                <a href="{{ route('satici.sorular') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('satici.sorular*') ? 'bg-gold-500/10 text-gold-400 font-medium' : 'text-dark-300 hover:bg-dark-800 hover:text-cream-100' }} transition">
                    <i class="fas fa-question-circle w-5"></i>Sorular
                    @if($bekleyenSoru > 0)
                        <span class="ml-auto bg-red-500 text-white text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center">{{ $bekleyenSoru }}</span>
                    @endif
                </a>
                <hr class="my-3 border-dark-800">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-dark-400 hover:bg-dark-800 hover:text-cream-100 transition"><i class="fas fa-arrow-left w-5"></i>Siteye Dön</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-dark-400 hover:bg-dark-800 hover:text-cream-100 transition"><i class="fas fa-sign-out-alt w-5"></i>Çıkış Yap</button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white border-b border-cream-200 px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-dark-500 hover:text-gold-600 lg:hidden"><i class="fas fa-bars text-lg"></i></button>
                    <h1 class="text-lg font-semibold text-dark-900">@yield('page_title', 'Satıcı Paneli')</h1>
                </div>
                <div class="flex items-center gap-4 text-sm text-dark-500">
                    <span class="hidden sm:inline">{{ auth()->user()->ad_soyad }}</span>
                    <a href="{{ route('profile.edit') }}" class="text-gold-600 hover:text-gold-700"><i class="fas fa-user-cog"></i></a>
                    <a href="{{ route('home') }}" class="text-dark-400 hover:text-gold-600"><i class="fas fa-external-link-alt"></i></a>
                </div>
            </header>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-3 text-sm flex items-center gap-2"><i class="fas fa-check-circle text-green-500"></i>{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-3 text-sm flex items-center gap-2"><i class="fas fa-exclamation-circle text-red-500"></i>{{ session('error') }}</div>
            @endif

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
