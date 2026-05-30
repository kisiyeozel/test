 <?php $__env->startSection('title', 'Mesajlar'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">İletişim Mesajları</h2></div>
    <div class="divide-y">
        <?php $__empty_1 = true; $__currentLoopData = $mesajlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mesaj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="p-6 <?php echo e(!$mesaj->okundu_mu ? 'bg-orange-50' : ''); ?>">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="font-medium text-gray-900"><?php echo e($mesaj->ad_soyad); ?></span>
                        <span class="text-sm text-gray-500 ml-2"><?php echo e($mesaj->email); ?></span>
                        <?php if($mesaj->telefon): ?><span class="text-sm text-gray-400 ml-2"><?php echo e($mesaj->telefon); ?></span><?php endif; ?>
                    </div>
                    <span class="text-xs text-gray-400"><?php echo e($mesaj->created_at->format('d.m.Y H:i')); ?></span>
                </div>
                <p class="text-sm font-medium text-gray-700 mb-1"><?php echo e($mesaj->konu); ?></p>
                <p class="text-sm text-gray-600"><?php echo e($mesaj->mesaj); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="p-6 text-center text-gray-500">Henüz mesaj yok.</div>
        <?php endif; ?>
    </div>
    <div class="mt-4"><?php echo e($mesajlar->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/mesajlar.blade.php ENDPATH**/ ?>