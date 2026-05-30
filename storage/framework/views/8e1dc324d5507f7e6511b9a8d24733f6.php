<?php $__env->startSection('title', config('app.name')); ?>
<?php $__env->startSection('meta_desc', 'Kişiye özel ürünlerin buluşma noktası – Her Ürün Size Özel. Size özel tasarlanmış hediyelik eşya, aksesuar ve dekoratif ürünler.'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative min-h-screen flex flex-col overflow-hidden bg-dark-950 noise-overlay">
    <div class="gradient-mesh absolute inset-0"></div>
    <div class="absolute inset-0 bg-luxury-pattern opacity-20"></div>

    <div class="particle" style="--p-x:10%;--p-y:20%;--p-dur:7s;--p-delay:0s;--p-size:3px"></div>
    <div class="particle" style="--p-x:25%;--p-y:60%;--p-dur:9s;--p-delay:1.2s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:50%;--p-y:15%;--p-dur:8s;--p-delay:0.5s;--p-size:4px"></div>
    <div class="particle" style="--p-x:70%;--p-y:45%;--p-dur:11s;--p-delay:2s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:85%;--p-y:75%;--p-dur:6s;--p-delay:1s;--p-size:3px"></div>
    <div class="particle" style="--p-x:40%;--p-y:80%;--p-dur:10s;--p-delay:3s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:15%;--p-y:40%;--p-dur:8.5s;--p-delay:0.8s;--p-size:3px"></div>
    <div class="particle" style="--p-x:60%;--p-y:85%;--p-dur:7.5s;--p-delay:2.5s;--p-size:2px"></div>
    <div class="particle" style="--p-x:90%;--p-y:30%;--p-dur:9.5s;--p-delay:1.8s;--p-size:3px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:35%;--p-y:10%;--p-dur:6.5s;--p-delay:0.3s;--p-size:2px"></div>

    <div class="section-shape" style="width:500px;height:500px;background:radial-gradient(circle,rgba(212,168,83,0.08),transparent);top:-10%;right:-5%;--shape-dur:14s"></div>
    <div class="section-shape" style="width:400px;height:400px;background:radial-gradient(circle,rgba(212,168,83,0.06),transparent);bottom:-10%;left:-5%;--shape-dur:16s;--shape-delay:2s"></div>

    <div class="flex-1 flex items-center relative z-10 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="reveal">
                <div class="flex items-center gap-3 mb-8">
                    <div class="gold-line"></div>
                    <span class="text-gold-400 text-sm tracking-[0.2em] uppercase font-sans font-medium">Kişiye Özel Tasarımlar</span>
                </div>
                <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-serif font-bold text-white leading-[1.05] tracking-tight mb-4">
                    <span class="hero-title-line"><span style="animation-delay:0.2s" class="italic font-medium text-gold-300">Hayalinizdeki</span></span>
                    <span class="hero-title-line"><span style="animation-delay:0.5s">Özel Ürünü</span></span>
                    <span class="hero-title-line"><span style="animation-delay:0.8s" class="gradient-text">Keşfedin</span></span>
                </h1>
                <p class="text-gold-400 text-lg md:text-xl italic font-serif mb-2 reveal" style="animation-delay:1.1s">Her Ürün Size Özel</p>
                <p class="text-lg md:text-xl text-dark-300 max-w-xl mb-10 leading-relaxed font-sans">
                    Size özel tasarlanmış ürünler. İsminiz, fotoğrafınız ve özel mesajınızla kişiselleştirilmiş binlerce ürün.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo e(route('products')); ?>" class="btn-gold"><i class="fas fa-arrow-right"></i> Ürünleri Keşfet</a>
                    <a href="<?php echo e(route('satici-basvuru')); ?>" class="btn-outline-gold"><i class="fas fa-store"></i> Mağazanı Aç</a>
                </div>

                <div class="flex items-center gap-10 mt-14 pt-10 border-t border-dark-800">
                    <div>
                        <p class="text-3xl md:text-4xl font-serif font-bold text-white counter-value" data-target="<?php echo e($toplamUrun); ?>">0</p>
                        <p class="text-xs text-dark-500 mt-1 tracking-wider uppercase font-sans">Ürün</p>
                    </div>
                    <div class="w-px h-10 bg-dark-800"></div>
                    <div>
                        <p class="text-3xl md:text-4xl font-serif font-bold text-white counter-value" data-target="<?php echo e($toplamMagaza); ?>">0</p>
                        <p class="text-xs text-dark-500 mt-1 tracking-wider uppercase font-sans">Mağaza</p>
                    </div>
                    <div class="w-px h-10 bg-dark-800"></div>
                    <div>
                        <p class="text-3xl md:text-4xl font-serif font-bold text-white counter-value" data-target="<?php echo e($toplamMusteri); ?>">0</p>
                        <p class="text-xs text-dark-500 mt-1 tracking-wider uppercase font-sans">Müşteri</p>
                    </div>
                </div>
            </div>

            <div class="hidden lg:grid gap-5 reveal-right">
                <div class="glass-dark rounded-xl p-6 backdrop-blur-xl flex items-start gap-5 transition-all duration-500 hover:bg-white/[0.08] hover:translate-x-1 card-shine">
                    <div class="w-12 h-12 bg-gold-500/15 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-gem text-gold-400 text-lg"></i></div>
                    <div>
                        <h3 class="text-white font-serif font-semibold mb-1">Özel Hediye</h3>
                        <p class="text-sm text-dark-400 font-sans">Size özel paketleme ve kişisel dokunuş</p>
                    </div>
                </div>
                <div class="glass-dark rounded-xl p-6 backdrop-blur-xl flex items-start gap-5 transition-all duration-500 hover:bg-white/[0.08] hover:translate-x-1 card-shine" style="transition-delay:0.1s">
                    <div class="w-12 h-12 bg-gold-500/15 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-palette text-gold-400 text-lg"></i></div>
                    <div>
                        <h3 class="text-white font-serif font-semibold mb-1">Kişisel Tasarım</h3>
                        <p class="text-sm text-dark-400 font-sans">Her ürün size özel, her parça benzersiz</p>
                    </div>
                </div>
                <div class="glass-dark rounded-xl p-6 backdrop-blur-xl flex items-start gap-5 transition-all duration-500 hover:bg-white/[0.08] hover:translate-x-1 card-shine" style="transition-delay:0.2s">
                    <div class="w-12 h-12 bg-gold-500/15 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-shipping-fast text-gold-400 text-lg"></i></div>
                    <div>
                        <h3 class="text-white font-serif font-semibold mb-1">Hızlı Teslimat</h3>
                        <p class="text-sm text-dark-400 font-sans">3-5 iş gününde kapınızda, ücretsiz kargo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    
    <?php if(isset($heroBannerlar) && $heroBannerlar->count() > 0): ?>
    <div class="w-full" x-data="{ current: 0, anim: false, sliderTimer: null }" x-init="setTimeout(() => anim = true, 50); sliderTimer = setInterval(() => { current = current + 1 >= <?php echo e($heroBannerlar->count()); ?> ? 0 : current + 1 }, 5000); $watch('current', () => { anim = false; $nextTick(() => anim = true) })">
        <?php $__currentLoopData = $heroBannerlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div x-show="current === <?php echo e($i); ?>" x-transition:enter="transition-all duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" style="<?php echo e($i > 0 ? 'display:none' : ''); ?>">
                <div class="relative h-[300px] md:h-[450px] flex items-center">
                    <img src="<?php echo e(asset('storage/banner/' . $banner->foto)); ?>" class="absolute inset-0 w-full h-full object-cover" alt="<?php echo e($banner->baslik); ?>">
                    <div class="absolute inset-0 bg-gradient-to-r from-dark-950/80 via-dark-950/40 to-transparent"></div>
                    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-xl">
                            <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mb-3 transition-all duration-700 ease-out" :class="anim ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'" style="transition-delay:0.1s"><?php echo e($banner->baslik); ?></h2>
                            <?php if($banner->alt_baslik): ?><p class="text-lg text-gold-300 font-serif italic mb-6 transition-all duration-700 ease-out" :class="anim ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'" style="transition-delay:0.3s"><?php echo e($banner->alt_baslik); ?></p><?php endif; ?>
                            <?php if($banner->link): ?><a href="<?php echo e($banner->link); ?>" class="btn-gold text-sm transition-all duration-700 ease-out" :class="anim ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'" style="transition-delay:0.5s">İncele <i class="fas fa-arrow-right ml-1"></i></a><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($heroBannerlar->count() > 1): ?>
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20">
            <?php $__currentLoopData = $heroBannerlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button @click="clearInterval(sliderTimer); current = <?php echo e($i); ?>; sliderTimer = setInterval(() => { current = current + 1 >= <?php echo e($heroBannerlar->count()); ?> ? 0 : current + 1 }, 5000)" class="w-2.5 h-2.5 rounded-full transition-all" :class="current === <?php echo e($i); ?> ? 'bg-gold-500 w-8' : 'bg-white/40 hover:bg-white/70'"></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

</section>


<section class="bg-cream-100/50 border-y border-gold-100/30 py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-center gap-6 md:gap-14 text-xs uppercase tracking-widest">
            <div class="flex items-center gap-2.5 text-dark-500"><i class="fas fa-shield-alt text-gold-500"></i> <span class="font-semibold text-dark-700">Güvenli Alışveriş</span></div>
            <div class="w-px h-4 bg-gold-200/50 hidden md:block"></div>
            <div class="flex items-center gap-2.5 text-dark-500"><i class="fas fa-star text-gold-500"></i> <span class="font-semibold text-dark-700">%100 Özgün</span></div>
            <div class="w-px h-4 bg-gold-200/50 hidden md:block"></div>
            <div class="flex items-center gap-2.5 text-dark-500"><i class="fas fa-truck text-gold-500"></i> <span class="font-semibold text-dark-700">Ücretsiz Kargo</span></div>
            <div class="w-px h-4 bg-gold-200/50 hidden md:block"></div>
            <div class="flex items-center gap-2.5 text-dark-500"><i class="fas fa-heart text-gold-500"></i> <span class="font-semibold text-dark-700">Müşteri Memnuniyeti</span></div>
        </div>
    </div>
</section>


<section class="py-20 md:py-28 relative overflow-hidden" style="background:linear-gradient(180deg,#0f0c1a 0%,#0c0a14 30%,#0a0812 60%,#0f0c1a 100%)">
    
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
    
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/20 to-transparent"></div>
    
    <div class="absolute top-0 left-0 right-0 h-32 pointer-events-none" style="background:linear-gradient(to bottom, rgba(255,255,255,0.04), transparent)"></div>
    
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] pointer-events-none" style="background:radial-gradient(ellipse, rgba(212,168,83,0.06), transparent 70%)"></div>
    
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-[200px] pointer-events-none" style="background:radial-gradient(ellipse, rgba(212,168,83,0.03), transparent 70%)"></div>
    
    <div class="absolute top-1/4 left-0 w-[200px] h-[200px] pointer-events-none" style="background:radial-gradient(circle, rgba(212,168,83,0.03), transparent 70%)"></div>
    <div class="absolute top-3/4 right-0 w-[200px] h-[200px] pointer-events-none" style="background:radial-gradient(circle, rgba(212,168,83,0.02), transparent 70%)"></div>
    
    <div class="absolute inset-0 opacity-[0.015] pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cdefs%3E%3Cpattern id=\'dot\' x=\'0\' y=\'0\' width=\'20\' height=\'20\' patternUnits=\'userSpaceOnUse\'%3E%3Ccircle fill=\'%23d4a853\' cx=\'10\' cy=\'10\' r=\'0.5\'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width=\'100\' height=\'100\' fill=\'url(%23dot)\'/%3E%3C/svg%3E')"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 reveal">
            <div class="flex items-center justify-center gap-4 mb-5">
                <span class="w-12 h-px bg-gradient-to-r from-transparent via-gold-500/50 to-transparent"></span>
                <span class="text-gold-300 text-[13px] tracking-[0.35em] uppercase font-sans font-semibold" style="text-shadow:0 0 30px rgba(212,168,83,0.2)">✦ Kategoriler ✦</span>
                <span class="w-12 h-px bg-gradient-to-r from-transparent via-gold-500/50 to-transparent"></span>
            </div>
            <h2 class="text-5xl md:text-6xl font-serif font-bold leading-tight" style="background:linear-gradient(135deg,#fff8e7 0%,#f5d68a 40%,#f0c860 70%,#e8b840 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;filter:drop-shadow(0 3px 20px rgba(212,168,83,0.15))">Popüler Kategoriler</h2>
            <div class="flex items-center justify-center gap-3 mt-7 mb-4">
                <span class="w-16 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></span>
                <span class="text-gold-400/70 text-sm font-serif">◈</span>
                <span class="w-16 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></span>
            </div>
            <p class="font-serif italic text-xl md:text-2xl max-w-2xl mx-auto font-medium" style="color:rgba(245,235,220,0.8);text-shadow:0 1px 12px rgba(0,0,0,0.3)">İhtiyacına uygun kategorileri keşfet</p>
        </div>

        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] md:w-[900px] h-[300px] md:h-[400px] pointer-events-none" style="background:radial-gradient(ellipse, rgba(212,168,83,0.12), transparent 60%)"></div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 md:gap-6 relative z-20">
            <?php $__currentLoopData = $kategoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $colors = [
                    ['bg'=>'#b45309','accent'=>'#fcd34d'],
                    ['bg'=>'#92400e','accent'=>'#fbbf24'],
                    ['bg'=>'#78350f','accent'=>'#f59e0b'],
                    ['bg'=>'#a16207','accent'=>'#fde047'],
                    ['bg'=>'#854d0e','accent'=>'#facc15'],
                    ['bg'=>'#713f12','accent'=>'#eab308'],
                    ['bg'=>'#975a16','accent'=>'#fef08a'],
                    ['bg'=>'#573c16','accent'=>'#d97706'],
                ];
                $c = $colors[$loop->index % count($colors)];
            ?>
            <div class="group relative reveal" style="transition-delay: <?php echo e($loop->index * 0.08); ?>s">
                <a href="<?php echo e(route('category', $kategori->slug)); ?>"
                   class="block relative rounded-xl p-6 pt-16 text-center border border-white/10 hover:border-gold-400/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-500/20 overflow-hidden"
                   style="background-color: <?php echo e($c['bg']); ?>;">

                    
                    <div class="absolute top-[1px] left-0 right-0 h-4 z-20 pointer-events-none rounded-b-lg shadow-sm" style="background-color: <?php echo e($c['accent']); ?>;"></div>

                    
                    <div class="absolute top-0 left-4 w-5 h-full z-20 pointer-events-none group-hover:opacity-80 transition-opacity duration-300" style="background-color: <?php echo e($c['accent']); ?>;"></div>

                    
                    <div class="relative z-10 mt-6">
                        <div class="mx-auto flex items-center justify-center mb-4">
                            <?php if($kategori->ikon): ?>
                                <i class="<?php echo e($kategori->ikon); ?> text-3xl text-white group-hover:text-gold-200 group-hover:scale-110 transition-all duration-500"></i>
                            <?php else: ?>
                                <i class="fas fa-gift text-3xl text-white"></i>
                            <?php endif; ?>
                        </div>
                        <h3 class="font-serif font-semibold text-white group-hover:text-gold-200 transition-colors duration-400 text-xl md:text-2xl"><?php echo e($kategori->kategori_adi); ?></h3>
                        <div class="w-8 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent mx-auto mt-3 mb-2 transition-all duration-400 group-hover:w-12"></div>
                        <span class="inline-block text-sm text-gold-300 font-sans tracking-wide bg-gold-500/15 px-3 py-1 rounded-full group-hover:bg-gold-500/30 group-hover:text-gold-200 transition-all duration-400"><?php echo e($kategori->urunler_count ?? 0); ?> ürün</span>
                    </div>
                </a>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php if($yeniUrunler->count() > 0): ?>
