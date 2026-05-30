
<?php $__env->startSection('title', $magaza->magaza_adi); ?>
<?php $__env->startSection('meta_desc', ($magaza->aciklama ?? $magaza->magaza_adi . ' mağazası') . ' – Her Ürün Size Özel'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative overflow-hidden bg-gradient-to-br from-dark-950 via-dark-900 to-gold-950 noise-overlay">
    <?php if($magaza->banner): ?>
        <div class="absolute inset-0">
            <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->banner, 1200, 600)); ?>"
                 class="w-full h-full object-cover opacity-30"
                 alt=""
                 loading="lazy"
                 decoding="async"
                 width="1200"
                 height="600">
            <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-dark-950/80 to-dark-900/60"></div>
        </div>
    <?php else: ?>
        <div class="absolute inset-0">
            <img src="<?php echo e(\App\Services\MagazaGorselService::getBannerUrl($magaza->magaza_adi, $magaza->slogan, 1200, 600)); ?>"
                 class="w-full h-full object-cover opacity-30"
                 alt=""
                 loading="lazy"
                 width="1200"
                 height="600">
            <div class="absolute inset-0 bg-gradient-to-t from-dark-950 via-dark-950/80 to-dark-900/60"></div>
        </div>
    <?php endif; ?>
    <div class="gradient-mesh absolute inset-0 opacity-60"></div>
    <div class="absolute inset-0 bg-luxury-pattern opacity-10"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>
    <div class="section-shape" style="width:500px;height:500px;background:radial-gradient(circle,rgba(212,168,83,0.08),transparent);top:-15%;right:-10%;--shape-dur:14s"></div>
    <div class="section-shape" style="width:400px;height:400px;background:radial-gradient(circle,rgba(212,168,83,0.06),transparent);bottom:-15%;left:-10%;--shape-dur:16s;--shape-delay:2s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8 reveal">
            <div class="w-28 h-28 md:w-36 md:h-36 bg-gradient-to-br from-gold-500/20 to-gold-300/10 rounded-3xl flex items-center justify-center shrink-0 overflow-hidden ring-4 ring-gold-500/20 shadow-2xl shadow-gold-500/20">
                <?php if($magaza->logo): ?>
                    <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->logo, 150, 150)); ?>"
                         class="w-full h-full object-cover"
                         alt="<?php echo e($magaza->magaza_adi); ?>"
                         loading="lazy"
                         decoding="async"
                         width="150"
                         height="150">
                <?php else: ?>
                    <img src="<?php echo e(\App\Services\MagazaGorselService::getLogoUrl($magaza->magaza_adi, 150)); ?>"
                         class="w-full h-full object-cover"
                         alt="<?php echo e($magaza->magaza_adi); ?>"
                         loading="lazy"
                         width="150"
                         height="150">
                <?php endif; ?>
            </div>
            <div class="flex-1 text-center md:text-left">
                <div class="flex flex-col md:flex-row md:items-center gap-3 mb-1">
                    <h1 class="text-3xl md:text-5xl font-serif font-bold text-white leading-tight"><?php echo e($magaza->magaza_adi); ?></h1>
                    <div class="flex items-center justify-center md:justify-start gap-2">
                        <span class="px-3 py-1 bg-gold-500/15 text-gold-300 text-xs rounded-full border border-gold-500/20 font-medium"><i class="fas fa-check-circle mr-1"></i>Onaylı Mağaza</span>
                    </div>
                </div>
                <?php if($magaza->slogan): ?>
                    <p class="text-lg md:text-xl text-gold-300 font-medium font-sans mb-3">"<?php echo e($magaza->slogan); ?>"</p>
                <?php else: ?>
                    <p class="text-lg md:text-xl text-gold-300 font-medium font-sans mb-3">"Biz ki&#351;iye &#246;zel &#252;r&#252;nler tasarlan&#305;yoruz"</p>
                <?php endif; ?>
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 md:gap-6 text-sm text-dark-400 mb-5">
                    <?php if($magaza->sehir): ?>
                        <span class="flex items-center gap-1.5"><i class="fas fa-map-marker-alt text-gold-400"></i><?php echo e($magaza->sehir); ?></span>
                    <?php endif; ?>
                    <span class="flex items-center gap-1.5"><i class="fas fa-box text-gold-400"></i><?php echo e($urunler->total()); ?> ürün</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-calendar-alt text-gold-400"></i><?php echo e($magaza->created_at->diffForHumans()); ?> katıldı</span>
                </div>
                <?php if($magaza->aciklama): ?>
                    <div class="max-w-2xl mx-auto md:mx-0">
                        <p class="text-dark-300 leading-relaxed font-sans text-sm md:text-base border-l-2 border-gold-500/30 pl-4 italic"><?php echo e($magaza->aciklama); ?></p>
                    </div>
                <?php endif; ?>
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mt-6">
                    <a href="#" class="btn-gold !py-2.5 !px-5 text-sm"><i class="fas fa-envelope mr-1.5"></i>Mağazaya Mesaj Gönder</a>
                    <?php if($magaza->website): ?>
                        <a href="<?php echo e($magaza->website); ?>" target="_blank" class="btn-outline-gold !py-2.5 !px-5 text-sm"><i class="fas fa-globe mr-1.5"></i>Web Sitesi</a>
                    <?php endif; ?>
                    <div class="flex items-center gap-2">
                        <a href="https://wa.me/?text=<?php echo e(urlencode($magaza->magaza_adi . ' mağazasını keşfet: ' . request()->url())); ?>" target="_blank" class="w-10 h-10 bg-dark-800 hover:bg-green-600 text-dark-400 hover:text-white rounded-xl flex items-center justify-center transition-all"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(request()->url())); ?>" target="_blank" class="w-10 h-10 bg-dark-800 hover:bg-blue-600 text-dark-400 hover:text-white rounded-xl flex items-center justify-center transition-all"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($magaza->magaza_adi . ' — Her Ürün Size Özel')); ?>&url=<?php echo e(urlencode(request()->url())); ?>" target="_blank" class="w-10 h-10 bg-dark-800 hover:bg-sky-500 text-dark-400 hover:text-white rounded-xl flex items-center justify-center transition-all"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-cream-50 to-transparent"></div>
