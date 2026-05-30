
<?php $__env->startSection('title', 'Mağazalar'); ?>
<?php $__env->startSection('meta_desc', 'En özel ürünler, en özel mağazalardan – Kisiyeozel.org mağazalarını keşfedin'); ?>

<?php $__env->startSection('content'); ?>
<section class="relative overflow-hidden bg-gradient-to-br from-dark-950 via-dark-900 to-gold-950 noise-overlay min-h-[50vh] flex items-center">
    <div class="gradient-mesh absolute inset-0 opacity-60"></div>
    <div class="absolute inset-0 bg-luxury-pattern opacity-10"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="section-shape" style="width:600px;height:600px;background:radial-gradient(circle,rgba(212,168,83,0.08),transparent);top:-20%;right:-5%;--shape-dur:14s"></div>
    <div class="section-shape" style="width:450px;height:450px;background:radial-gradient(circle,rgba(212,168,83,0.06),transparent);bottom:-20%;left:-5%;--shape-dur:16s;--shape-delay:2s"></div>
    <div class="particle" style="--p-x:15%;--p-y:25%;--p-size:4px;--p-dur:9s;--p-delay:0s"></div>
    <div class="particle" style="--p-x:85%;--p-y:35%;--p-size:3px;--p-dur:11s;--p-delay:1s"></div>
    <div class="particle" style="--p-x:50%;--p-y:75%;--p-size:5px;--p-dur:10s;--p-delay:2s"></div>
    <div class="particle" style="--p-x:20%;--p-y:65%;--p-size:3px;--p-dur:12s;--p-delay:0.5s"></div>
    <div class="particle" style="--p-x:75%;--p-y:85%;--p-size:4px;--p-dur:8s;--p-delay:1.5s"></div>
    <div class="particle" style="--p-x:40%;--p-y:15%;--p-size:6px;--p-dur:13s;--p-delay:3s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 text-center w-full">
        <div class="reveal-scale">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-gold-500/20 to-gold-300/5 border border-gold-500/20 shadow-lg shadow-gold-500/10 mb-6 animate-float">
                <i class="fas fa-store text-2xl text-gold-400"></i>
            </div>
            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold-500/10 text-gold-300 text-xs rounded-full border border-gold-500/20 font-medium tracking-wider uppercase mb-5">✦ Keşfet</span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-white leading-[1.1] mb-5">
                <span class="gradient-text">Mağazalar</span>
            </h1>
            <div class="w-20 h-0.5 bg-gradient-to-r from-transparent via-gold-500 to-transparent mx-auto mb-5"></div>
            <p class="text-lg md:text-xl text-dark-400 max-w-2xl mx-auto leading-relaxed">En özel ürünler, en özel mağazalardan. <span class="text-gold-400 font-medium">Size özel</span> tasarımlar için doğru adres.</p>
        </div>
    </div>
</section>