<section class="py-20 md:py-28 bg-cream-100/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16 reveal">
            <div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Son Eklenenler</span>
                <div class="gold-line mt-2 mb-4"></div>
                <h2 class="section-title">Yeni Ürünler</h2>
                <p class="section-subtitle">En yeni tasarımları keşfedin</p>
            </div>
            <a href="<?php echo e(route('products')); ?>" class="btn-outline-gold shrink-0">Tümünü Gör <i class="fas fa-arrow-right ml-1"></i></a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
            <?php $__currentLoopData = $yeniUrunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="reveal" style="transition-delay: <?php echo e($loop->index * 0.1); ?>s">
                    <?php if (isset($component)) { $__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.urun-card','data' => ['urun' => $urun,'favoriIds' => $favoriIds ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('urun-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['urun' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($urun),'favoriIds' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($favoriIds ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689)): ?>
<?php $attributes = $__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689; ?>
<?php unset($__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689)): ?>
<?php $component = $__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689; ?>
<?php unset($__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689); ?>
<?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if(isset($betweenBannerlar) && $betweenBannerlar->count() > 0): ?>
<section class="bg-cream-100/50 border-y border-gold-100/30 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-<?php echo e(min($betweenBannerlar->count(), 3)); ?> gap-5">
            <?php $__currentLoopData = $betweenBannerlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($banner->link ?: '#'); ?>" class="group relative overflow-hidden rounded-xl h-48 block <?php echo e($banner->link ? 'cursor-pointer' : 'cursor-default'); ?>">
                    <img src="<?php echo e(asset('storage/banner/' . $banner->foto)); ?>" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" alt="<?php echo e($banner->baslik); ?>" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-950/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h3 class="text-white font-serif font-bold text-lg"><?php echo e($banner->baslik); ?></h3>
                        <?php if($banner->alt_baslik): ?><p class="text-gold-300 text-sm"><?php echo e($banner->alt_baslik); ?></p><?php endif; ?>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="relative py-24 overflow-hidden bg-dark-950">
    <div class="absolute inset-0 bg-luxury-pattern opacity-20"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
    <div class="section-shape" style="width:600px;height:600px;background:radial-gradient(circle,rgba(212,168,83,0.05),transparent);top:50%;left:50%;transform:translate(-50%,-50%);--shape-dur:18s"></div>
    <div class="particle" style="--p-x:20%;--p-y:30%;--p-dur:8s;--p-delay:0s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:80%;--p-y:60%;--p-dur:9s;--p-delay:1s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:50%;--p-y:80%;--p-dur:7s;--p-delay:0.5s;--p-size:3px"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 reveal">
            <div class="text-center p-8 rounded-xl bg-white/[0.02] border border-white/[0.06] stat-glow">
                <p class="text-4xl md:text-5xl font-serif font-bold text-white counter-value" data-target="<?php echo e($toplamUrun); ?>">0</p>
                <div class="w-8 h-0.5 bg-gold-500/60 mx-auto my-3"></div>
                <p class="text-sm text-dark-400 font-sans tracking-wider uppercase">Ürün</p>
            </div>
            <div class="text-center p-8 rounded-xl bg-white/[0.02] border border-white/[0.06] stat-glow">
                <p class="text-4xl md:text-5xl font-serif font-bold text-white counter-value" data-target="<?php echo e($toplamMagaza); ?>">0</p>
                <div class="w-8 h-0.5 bg-gold-500/60 mx-auto my-3"></div>
                <p class="text-sm text-dark-400 font-sans tracking-wider uppercase">Mağaza</p>
            </div>
            <div class="text-center p-8 rounded-xl bg-white/[0.02] border border-white/[0.06] stat-glow">
                <p class="text-4xl md:text-5xl font-serif font-bold text-white counter-value" data-target="<?php echo e($toplamMusteri); ?>">0</p>
                <div class="w-8 h-0.5 bg-gold-500/60 mx-auto my-3"></div>
                <p class="text-sm text-dark-400 font-sans tracking-wider uppercase">Müşteri</p>
            </div>
            <div class="text-center p-8 rounded-xl bg-white/[0.02] border border-white/[0.06] stat-glow">
                <p class="text-4xl md:text-5xl font-serif font-bold text-white"><span class="counter-value" data-target="<?php echo e($memnuniyet); ?>">0</span>%</p>
                <div class="w-8 h-0.5 bg-gold-500/60 mx-auto my-3"></div>
                <p class="text-sm text-dark-400 font-sans tracking-wider uppercase">Memnuniyet</p>
            </div>
        </div>
    </div>
