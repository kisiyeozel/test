 <?php $__env->startSection('title', 'Raporlar'); ?> <?php $__env->startSection('page_title', 'Satış Raporları'); ?>
<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
    <div class="luxury-card p-6">
        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mb-3"><i class="fas fa-money-bill-wave text-green-600"></i></div>
        <p class="text-sm text-dark-400">Toplam Kazanç</p>
        <p class="text-2xl font-bold text-green-600 mt-1"><?php echo e(number_format($toplamKazanc, 2)); ?> ₺</p>
    </div>
    <div class="luxury-card p-6">
        <div class="w-10 h-10 bg-gold-100 rounded-xl flex items-center justify-center mb-3"><i class="fas fa-shopping-bag text-gold-600"></i></div>
        <p class="text-sm text-dark-400">Toplam Sipariş</p>
        <p class="text-2xl font-bold text-dark-900 mt-1"><?php echo e($siparisler->count()); ?></p>
    </div>
</div>

<div class="luxury-card overflow-hidden">
    <div class="p-5 border-b border-cream-100 flex items-center gap-2">
        <i class="fas fa-chart-bar text-gold-500"></i>
        <h3 class="font-semibold text-dark-900">Aylık Satışlar</h3>
    </div>
    <div class="divide-y divide-cream-100">
        <?php $__empty_1 = true; $__currentLoopData = $aylikSatis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $satis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="px-5 py-4 flex items-center justify-between hover:bg-cream-50 transition">
                <span class="text-sm font-medium text-dark-800"><?php echo e($satis->ay); ?>.<?php echo e($satis->yil); ?></span>
                <span class="font-bold text-green-600"><?php echo e(number_format($satis->toplam, 2)); ?> ₺</span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="px-5 py-12 text-center text-dark-400">
                <i class="fas fa-chart-line text-3xl text-dark-200 mb-3"></i>
                <p>Henüz satış verisi yok.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/raporlar.blade.php ENDPATH**/ ?>