<div class="bg-gradient-to-b from-cream-50 to-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-20">
        <?php if($magazalar->count() > 0): ?>
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12 reveal">
                <div>
                    <span class="text-gold-500 text-xs tracking-[0.2em] uppercase font-sans font-medium">Premium Mağazalar</span>
                    <div class="gold-line mt-2 mb-3"></div>
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-dark-900">Tüm Mağazalar</h2>
                </div>
                <p class="text-dark-400 text-sm shrink-0 bg-white/80 backdrop-blur-sm px-5 py-2 rounded-full border border-dark-100/50 shadow-sm flex items-center gap-2">
                    <i class="fas fa-store text-gold-400"></i>
                    <span><strong class="text-dark-800"><?php echo e($magazalar->total()); ?></strong> mağaza</span>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-8">
                <?php $__currentLoopData = $magazalar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $magaza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('magaza.detail', $magaza->slug)); ?>" class="group relative bg-white rounded-2xl overflow-hidden card-shine block transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-500/20 reveal-scale" style="transition-delay: <?php echo e($loop->index * 0.06); ?>s">
                        <div class="relative h-48 md:h-56 overflow-hidden bg-gradient-to-br from-gold-200 to-cream-300">
                            <?php if($magaza->banner): ?>
                                <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->banner, 600, 300)); ?>"
                                     srcset="<?php echo e(\App\Services\ImageService::getSrcset($magaza->banner, [400, 600, 900])); ?>"
                                     sizes="(max-width: 640px) 400w, (max-width: 1024px) 600w, 900w"
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                                     alt=""
                                     loading="lazy"
                                     decoding="async"
                                     width="600"
                                     height="300">
                            <?php else: ?>
                                <img src="<?php echo e(\App\Services\MagazaGorselService::getBannerUrl($magaza->magaza_adi, $magaza->slogan, 600, 300)); ?>"
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                                     alt=""
                                     loading="lazy"
                                     width="600"
                                     height="300">
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/50 to-transparent"></div>
                            <div class="absolute -bottom-11 left-1/2 -translate-x-1/2 z-10">
                                <div class="w-24 h-24 md:w-28 md:h-28 rounded-2xl overflow-hidden border-[5px] border-white shadow-xl shadow-gold-500/15 bg-gradient-to-br from-gold-50 to-cream-100 transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-gold-500/30 group-hover:border-gold-300 group-hover:-translate-y-2">
                                    <?php if($magaza->logo): ?>
                                        <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->logo, 120, 120)); ?>"
                                             class="w-full h-full object-cover"
                                             alt="<?php echo e($magaza->magaza_adi); ?>"
                                             loading="lazy"
                                             decoding="async"
                                             width="120"
                                             height="120">
                                    <?php else: ?>
                                        <img src="<?php echo e(\App\Services\MagazaGorselService::getLogoUrl($magaza->magaza_adi, 120)); ?>"
                                             class="w-full h-full object-cover"
                                             alt="<?php echo e($magaza->magaza_adi); ?>"
                                             loading="lazy"
                                             width="120"
                                             height="120">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3 z-10">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-white/90 backdrop-blur-sm text-gold-600 text-[10px] rounded-full border border-gold-200/50 shadow-sm font-medium"><i class="fas fa-check-circle text-[9px]"></i>Onaylı</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-6 px-5 md:px-6 text-center">
                            <h3 class="font-serif font-bold text-dark-900 text-xl md:text-2xl group-hover:text-gold-600 transition-colors leading-tight"><?php echo e($magaza->magaza_adi); ?></h3>
                            <?php if($magaza->slogan): ?>
                                <p class="text-base text-dark-600 mt-2 font-medium font-sans line-clamp-1">"<?php echo e($magaza->slogan); ?>"</p>
                            <?php else: ?>
                                <p class="text-base text-dark-600 mt-2 font-medium font-sans line-clamp-1">"Biz ki&#351;iye &#246;zel &#252;r&#252;nler tasarlan&#305;yoruz"</p>
                            <?php endif; ?>
                            <div class="h-px bg-gradient-to-r from-transparent via-gold-200 to-transparent my-4 mx-8"></div>
                            <div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2">
                                <?php if($magaza->sehir): ?>
                                    <span class="flex items-center gap-1.5 text-xs text-dark-400"><i class="fas fa-map-marker-alt text-gold-400"></i><?php echo e($magaza->sehir); ?></span>
                                <?php endif; ?>
                                <span class="flex items-center gap-1.5 text-xs text-dark-400"><i class="fas fa-box text-gold-400"></i><?php echo e($magaza->urunler_count ?? 0); ?> ürün</span>
                            </div>
                            <div class="mt-5 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                <span class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-gold-500 to-gold-400 text-white text-xs font-semibold rounded-full shadow-lg shadow-gold-500/20 hover:shadow-xl hover:shadow-gold-500/30 transition-all">
                                    Mağazayı İncele <i class="fas fa-arrow-right text-[10px]"></i>
                                </span>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-gold-500 to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-14 reveal"><?php echo e($magazalar->links()); ?></div>
        <?php else: ?>
            <div class="text-center py-24 reveal-scale">
                <div class="w-28 h-28 mx-auto bg-gradient-to-br from-gold-50 to-cream-100 rounded-3xl flex items-center justify-center mb-6 shadow-lg shadow-gold-500/10 ring-2 ring-gold-200/50">
                    <i class="fas fa-store text-5xl text-gold-300"></i>
                </div>
                <h3 class="text-3xl font-serif font-semibold text-dark-900 mb-3">Henüz mağaza yok</h3>
                <p class="text-dark-400 text-lg max-w-md mx-auto">Henüz hiçbir mağaza kayıt olmamış. İlk mağaza siz olabilirsiniz!</p>
                <a href="<?php echo e(route('satici.magaza')); ?>" class="btn-gold mt-8 inline-flex"><i class="fas fa-plus mr-2"></i>Mağaza Oluştur</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/magazalar.blade.php ENDPATH**/ ?>