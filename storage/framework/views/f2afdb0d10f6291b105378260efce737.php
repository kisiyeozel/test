 <?php $__env->startSection('title', 'Yorumlar'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Yorum Yönetimi</h2></div>
    <div class="divide-y">
        <?php $__currentLoopData = $yorumlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-6 flex items-start gap-4">
                <div class="w-10 h-10 rounded-full overflow-hidden shrink-0<?php echo e($yorum->kullanici->avatar ? '' : ' bg-orange-100 flex items-center justify-center text-orange-600 font-semibold'); ?>">
                    <?php if($yorum->kullanici->avatar): ?>
                        <img src="<?php echo e(asset('img/'.$yorum->kullanici->avatar)); ?>" alt="" class="w-full h-full object-cover">
                    <?php else: ?>
                        <?php echo e($yorum->kullanici->ad_soyad[0] ?? '?'); ?>

                    <?php endif; ?>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="font-medium text-gray-900"><?php echo e($yorum->kullanici->ad_soyad ?? '?'); ?></span>
                        <div class="flex text-yellow-400 text-xs"><?php for($i=1;$i<=5;$i++): ?><i class="fas fa-star<?php echo e($i<=$yorum->puan?'':'-o'); ?>"></i><?php endfor; ?></div>
                        <span class="text-xs text-gray-400"><?php echo e($yorum->created_at->diffForHumans()); ?></span>
                    </div>
                    <p class="text-sm text-gray-600 mb-1"><?php echo e($yorum->yorum); ?></p>
                    <p class="text-xs text-gray-400">Ürün: <?php echo e($yorum->urun->urun_adi ?? '-'); ?></p>
                </div>
                <div class="flex gap-2 shrink-0">
                    <?php if($yorum->durum == 'beklemede'): ?>
                        <a href="<?php echo e(route('admin.yorum-onayla', $yorum->id)); ?>" class="px-3 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600">Onayla</a>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.yorum-sil', $yorum->id)); ?>" method="POST" onsubmit="return confirm('Emin misiniz?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">Sil</button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="mt-4"><?php echo e($yorumlar->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/yorumlar.blade.php ENDPATH**/ ?>