</section>


<?php if($magazalar->count() > 0): ?>
<section class="py-20 md:py-28 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16 reveal">
            <div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Mağazalar</span>
                <div class="gold-line mt-2 mb-4"></div>
                <h2 class="section-title">Öne Çıkan Mağazalar</h2>
                <p class="section-subtitle">En özel ürünler, en özel mağazalardan</p>
            </div>
            <a href="<?php echo e(route('magazalar')); ?>" class="btn-outline-gold shrink-0">Tüm Mağazalar <i class="fas fa-arrow-right ml-1"></i></a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6">
            <?php $__currentLoopData = $magazalar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $magaza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('magaza.detail', $magaza->slug)); ?>" class="group relative bg-white rounded-2xl overflow-hidden card-shine block transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-500/20 reveal">
                    <div class="relative h-28 overflow-hidden bg-gradient-to-br from-gold-200 to-cream-300">
                         <?php if($magaza->banner): ?>
                             <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->banner, 400, 200)); ?>"
                                  class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                                  alt=""
                                  loading="lazy"
                                  decoding="async"
                                  width="400"
                                  height="200">
                         <?php else: ?>
                             <img src="<?php echo e(\App\Services\MagazaGorselService::getBannerUrl($magaza->magaza_adi, $magaza->slogan, 400, 200)); ?>"
                                  class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                                  alt=""
                                  loading="lazy"
                                  width="400"
                                  height="200">
                         <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-white via-white/60 to-transparent"></div>
                        <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 z-10">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden border-[3px] border-white shadow-lg shadow-gold-500/10 bg-gradient-to-br from-gold-50 to-cream-100 transition-all duration-500 group-hover:shadow-xl group-hover:shadow-gold-500/20 group-hover:border-gold-200 group-hover:-translate-y-1">
                                 <?php if($magaza->logo): ?>
                                     <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->logo, 80, 80)); ?>"
                                          class="w-full h-full object-cover"
                                          alt="<?php echo e($magaza->magaza_adi); ?>"
                                          loading="lazy"
                                          decoding="async"
                                          width="80"
                                          height="80">
                                 <?php else: ?>
                                     <img src="<?php echo e(\App\Services\MagazaGorselService::getLogoUrl($magaza->magaza_adi, 80)); ?>"
                                          class="w-full h-full object-cover"
                                          alt="<?php echo e($magaza->magaza_adi); ?>"
                                          loading="lazy"
                                          width="80"
                                          height="80">
                                 <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10 pb-4 px-4 text-center">
                        <h3 class="font-serif font-semibold text-dark-900 text-sm group-hover:text-gold-600 transition-colors"><?php echo e($magaza->magaza_adi); ?></h3>
                        <?php if($magaza->slogan): ?>
                            <p class="text-xs text-dark-600 mt-1 font-medium font-sans line-clamp-1">"<?php echo e($magaza->slogan); ?>"</p>
                        <?php else: ?>
                            <p class="text-xs text-dark-600 mt-1 font-medium font-sans line-clamp-1">"Biz ki&#351;iye &#246;zel &#252;r&#252;nler tasarlan&#305;yoruz"</p>
                        <?php endif; ?>
                        <?php if($magaza->sehir): ?>
                            <p class="text-[11px] text-dark-400 mt-2"><i class="fas fa-map-marker-alt text-gold-400 mr-1"></i><?php echo e($magaza->sehir); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-gold-500 to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="relative py-28 overflow-hidden bg-dark-950 noise-overlay">
    <div class="gradient-mesh absolute inset-0"></div>
    <div class="absolute inset-0 bg-luxury-pattern opacity-20"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
    <div class="particle" style="--p-x:30%;--p-y:20%;--p-dur:8s;--p-delay:0s;--p-size:3px"></div>
    <div class="particle" style="--p-x:70%;--p-y:60%;--p-dur:9s;--p-delay:1.5s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:50%;--p-y:80%;--p-dur:7s;--p-delay:0.8s;--p-size:3px"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
        <div class="w-16 h-16 mx-auto bg-gold-500/10 rounded-2xl flex items-center justify-center mb-6 backdrop-blur-sm border border-gold-500/20">
            <i class="fas fa-store text-2xl text-gold-400"></i>
        </div>
        <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4 leading-tight">Sen de <span class="gradient-text">Mağazanı Aç!</span></h2>
        <p class="text-lg text-dark-400 max-w-lg mx-auto mb-10 leading-relaxed font-sans">Kendi ürünlerini sat, hayalini kurduğun mağazayı kur. Milyonlarca müşteriye ulaş, işinin patronu ol.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?php echo e(route('satici-basvuru')); ?>" class="btn-gold"><i class="fas fa-store"></i> Hemen Başvur</a>
            <a href="<?php echo e(route('magazalar')); ?>" class="btn-outline-gold">Mağazaları Keşfet</a>
        </div>
    </div>