</section>


<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative -mt-6 z-20 flex items-center justify-center">
        <div class="bg-cream-50 px-8 py-3 rounded-2xl shadow-lg border border-gold-200/50 flex items-center gap-6 text-sm">
            <span class="text-dark-500"><i class="fas fa-check-circle text-gold-500 mr-1.5"></i>Güvenli Mağaza</span>
            <span class="w-px h-4 bg-gold-200"></span>
            <span class="text-dark-500"><i class="fas fa-truck text-gold-500 mr-1.5"></i>Hızlı Kargo</span>
            <span class="w-px h-4 bg-gold-200 hidden sm:block"></span>
            <span class="text-dark-500 hidden sm:inline"><i class="fas fa-undo text-gold-500 mr-1.5"></i>Kolay İade</span>
        </div>
    </div>
</div>


<section class="bg-cream-50 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10 reveal">
            <div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Ürünler</span>
                <div class="gold-line mt-2 mb-3"></div>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-dark-900"><?php echo e($magaza->magaza_adi); ?> Ürünleri</h2>
            </div>
            <a href="<?php echo e(route('magazalar')); ?>" class="btn-outline-gold !py-2 !px-4 text-xs shrink-0"><i class="fas fa-store mr-1"></i>Tüm Mağazalar</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $urunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="reveal card-shine" style="transition-delay: <?php echo e($loop->index * 0.08); ?>s">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full">
                    <div class="luxury-card p-16 text-center">
                        <div class="w-28 h-28 mx-auto bg-gradient-to-br from-gold-50 to-cream-100 rounded-full flex items-center justify-center mb-6 shadow-inner">
                            <i class="fas fa-box-open text-5xl text-gold-300"></i>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-dark-700 mb-2">Henüz Ürün Eklenmemiş</h3>
                        <p class="text-dark-400 text-sm max-w-md mx-auto mb-6">Bu mağazaya henüz ürün eklenmemiş. Yeni ürünler eklendiğinde burada göreceksiniz.</p>
                        <a href="<?php echo e(route('products')); ?>" class="btn-gold !py-2.5 !px-6 text-sm"><i class="fas fa-arrow-right mr-1.5"></i>Diğer Ürünlere Göz At</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if($urunler->hasPages()): ?>
            <div class="mt-12 reveal"><?php echo e($urunler->links()); ?></div>
        <?php endif; ?>
    </div>
