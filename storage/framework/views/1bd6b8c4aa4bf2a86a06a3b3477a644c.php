<?php $__env->startSection('title', 'Ürünler'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-cream-100/50 border-b border-gold-100/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center gap-4 mb-2">
            <div class="gold-line"></div>
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Koleksiyon</span>
        </div>
        <h1 class="section-title">Tüm Ürünler</h1>
        <p class="section-subtitle"><?php echo e($urunler->total()); ?> ürün bulundu</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-10">
        
        <aside class="lg:w-64 shrink-0">
            <div class="luxury-card p-6 sticky top-24">
                <h3 class="font-serif font-semibold text-dark-900 mb-5 flex items-center gap-2"><i class="fas fa-filter text-gold-500"></i>Filtrele</h3>

                <div class="mb-7">
                    <h4 class="text-xs font-sans font-semibold text-dark-500 uppercase tracking-wider mb-3">Kategoriler</h4>
                    <div class="space-y-2">
                        <a href="<?php echo e(route('products')); ?>" class="block text-sm <?php echo e(!request('kategori') ? 'text-gold-600 font-semibold' : 'text-dark-500 hover:text-gold-600'); ?> transition font-sans flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full <?php echo e(!request('kategori') ? 'bg-gold-500' : 'bg-dark-300'); ?>"></span>Tümü
                        </a>
                        <?php $__currentLoopData = $kategoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('products', ['kategori' => $kategori->id])); ?>" class="block text-sm <?php echo e(request('kategori') == $kategori->id ? 'text-gold-600 font-semibold' : 'text-dark-500 hover:text-gold-600'); ?> transition font-sans flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full <?php echo e(request('kategori') == $kategori->id ? 'bg-gold-500' : 'bg-dark-300'); ?>"></span><?php echo e($kategori->kategori_adi); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-sans font-semibold text-dark-500 uppercase tracking-wider mb-3">Sıralama</h4>
                    <div class="space-y-2">
                        <?php $__currentLoopData = ['yeni' => 'En Yeni', 'artan' => 'Fiyat (Artan)', 'azalan' => 'Fiyat (Azalan)', 'cok_satan' => 'Çok Satanlar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('products', ['siralama' => $key])); ?>" class="block text-sm <?php echo e(request('siralama') == $key ? 'text-gold-600 font-semibold' : 'text-dark-500 hover:text-gold-600'); ?> transition font-sans flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full <?php echo e(request('siralama') == $key ? 'bg-gold-500' : 'bg-dark-300'); ?>"></span><?php echo e($label); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </aside>

        
        <div class="flex-1">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-5 md:gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $urunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-20">
                        <div class="w-20 h-20 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-5"><i class="fas fa-box-open text-3xl text-dark-300"></i></div>
                        <p class="text-dark-400 font-medium font-sans">Henüz ürün bulunamadı.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-12"><?php echo e($urunler->links()); ?></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/products.blade.php ENDPATH**/ ?>