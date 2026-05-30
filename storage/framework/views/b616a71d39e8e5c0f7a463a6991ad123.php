<?php $__env->startSection('title', 'Ürün Soruları'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Ürün Soruları</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 text-sm"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($sorular->count() > 0): ?>
        <div class="space-y-4">
            <?php $__currentLoopData = $sorular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl border p-5 <?php echo e($soru->durum == 'beklemede' ? 'border-l-4 border-l-orange-400' : ''); ?>">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="font-medium text-gray-900"><?php echo e($soru->musteri_adi); ?></p>
                            <p class="text-xs text-gray-500"><?php echo e($soru->created_at->diffForHumans()); ?> — <a href="<?php echo e(route('product.detail', $soru->urun->slug)); ?>" class="text-orange-600 hover:underline"><?php echo e($soru->urun->urun_adi); ?></a></p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full <?php echo e($soru->durum == 'yayinda' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700'); ?>"><?php echo e($soru->durum); ?></span>
                    </div>
                    <p class="text-gray-700 text-sm mb-4 bg-gray-50 rounded-lg p-3"><?php echo e($soru->soru); ?></p>

                    <?php if($soru->cevap): ?>
                        <div class="bg-green-50 rounded-lg p-3 mb-3 border border-green-100">
                            <p class="text-xs font-semibold text-green-700 mb-1">CEVAP: <?php if($soru->cevaplayan): ?><span class="font-normal text-green-600">(<?php echo e($soru->cevaplayan->ad_soyad); ?>)</span><?php endif; ?></p>
                            <p class="text-sm text-gray-700"><?php echo e($soru->cevap); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if($soru->durum == 'beklemede' || !$soru->cevap): ?>
                        <form action="<?php echo e(route('admin.soru-cevapla', $soru->id)); ?>" method="POST" class="mt-3">
                            <?php echo csrf_field(); ?>
                            <textarea name="cevap" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm" placeholder="Cevabınız..." required><?php echo e($soru->cevap); ?></textarea>
                            <div class="flex gap-2 mt-2">
                                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg text-sm hover:bg-orange-600">Cevapla & Yayınla</button>
                            </div>
                        </form>
                    <?php endif; ?>
                    <div class="mt-2">
                        <form action="<?php echo e(route('admin.soru-sil', $soru->id)); ?>" method="POST" onsubmit="return confirm('Emin misiniz?')" class="inline">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600">Sil</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center py-16 bg-white rounded-xl border">
            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4"><i class="fas fa-question text-2xl text-gray-400"></i></div>
            <p class="text-gray-500">Henüz soru bulunmuyor.</p>
        </div>
    <?php endif; ?>
    <div class="mt-4"><?php echo e($sorular->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/sorular.blade.php ENDPATH**/ ?>