</section>


<?php if($magaza->gorseller->count()): ?>
<?php $gorseller = $magaza->gorseller->values(); $gorsellerJson = json_encode($gorseller->toArray()); ?>
<section class="relative py-12 md:py-16 overflow-hidden"
         style="background: linear-gradient(160deg, #fdf8ed 0%, #fcf6e8 30%, #fefcf7 60%, #f9edcc 100%);"
         x-data='{
             items: <?php echo $gorsellerJson; ?>,
             index: -1,
             get current() { return this.items[this.index] },
             get total() { return this.items.length },
             prev() { this.index = (this.index - 1 + this.total) % this.total },
             next() { this.index = (this.index + 1) % this.total },
             open(i) { this.index = i; document.body.style.overflow = "hidden" },
             close() { this.index = -1; document.body.style.overflow = "" }
         }'
         @keydown.left.window="if (index >= 0) prev()"
         @keydown.right.window="if (index >= 0) next()"
         @keydown.escape.window="if (index >= 0) close()">
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-300/40 to-transparent"></div>
    <div class="absolute top-0 right-0 w-96 h-96 pointer-events-none opacity-30" style="background: radial-gradient(circle, rgba(212,168,83,0.15), transparent 70%);"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 pointer-events-none opacity-20" style="background: radial-gradient(circle, rgba(212,168,83,0.12), transparent 70%); transform: translate(-20%, 20%);"></div>
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 reveal">
            <div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Portföy</span>
                <div class="gold-line mt-2 mb-3"></div>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-dark-900"><?php echo e($magaza->magaza_adi); ?> Galerisi</h2>
            </div>
            <div class="flex gap-2 shrink-0">
                <button @click="$refs.scroller.scrollBy({ left: -320, behavior: 'smooth' })"
                        class="w-11 h-11 bg-white border border-dark-200 hover:bg-gradient-to-br hover:from-gold-50 hover:to-gold-100 hover:border-gold-400 text-dark-500 hover:text-gold-600 rounded-xl flex items-center justify-center transition-all shadow-sm hover:shadow-md"><i class="fas fa-chevron-left"></i></button>
                <button @click="$refs.scroller.scrollBy({ left: 320, behavior: 'smooth' })"
                        class="w-11 h-11 bg-white border border-dark-200 hover:bg-gradient-to-br hover:from-gold-50 hover:to-gold-100 hover:border-gold-400 text-dark-500 hover:text-gold-600 rounded-xl flex items-center justify-center transition-all shadow-sm hover:shadow-md"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="relative">
            <div class="absolute left-0 top-0 bottom-0 w-16 z-10 pointer-events-none"
                 style="background: linear-gradient(to right, white 10%, transparent);"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 z-10 pointer-events-none"
                 style="background: linear-gradient(to left, white 10%, transparent);"></div>

            <div x-ref="scroller"
                 class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 pt-2 px-2"
                 style="scrollbar-width: none; -ms-overflow-style: none;">
                <style>.flex.gap-6::-webkit-scrollbar { display: none; }</style>
                <?php $__currentLoopData = $gorseller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $gorsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="snap-start shrink-0 w-48 group cursor-pointer"
                         @click="open(<?php echo e($i); ?>)">
                        <div class="relative rounded-xl overflow-hidden bg-white shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-400 border border-dark-100/50 hover:border-gold-300/60">
                            <div class="absolute top-0 left-0 right-0 h-0.5 z-20"
                                 style="background: linear-gradient(90deg, #d4a853, #f5d77b, #d4a853);"></div>

                            <div class="relative h-36 overflow-hidden bg-gradient-to-br from-dark-50 to-cream-50">
                                <img src="<?php echo e(asset('storage/' . $gorsel->dosya_yolu)); ?>"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                     loading="lazy"
                                     alt="<?php echo e($gorsel->baslik ?? ''); ?>">

                                <div class="absolute inset-0 bg-dark-900/40 opacity-0 group-hover:opacity-100 transition-all duration-400 flex items-center justify-center">
                                    <div class="w-10 h-10 bg-white/90 rounded-xl flex items-center justify-center text-dark-700 shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-400">
                                        <i class="fas fa-expand text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="px-3.5 py-2.5">
                                <?php if($gorsel->baslik): ?>
                                    <p class="text-xs font-medium text-dark-700 truncate"><?php echo e($gorsel->baslik); ?></p>
                                <?php else: ?>
                                    <p class="text-xs text-dark-400 truncate"><?php echo e($magaza->magaza_adi); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="flex items-center justify-center gap-2 mt-6">
                <?php $__currentLoopData = $gorseller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $gorsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button @click="$refs.scroller.children[<?php echo e($i); ?>].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' })"
                            class="rounded-full transition-all duration-400 <?php echo e($i === 0 ? 'bg-gold-500 w-8 h-2.5' : 'bg-dark-200 hover:bg-gold-400 w-2.5 h-2.5'); ?>"></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div x-show="index >= 0" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center"
         style="background: rgba(0,0,0,0.92); backdrop-filter: blur(4px);"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         @click="close()">

        <div class="relative max-w-4xl w-full mx-4" @click.stop>
            <div class="flex items-center justify-between px-5 py-3 mb-3 rounded-xl"
                 style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg overflow-hidden bg-gold-500/20 flex items-center justify-center shrink-0">
                        <?php if($magaza->logo): ?>
                            <img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->logo, 40, 40)); ?>" class="w-full h-full object-cover" alt="">
                        <?php else: ?>
                            <i class="fas fa-store text-gold-400 text-sm"></i>
                        <?php endif; ?>
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold"><?php echo e($magaza->magaza_adi); ?></p>
                        <p class="text-white/50 text-xs" x-text="(index + 1) + ' / ' + total"></p>
                    </div>
                </div>
                <button @click="close()" class="w-10 h-10 hover:bg-white/10 text-white/70 hover:text-white rounded-xl flex items-center justify-center transition"><i class="fas fa-times text-lg"></i></button>
            </div>

            <div class="relative flex items-center justify-center">
                <button @click="prev()" class="absolute left-0 z-10 -translate-x-3 w-10 h-10 bg-white/10 hover:bg-white/25 text-white rounded-full flex items-center justify-center transition shadow-lg backdrop-blur-sm"><i class="fas fa-chevron-left"></i></button>

                <div class="flex flex-col items-center w-full">
                    <div class="w-full rounded-xl overflow-hidden shadow-2xl"
                         style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                        <img :src="current.dosya_yolu ? '/storage/' + current.dosya_yolu : ''"
                             class="w-full max-h-[55vh] object-contain mx-auto"
                             alt="">
                    </div>
                    <p class="mt-4 text-white/70 text-sm font-medium text-center max-w-lg" x-text="current.baslik || ''" x-show="current.baslik"></p>
                </div>

                <button @click="next()" class="absolute right-0 z-10 translate-x-3 w-10 h-10 bg-white/10 hover:bg-white/25 text-white rounded-full flex items-center justify-center transition shadow-lg backdrop-blur-sm"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/magaza-detail.blade.php ENDPATH**/ ?>