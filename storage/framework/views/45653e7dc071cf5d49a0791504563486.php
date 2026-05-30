

<?php $__env->startSection('title', 'Siparişlerim'); ?>
<?php $__env->startSection('meta_desc', 'Sipariş geçmişiniz ve durum takibi'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Siparişlerim</h1>
        <p class="text-dark-400 mt-2">Tüm siparişlerinizi buradan takip edin</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <?php if($siparisler->count() > 0): ?>
        <div class="space-y-4">
            <?php $__currentLoopData = $siparisler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl border border-dark-100 p-6 card-hover">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center"><i class="fas fa-receipt text-gold-500"></i></div>
                            <div>
                                <p class="text-sm text-dark-400">Sipariş No</p>
                                <p class="font-mono font-medium text-dark-900"><?php echo e($siparis->siparis_no); ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <p class="text-sm text-dark-400 hidden sm:block"><?php echo e($siparis->created_at->format('d.m.Y H:i')); ?></p>
                            <span class="badge
                                <?php if($siparis->siparis_durumu == 'teslim_edildi'): ?> badge-green
                                <?php elseif($siparis->siparis_durumu == 'kargoya_verildi'): ?> badge bg-blue-100 text-blue-700
                                <?php elseif($siparis->siparis_durumu == 'hazirlaniyor'): ?> badge-yellow
                                <?php else: ?> badge bg-cream-100 text-dark-700 <?php endif; ?>">
                                <?php switch($siparis->siparis_durumu):
                                    case ('alinan'): ?> <i class="fas fa-check-circle"></i> Sipariş Alındı <?php break; ?>
                                    <?php case ('hazirlaniyor'): ?> <i class="fas fa-spinner"></i> Hazırlanıyor <?php break; ?>
                                    <?php case ('kargoya_verildi'): ?> <i class="fas fa-truck"></i> Kargoya Verildi <?php break; ?>
                                    <?php case ('teslim_edildi'): ?> <i class="fas fa-check-double"></i> Teslim Edildi <?php break; ?>
                                    <?php case ('iade_edildi'): ?> <i class="fas fa-undo"></i> İade Edildi <?php break; ?>
                                    <?php default: ?> <?php echo e($siparis->siparis_durumu); ?>

                                <?php endswitch; ?>
                            </span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $siparis->urunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center gap-4 py-2 border-b border-dark-50 last:border-0">
                                <div class="w-14 h-14 bg-cream-50 rounded-xl overflow-hidden shrink-0">
                                    <?php if($item->urun_foto): ?><img src="<?php echo e(asset('storage/' . $item->urun_foto)); ?>" class="w-full h-full object-cover"><?php endif; ?>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-dark-900 truncate"><?php echo e($item->urun_adi); ?></p>
                                    <p class="text-xs text-dark-400"><?php echo e($item->adet); ?> adet x <?php echo e(number_format($item->birim_fiyat, 2)); ?> ₺</p>
                                </div>
                                <p class="text-sm font-semibold"><?php echo e(number_format($item->toplam, 2)); ?> ₺</p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($siparis->kargo_firmasi): ?>
                        <div class="mt-4 pt-4 border-t border-dark-50 flex items-center gap-2 text-xs text-dark-400">
                            <i class="fas fa-shipping-fast text-gold-400"></i>
                            <?php echo e($siparis->kargo_firmasi); ?> — <?php echo e($siparis->takip_kodu); ?>

                        </div>
                    <?php endif; ?>
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-dark-100">
                        <div></div>
                        <div class="flex items-center gap-4">
                            <p class="text-xl font-bold text-gold-600"><?php echo e(number_format($siparis->genel_toplam, 2)); ?> <span class="text-sm font-normal">₺</span></p>
                            <a href="<?php echo e(route('siparis.detay', $siparis->id)); ?>" class="btn-outline-gold !py-2 !px-4 text-sm">Detay <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6"><i class="fas fa-box text-4xl text-gray-300"></i></div>
            <h2 class="text-2xl font-bold text-dark-900 mb-2">Henüz Siparişiniz Yok</h2>
            <p class="text-dark-400 mb-8">İlk siparişinizi vermek için alışverişe başlayın.</p>
            <a href="<?php echo e(route('products')); ?>" class="btn-gold">Alışverişe Başla</a>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('styles'); ?>
<style>
    .badge i { margin-right: 4px; }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/siparislerim.blade.php ENDPATH**/ ?>