</section>


<section class="py-20 md:py-28 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Neden Biz</span>
            <div class="section-divider mt-3 mb-5"></div>
            <h2 class="section-title">Neden <span class="gradient-text">kişiyeözel</span>?</h2>
            <p class="section-subtitle mx-auto">Size en iyi deneyimi sunmak için buradayız</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 md:gap-8">
            <div class="luxury-card p-8 md:p-10 reveal card-shine">
                <div class="w-14 h-14 bg-gold-50 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-500 group-hover:scale-110">
                    <i class="fas fa-shield-alt text-xl text-gold-500"></i>
                </div>
                <h3 class="text-xl font-serif font-bold text-dark-900 mb-3">Güvenli Alışveriş</h3>
                <p class="text-dark-400 text-sm leading-relaxed font-sans">256-bit SSL sertifikası ile güvenli ödeme. Bilgileriniz şifrelenir ve üçüncü taraflarla paylaşılmaz.</p>
            </div>
            <div class="luxury-card p-8 md:p-10 reveal card-shine" style="transition-delay:0.1s">
                <div class="w-14 h-14 bg-gold-50 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-truck text-xl text-gold-500"></i>
                </div>
                <h3 class="text-xl font-serif font-bold text-dark-900 mb-3">Hızlı Teslimat</h3>
                <p class="text-dark-400 text-sm leading-relaxed font-sans">3-5 iş günü içinde kargoda. 500₺ üzeri alışverişlerde kargo ücretsiz.</p>
            </div>
            <div class="luxury-card p-8 md:p-10 reveal card-shine" style="transition-delay:0.2s">
                <div class="w-14 h-14 bg-gold-50 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-paint-brush text-xl text-gold-500"></i>
                </div>
                <h3 class="text-xl font-serif font-bold text-dark-900 mb-3">Kişiye Özel</h3>
                <p class="text-dark-400 text-sm leading-relaxed font-sans">Her ürün size özel hazırlanır. Adınız, fotoğrafınız ve özel mesajınızla kişiselleştirin.</p>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter-value');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.dataset.counted) {
                entry.target.dataset.counted = 'true';
                const target = parseInt(entry.target.dataset.target);
                const duration = 2500;
                const step = Math.ceil(target / (duration / 16));
                let current = 0;
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    entry.target.textContent = current.toLocaleString();
                }, 16);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => observer.observe(c));
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/home.blade.php ENDPATH**/ ?>