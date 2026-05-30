<?php $__env->startSection('title', 'Ürün Soruları'); ?>
<?php $__env->startSection('page_title', 'Ürün Soruları'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4">
    <?php if($sorular->count() > 0): ?>
        <?php $__currentLoopData = $sorular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-xl border p-5 <?php echo e($soru->durum == 'beklemede' ? 'border-l-4 border-l-gold-500' : ''); ?>">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <p class="font-medium text-dark-900"><?php echo e($soru->musteri_adi); ?></p>
                        <p class="text-xs text-dark-400">
                            <?php echo e($soru->created_at ? $soru->created_at->diffForHumans() : ''); ?>

                            — <a href="<?php echo e(route('product.detail', $soru->urun->slug)); ?>" class="text-gold-600 hover:underline" target="_blank"><?php echo e($soru->urun->urun_adi); ?></a>
                        </p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full <?php echo e($soru->durum == 'yayinda' ? 'bg-green-100 text-green-700' : 'bg-gold-100 text-gold-700'); ?>"><?php echo e($soru->durum == 'yayinda' ? 'Cevaplanmış' : 'Beklemede'); ?></span>
                </div>
                <p class="text-dark-700 text-sm bg-cream-50 rounded-lg p-3 mb-4"><?php echo e($soru->soru); ?></p>

                    <?php if($soru->cevap): ?>
                        <div class="bg-green-50 rounded-lg p-3 mb-3 border border-green-100">
                            <p class="text-xs font-semibold text-green-700 mb-1">CEVABINIZ: <?php if($soru->cevaplayan): ?><span class="font-normal text-green-600">(<?php echo e($soru->cevaplayan->ad_soyad); ?>)</span><?php endif; ?></p>
                            <p class="text-sm text-dark-700"><?php echo e($soru->cevap); ?></p>
                        </div>
                    <?php endif; ?>

                <?php if($soru->durum == 'beklemede' || !$soru->cevap): ?>
                    <form action="<?php echo e(route('satici.soru-cevapla', $soru->id)); ?>" method="POST" class="mt-3">
                        <?php echo csrf_field(); ?>
                        <textarea name="cevap" rows="2" class="w-full border border-dark-200 rounded-lg px-3 py-2 text-sm bg-white" placeholder="Cevabınız..." required><?php echo e($soru->cevap); ?></textarea>
                        <div class="flex gap-2 mt-2">
                            <button type="submit" class="px-4 py-2 bg-gold-500 text-white rounded-lg text-sm hover:bg-gold-600 transition">Cevapla & Yayınla</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="mt-4"><?php echo e($sorular->links()); ?></div>
    <?php else: ?>
        <div class="text-center py-16 bg-white rounded-xl border">
            <div class="w-16 h-16 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-4"><i class="fas fa-question text-2xl text-dark-300"></i></div>
            <p class="text-dark-500">Henüz ürünlerinize soru gelmemiş.</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/sorular.blade.php ENDPATH**/ ?>