<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?> — <?php echo $__env->yieldContent('page_title', __('Kişiye Özel Ürünler')); ?> — Her Ürün Size Özel</title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_desc', __('Kişiye özel ürünlerin buluşma noktası') . ' – Her Ürün Size Özel.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'kişiye özel, hediye, tasarım, özel ürün, butik, hediyelik'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>[x-cloak]{display:none!important}</style>
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Kisiyeozel">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('schemas'); ?>
    <script type="application/ld+json">
    <?php
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'kisiyeozel.org',
        'url' => config('app.url'),
        'logo' => asset('img/logo.png'),
        'description' => 'Kişiye özel ürünlerin buluşma noktası – Her Ürün Size Özel.',
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '0850 000 00 00',
            'email' => 'info@kisiyeozel.org',
            'contactType' => 'customer service',
        ],
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'TR',
            'addressLocality' => 'İstanbul',
        ],
        'sameAs' => [
            'https://instagram.com/kisiyeozel',
            'https://facebook.com/kisiyeozel',
            'https://twitter.com/kisiyeozel',
        ],
    ];
    ?>
    <?php echo json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

    </script>
</head>
<body class="min-h-screen bg-cream-50 overflow-x-hidden touch-manipulation">
    <?php if(auth()->guard()->check()): ?>
        <?php $cartCount = array_sum(array_column(session('cart', []), 'adet')); ?>
    <?php endif; ?>

    <div class="scroll-progress pointer-events-none" id="scrollProgress"></div>

    
    <div id="topBar" class="bg-dark-950 text-dark-300 text-[11px] py-2 hidden md:block tracking-wider uppercase transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <span class="flex items-center gap-2"><i class="fas fa-truck text-gold-400 text-xs"></i> <?php echo e(__('500₺ üzeri ücretsiz kargo')); ?></span>
                <span class="flex items-center gap-2"><i class="fas fa-shield-alt text-gold-400 text-xs"></i> <?php echo e(__('Güvenli ödeme')); ?></span>
                <span class="flex items-center gap-2"><i class="fas fa-undo text-gold-400 text-xs"></i> <?php echo e(__('Kolay iade')); ?></span>
            </div>
            <div class="flex items-center gap-6">
                <a href="<?php echo e(route('satici-basvuru')); ?>" class="hover:text-gold-300 transition flex items-center gap-2"><i class="fas fa-store text-gold-400 text-xs"></i> <?php echo e(__('Mağazanı Aç')); ?></a>
                <a href="<?php echo e(route('faq')); ?>" class="hover:text-gold-300 transition"><?php echo e(__('Yardım')); ?></a>
                <div class="flex items-center gap-1 border-l border-dark-800 pl-4">
                    <a href="?lang=tr" class="text-xs px-2 py-1 rounded <?php echo e(app()->getLocale() == 'tr' ? 'text-gold-400 bg-dark-800' : 'text-dark-400 hover:text-gold-300'); ?> transition">TR</a>
                    <a href="?lang=en" class="text-xs px-2 py-1 rounded <?php echo e(app()->getLocale() == 'en' ? 'text-gold-400 bg-dark-800' : 'text-dark-400 hover:text-gold-300'); ?> transition">EN</a>
                </div>
            </div>
        </div>
    </div>

    
    <header id="mainNav" class="bg-cream-50/95 backdrop-blur-2xl sticky top-0 z-50 border-b border-dark-100/50 transition-all duration-300" x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20 transition-all duration-300" id="navInner">
                
                <a href="<?php echo e(route('home')); ?>" class="flex items-center shrink-0 transition-all duration-300 nav-logo">
                    <img src="<?php echo e(asset('img/logo.png')); ?>?v=<?php echo e(filemtime(public_path('img/logo.png'))); ?>" alt="Kişiye Özel" class="h-9 md:h-12 w-auto">
                </a>

                
                <form action="<?php echo e(route('search')); ?>" method="GET" class="hidden lg:flex flex-1 max-w-sm mx-8"
                      x-data="{ q: '', resultsOpen: false, products: [], categories: [], search() { if (this.q.length < 2) { this.resultsOpen = false; return } fetch('/arama-suggestions?q=' + encodeURIComponent(this.q)).then(r => r.json()).then(data => { this.products = data.products; this.categories = data.categories; this.resultsOpen = true }) } }"
                      @click.outside="resultsOpen = false">
                    <div class="relative w-full group">
                        <input type="text" name="q" x-model="q" @input.debounce.300ms="search" autocomplete="off"
                               placeholder="<?php echo e(__('Ne aramıştınız?')); ?>"
                               class="w-full pl-10 pr-4 py-2.5 bg-dark-50/50 border border-dark-100 rounded-lg text-sm text-dark-800 placeholder-dark-300 focus:bg-white focus:border-gold-300 focus:ring-2 focus:ring-gold-500/10 transition-all duration-200">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-dark-300 text-sm"></i>

                        <div x-show="resultsOpen && q.length >= 2" x-cloak
                             class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border border-dark-100 z-50 overflow-hidden max-h-96 overflow-y-auto">
                            <template x-for="cat in categories" :key="'cat-'+cat.id">
                                <a :href="cat.url" class="flex items-center gap-3 px-4 py-3 hover:bg-gold-50/50 transition border-b border-dark-50 last:border-0">
                                    <i class="fas fa-folder text-gold-500 text-sm w-5 shrink-0"></i>
                                    <span class="text-sm text-dark-700"><span class="text-dark-400 text-xs mr-1">Kategori:</span><span x-text="cat.kategori_adi"></span></span>
                                </a>
                            </template>
                            <template x-for="prod in products" :key="'prod-'+prod.id">
                                <a :href="prod.url" class="flex items-center gap-3 px-4 py-3 hover:bg-gold-50/50 transition border-b border-dark-50 last:border-0">
                                    <img :src="prod.ana_foto ? '/storage/' + prod.ana_foto : '/img/no-image.png'" class="w-10 h-10 rounded-lg object-cover bg-dark-50 shrink-0" :alt="prod.urun_adi">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-dark-800 font-medium truncate" x-text="prod.urun_adi"></p>
                                        <p class="text-xs text-gold-600 font-semibold" x-text="parseFloat(prod.fiyat).toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' })"></p>
                                    </div>
                                </a>
                            </template>
                            <div x-show="!categories.length && !products.length && q.length >= 2"
                                 class="px-4 py-6 text-center text-dark-400 text-sm">
                                Sonuç bulunamadı.
                            </div>
                        </div>
                    </div>
                </form>

                
                <div class="flex items-center gap-1">
                    <a href="<?php echo e(route('kendi-urunlerimiz')); ?>" class="hidden md:block nav-link py-2 px-2.5"><?php echo e(__("Kisiyeozel.org Ürünleri")); ?></a>
                    <a href="<?php echo e(route('products')); ?>" class="hidden md:block nav-link py-2 px-2.5"><?php echo e(__('Ürünler')); ?></a>
                    <a href="<?php echo e(route('magazalar')); ?>" class="hidden md:block nav-link py-2 px-2.5"><?php echo e(__('Mağazalar')); ?></a>

                    
                    <a href="<?php echo e(route('cart')); ?>" class="relative p-2.5 text-dark-500 hover:text-gold-600 transition rounded-lg hover:bg-gold-50/50">
                        <i class="fas fa-shopping-bag text-lg"></i>
                        <span class="absolute -top-0.5 -right-0.5 bg-gold-500 text-white text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center shadow-sm animate-scale-in"><?php echo e($cartCount ?? 0); ?></span>
                    </a>

                    <?php if(auth()->guard()->check()): ?>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 p-2 text-dark-500 hover:text-gold-600 transition rounded-lg hover:bg-gold-50/50">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-sm font-semibold shadow-sm overflow-hidden">
                                    <?php if(auth()->user()->avatar): ?>
                                        <img src="<?php echo e(asset('img/'.auth()->user()->avatar)); ?>" alt="" class="w-full h-full object-cover object-center">
                                    <?php else: ?>
                                        <div class="w-full h-full bg-gradient-to-br from-gold-500 to-gold-400 flex items-center justify-center"><?php echo e(substr(auth()->user()->ad_soyad, 0, 1)); ?></div>
                                    <?php endif; ?>
                                </div>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="open && 'rotate-180'"></i>
                            </button>
                            <div x-show="open" @click.outside="open = false" x-cloak
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl border border-dark-100 py-2 z-50"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95">
                                <div class="px-4 py-2.5 border-b border-dark-50">
                                    <p class="text-sm font-semibold text-dark-900"><?php echo e(auth()->user()->ad_soyad); ?></p>
                                    <p class="text-xs text-dark-400"><?php echo e(auth()->user()->email); ?></p>
                                </div>
                                <a href="<?php echo e(route('siparislerim')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-dark-600 hover:bg-gold-50/50 transition"><i class="fas fa-box w-5 text-gold-500"></i><?php echo e(__('Siparişlerim')); ?></a>
                                <a href="<?php echo e(route('favoriler')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-dark-600 hover:bg-gold-50/50 transition"><i class="fas fa-heart w-5 text-gold-400"></i><?php echo e(__('Favorilerim')); ?></a>
                                <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-dark-600 hover:bg-gold-50/50 transition"><i class="fas fa-user-cog w-5 text-dark-400"></i><?php echo e(__('Profilim')); ?></a>
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <div class="border-t border-dark-50 my-1"></div>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gold-600 font-medium hover:bg-gold-50/50 transition"><i class="fas fa-crown w-5"></i><?php echo e(__('Admin Paneli')); ?></a>
                                <?php endif; ?>
                                <?php if(auth()->user()->magaza && auth()->user()->magaza->durum === 'onaylandi'): ?>
                                    <div class="border-t border-dark-50 my-1"></div>
                                    <a href="<?php echo e(route('satici.dashboard')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gold-600 font-medium hover:bg-gold-50/50 transition"><i class="fas fa-store w-5"></i><?php echo e(__('Satıcı Paneli')); ?></a>
                                <?php endif; ?>
                                <div class="border-t border-dark-50 my-1"></div>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition"><i class="fas fa-sign-out-alt w-5"></i><?php echo e(__('Çıkış Yap')); ?></button>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-dark-500 hover:text-gold-600 transition px-3 py-2 rounded-lg hover:bg-gold-50/50"><?php echo e(__('Giriş')); ?></a>
                        <a href="<?php echo e(route('register')); ?>" class="btn-gold !py-2.5 !px-5 text-xs !shadow-none"><?php echo e(__('Kayıt Ol')); ?></a>
                    <?php endif; ?>

                    <button @click="mobileOpen = !mobileOpen" class="md:hidden p-3 min-w-[44px] min-h-[44px] flex items-center justify-center text-dark-500 hover:text-gold-600 transition rounded-lg hover:bg-gold-50/50">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="mobileOpen"
             @click.outside="mobileOpen = false"
             x-cloak
             id="mobileNav" class="md:hidden border-t border-dark-100/50 bg-cream-50">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
                <form action="<?php echo e(route('search')); ?>" method="GET" class="mb-4"
                      x-data="{ q: '', resultsOpen: false, products: [], categories: [], search() { if (this.q.length < 2) { this.resultsOpen = false; return } fetch('/arama-suggestions?q=' + encodeURIComponent(this.q)).then(r => r.json()).then(data => { this.products = data.products; this.categories = data.categories; this.resultsOpen = true }) } }"
                      @click.outside="resultsOpen = false">
                    <div class="relative">
                        <input type="text" name="q" x-model="q" @input.debounce.300ms="search" autocomplete="off"
                               placeholder="<?php echo e(__('Ürün ara...')); ?>" class="w-full pl-10 pr-4 py-3 bg-dark-50/50 border border-dark-100 rounded-lg text-sm">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-dark-300"></i>

                        <div x-show="resultsOpen && q.length >= 2" x-cloak
                             class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border border-dark-100 z-50 overflow-hidden max-h-72 overflow-y-auto">
                            <template x-for="cat in categories" :key="'cat-'+cat.id">
                                <a :href="cat.url" class="flex items-center gap-3 px-4 py-3 hover:bg-gold-50/50 transition border-b border-dark-50 last:border-0">
                                    <i class="fas fa-folder text-gold-500 text-sm w-5 shrink-0"></i>
                                    <span class="text-sm text-dark-700"><span class="text-dark-400 text-xs mr-1">Kategori:</span><span x-text="cat.kategori_adi"></span></span>
                                </a>
                            </template>
                            <template x-for="prod in products" :key="'prod-'+prod.id">
                                <a :href="prod.url" class="flex items-center gap-3 px-4 py-3 hover:bg-gold-50/50 transition border-b border-dark-50 last:border-0">
                                    <img :src="prod.ana_foto ? '/storage/' + prod.ana_foto : '/img/no-image.png'" class="w-10 h-10 rounded-lg object-cover bg-dark-50 shrink-0" :alt="prod.urun_adi">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-dark-800 font-medium truncate" x-text="prod.urun_adi"></p>
                                        <p class="text-xs text-gold-600 font-semibold" x-text="parseFloat(prod.fiyat).toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' })"></p>
                                    </div>
                                </a>
                            </template>
                            <div x-show="!categories.length && !products.length && q.length >= 2"
                                 class="px-4 py-6 text-center text-dark-400 text-sm">
                                Sonuç bulunamadı.
                            </div>
                        </div>
                    </div>
                </form>
                <a href="<?php echo e(route('home')); ?>" class="block px-4 py-3 text-dark-700 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Ana Sayfa')); ?></a>
                <a href="<?php echo e(route('kendi-urunlerimiz')); ?>" class="block px-4 py-3 text-dark-700 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__("Kisiyeozel.org Ürünleri")); ?></a>
                <a href="<?php echo e(route('products')); ?>" class="block px-4 py-3 text-dark-700 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Ürünler')); ?></a>
                <a href="<?php echo e(route('magazalar')); ?>" class="block px-4 py-3 text-dark-700 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Mağazalar')); ?></a>
                <a href="<?php echo e(route('blog')); ?>" class="block px-4 py-3 text-dark-700 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Blog')); ?></a>
                <hr class="border-dark-100 my-2">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('siparislerim')); ?>" class="block px-4 py-3 text-dark-600 hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Siparişlerim')); ?></a>
                    <a href="<?php echo e(route('favoriler')); ?>" class="block px-4 py-3 text-dark-600 hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Favorilerim')); ?></a>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-3 text-dark-600 hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Profilim')); ?></a>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="block px-4 py-3 text-gold-600 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Admin Paneli')); ?></a>
                    <?php elseif(auth()->user()->isSatici()): ?>
                        <a href="<?php echo e(route('satici.dashboard')); ?>" class="block px-4 py-3 text-gold-600 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Satıcı Paneli')); ?></a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="block px-4 py-3 text-dark-600 hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Giriş Yap')); ?></a>
                    <a href="<?php echo e(route('register')); ?>" class="block px-4 py-3 text-gold-600 font-medium hover:bg-gold-50/50 rounded-lg transition"><?php echo e(__('Kayıt Ol')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    
    <?php if(session('success')): ?>
        <div class="max-w-7xl mx-auto px-4 mt-4 animate-slide-up" id="flashMsg">
            <div class="flex items-center gap-3 bg-cream-100 border border-gold-200 text-dark-700 px-5 py-3.5 rounded-lg text-sm shadow-sm">
                <div class="w-8 h-8 bg-gold-100 rounded-full flex items-center justify-center shrink-0"><i class="fas fa-check-circle text-gold-600"></i></div>
                <?php echo e(session('success')); ?>

                <button onclick="document.getElementById('flashMsg').remove()" class="ml-auto text-dark-400 hover:text-dark-600 transition-colors"><i class="fas fa-times"></i></button>
            </div>
        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="max-w-7xl mx-auto px-4 mt-4 animate-slide-up" id="flashMsg">
            <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-3.5 rounded-lg text-sm shadow-sm">
                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center shrink-0"><i class="fas fa-exclamation-circle text-red-600"></i></div>
                <?php echo e(session('error')); ?>

                <button onclick="document.getElementById('flashMsg').remove()" class="ml-auto text-red-500 hover:text-red-700 transition-colors"><i class="fas fa-times"></i></button>
            </div>
        </div>
    <?php endif; ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="bg-dark-950 text-dark-400 noise-overlay">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="py-16 border-b border-dark-800">
                <div class="max-w-lg mx-auto text-center">
                    <div class="w-12 h-12 mx-auto bg-gold-500/10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-gold-400"></i>
                    </div>
                    <h3 class="text-2xl font-serif text-white font-semibold mb-2"><?php echo e(__('Fırsatları Kaçırma')); ?></h3>
                    <p class="text-sm text-dark-500 mb-6"><?php echo e(__('Yeni ürünlerden, kampanyalardan ve özel indirimlerden haberdar ol.')); ?></p>
                    <form action="#" method="POST" class="flex gap-3 max-w-md mx-auto">
                        <input type="email" placeholder="<?php echo e(__('E-posta adresiniz')); ?>" class="flex-1 bg-dark-800/50 border border-dark-700 rounded-lg px-4 py-3 text-sm text-white placeholder-dark-500 focus:border-gold-500 focus:ring-2 focus:ring-gold-500/10 transition">
                        <button type="submit" class="btn-gold shrink-0"><?php echo e(__('Abone Ol')); ?></button>
                    </form>
                </div>
            </div>

            
            <?php $footerBannerlar = \App\Models\Banner::where('aktif', true)->where('pozisyon', 'footer')->orderBy('sira')->get(); ?>
            <?php if($footerBannerlar->count() > 0): ?>
                <div class="py-8 border-b border-dark-800">
                    <div class="grid grid-cols-2 md:grid-cols-<?php echo e(min($footerBannerlar->count(), 4)); ?> gap-4">
                        <?php $__currentLoopData = $footerBannerlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($banner->link ?: '#'); ?>" class="group relative overflow-hidden rounded-xl h-28 block">
                                <img src="<?php echo e(asset('storage/banner/' . $banner->foto)); ?>" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" alt="<?php echo e($banner->baslik); ?>" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-dark-950/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-2 left-3 right-3"><p class="text-white text-sm font-serif font-semibold"><?php echo e($banner->baslik); ?></p></div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 py-16">
                <div>
                    <a href="<?php echo e(route('home')); ?>" class="block mb-4">
                        <img src="<?php echo e(asset('img/logo.png')); ?>?v=<?php echo e(filemtime(public_path('img/logo.png'))); ?>" alt="Kişiye Özel" class="h-10 md:h-12 w-auto brightness-0 invert">
                    </a>
                    <p class="text-[11px] text-gold-500/70 tracking-wider uppercase font-sans mb-5">Her Ürün Size Özel</p>
                    <p class="text-sm leading-relaxed text-dark-500 mb-6">Türkiye'nin en özel kişiye özel ürün platformu. <span class="text-gold-400 font-medium">Her Ürün Size Özel</span> — her siparişiniz özenle hazırlanır, kişisel dokunuşlarla paketlenir ve hızla kapınıza teslim edilir.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-dark-800 hover:bg-gold-600 hover:text-white rounded-lg flex items-center justify-center transition-all text-dark-400"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 bg-dark-800 hover:bg-gold-600 hover:text-white rounded-lg flex items-center justify-center transition-all text-dark-400"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 bg-dark-800 hover:bg-gold-600 hover:text-white rounded-lg flex items-center justify-center transition-all text-dark-400"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-5 font-serif"><?php echo e(__('Keşfet')); ?></h4>
                    <ul class="space-y-3.5 text-sm">
                        <li><a href="<?php echo e(route('kendi-urunlerimiz')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__("Kisiyeozel.org Ürünleri")); ?></a></li>
                        <li><a href="<?php echo e(route('products')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Tüm Ürünler')); ?></a></li>
                        <li><a href="<?php echo e(route('magazalar')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Mağazalar')); ?></a></li>
                        <li><a href="<?php echo e(route('blog')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Blog')); ?></a></li>
                        <li><a href="<?php echo e(route('satici-basvuru')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Mağazanı Aç')); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-5 font-serif"><?php echo e(__('Kurumsal')); ?></h4>
                    <ul class="space-y-3.5 text-sm">
                        <li><a href="<?php echo e(route('hakkimizda')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Hakkımızda')); ?></a></li>
                        <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('İletişim')); ?></a></li>
                        <li><a href="<?php echo e(route('faq')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('SSS')); ?></a></li>
                        <li><a href="<?php echo e(route('kullanici-sozlesmesi')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Kullanıcı Sözleşmesi')); ?></a></li>
                        <li><a href="<?php echo e(route('mesafeli-satis')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('Mesafeli Satış')); ?></a></li>
                        <li><a href="<?php echo e(route('kvkk')); ?>" class="hover:text-gold-400 transition flex items-center gap-2 group/link"><span class="w-1.5 h-1.5 bg-gold-500/50 rounded-full group-hover/link:bg-gold-500 transition"></span><?php echo e(__('KVKK & Gizlilik')); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-5 font-serif">İletişim</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-envelope text-gold-400 text-xs"></i></div>
                            <div><p class="text-white text-sm font-medium">E-posta</p><p class="text-dark-500 text-xs mt-0.5">info@kisiyeozel.org</p></div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-phone text-gold-400 text-xs"></i></div>
                            <div><p class="text-white text-sm font-medium">Telefon</p><p class="text-dark-500 text-xs mt-0.5">0850 000 00 00</p></div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-map-marker-alt text-gold-400 text-xs"></i></div>
                            <div><p class="text-white text-sm font-medium">Adres</p><p class="text-dark-500 text-xs mt-0.5">İstanbul, Türkiye</p></div>
                        </li>
                    </ul>
                </div>
            </div>

            
            <div class="border-t border-dark-800 py-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
                <p class="text-dark-500">&copy; <?php echo e(date('Y')); ?> kisiyeozel.org. <?php echo e(__('Tüm hakları saklıdır.')); ?></p>
                <div class="flex items-center gap-6">
                    <a href="<?php echo e(route('kvkk')); ?>" class="text-dark-500 hover:text-gold-400 transition"><?php echo e(__('Gizlilik')); ?></a>
                    <a href="<?php echo e(route('kullanici-sozlesmesi')); ?>" class="text-dark-500 hover:text-gold-400 transition"><?php echo e(__('Şartlar')); ?></a>
                    <a href="<?php echo e(route('mesafeli-satis')); ?>" class="text-dark-500 hover:text-gold-400 transition"><?php echo e(__('İade')); ?></a>
                </div>
                <div class="flex items-center gap-3 text-dark-600">
                    <i class="fab fa-cc-visa text-xl"></i>
                    <i class="fab fa-cc-mastercard text-xl"></i>
                    <i class="fab fa-cc-amex text-xl"></i>
                </div>
            </div>
        </div>
    </footer>

    
    <button id="scrollTop" class="fixed bottom-6 left-6 w-12 h-12 bg-gold-500 text-white rounded-xl shadow-lg shadow-gold-500/20 hover:bg-gold-600 hover:shadow-xl hover:shadow-gold-500/30 transition-all duration-300 z-50 opacity-0 invisible translate-y-4 active:scale-90"
            onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        const topBar = document.getElementById('topBar');
        const mainNav = document.getElementById('mainNav');
        const navInner = document.getElementById('navInner');
        const scrollBtn = document.getElementById('scrollTop');
        const scrollProgress = document.getElementById('scrollProgress');

        if (scrolled > 60) {
            if (topBar) topBar.style.display = 'none';
            mainNav.classList.add('shadow-sm', 'shadow-dark-900/5');
            navInner?.classList.add('h-14', 'md:h-16');
            navInner?.classList.remove('h-16', 'md:h-20');
        } else {
            if (topBar) topBar.style.display = '';
            mainNav.classList.remove('shadow-sm', 'shadow-dark-900/5');
            navInner?.classList.remove('h-14', 'md:h-16');
            navInner?.classList.add('h-16', 'md:h-20');
        }

        if (scrolled > 400) {
            scrollBtn.classList.remove('opacity-0', 'invisible', 'translate-y-4');
            scrollBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
        } else {
            scrollBtn.classList.add('opacity-0', 'invisible', 'translate-y-4');
            scrollBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
        }

        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        if (scrollProgress) {
            scrollProgress.style.setProperty('--scroll-progress', Math.min(scrolled / docHeight, 1));
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach(el => observer.observe(el));
    });
    </script>
    <script>
    function toggleFavori(urunId, btn) {
        btn.disabled = true;
        fetch('<?php echo e(route("favori.toggle", ["urunId" => "FAVORI_ID"])); ?>'.replace('FAVORI_ID', urunId), {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }
        }).then(r => r.json()).then(d => {
            btn.disabled = false;
            const icon = btn.querySelector('i');
            const text = btn.querySelector('span');
            if (d.favori) {
                icon.className = 'fas fa-heart text-sm';
                if (text) {
                    btn.className = 'favori-btn flex items-center gap-2 px-4 py-2 rounded-full border text-sm font-medium transition-all duration-200 bg-red-50 border-red-200 text-red-500';
                    text.textContent = 'Favorilerden Çıkar';
                } else {
                    btn.className = 'favori-btn w-9 h-9 flex items-center justify-center rounded-full bg-white shadow-md hover:scale-110 transition-all duration-200 text-red-500';
                }
                toast('Ürün favorilere eklendi');
            } else {
                icon.className = 'far fa-heart text-sm';
                if (text) {
                    btn.className = 'favori-btn flex items-center gap-2 px-4 py-2 rounded-full border text-sm font-medium transition-all duration-200 border-dark-200 text-dark-400 hover:border-red-200 hover:text-red-400 hover:bg-red-50';
                    text.textContent = 'Favorilere Ekle';
                } else {
                    btn.className = 'favori-btn w-9 h-9 flex items-center justify-center rounded-full bg-white shadow-md hover:scale-110 transition-all duration-200 text-gray-400 hover:text-red-400';
                }
                toast('Ürün favorilerden çıkarıldı');
            }
        }).catch(e => { btn.disabled = false; toast('Bir hata oluştu'); });
    }

    function toast(msg) {
        const el = document.createElement('div');
        el.style.cssText = 'position:fixed;top:24px;right:24px;z-index:99999;background:#1a1a2e;color:#fff;padding:14px 22px;border-radius:16px;font-size:14px;font-weight:500;display:flex;align-items:center;gap:10px;box-shadow:0 20px 60px rgba(0,0,0,0.3);transform:translateX(0);opacity:1;transition:all 0.3s ease';
        el.innerHTML = '<i class="fas fa-heart" style="color:#ef4444"></i>' + msg;
        document.body.appendChild(el);
        setTimeout(() => { el.style.opacity = '0'; el.style.transform = 'translateX(30px)'; setTimeout(() => el.remove(), 300); }, 2500);
    }
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6a122e1f8673aa1c3e766f05/1jpbg8b7r';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
        .then(() => console.log('PWA: Service Worker registered'))
        .catch(err => console.warn('PWA: SW registration failed', err));
}
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/layouts/app.blade.php ENDPATH**/ ?>