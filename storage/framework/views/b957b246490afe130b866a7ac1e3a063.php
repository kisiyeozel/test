 <?php $__env->startSection('title', 'Dashboard'); ?> <?php $__env->startSection('page_title', 'Satıcı Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<?php if(!$magaza || $magaza->durum != 'onaylandi'): ?>
    <div class="bg-gold-50 border border-gold-200 text-gold-700 px-6 py-4 rounded-xl mb-6 flex items-start gap-3">
        <i class="fas fa-info-circle mt-0.5 text-gold-500"></i>
        <div>
            <?php if(!$magaza): ?> Henüz mağaza başvurusu yapmadınız. <a href="<?php echo e(route('satici.magaza')); ?>" class="underline font-medium text-gold-600 hover:text-gold-700">Hemen başvur</a>
            <?php elseif($magaza->durum == 'beklemede'): ?> Mağaza başvurunuz inceleniyor. Onaylandıktan sonra ürün ekleyebileceksiniz.
            <?php elseif($magaza->durum == 'reddedildi'): ?> Mağaza başvurunuz reddedildi. <a href="<?php echo e(route('satici.magaza')); ?>" class="underline font-medium text-gold-600 hover:text-gold-700">Tekrar başvur</a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
    <div class="luxury-card p-5"><i class="fas fa-boxes text-gold-400 text-xl mb-3"></i><p class="text-sm text-dark-400">Toplam Ürün</p><p class="text-2xl font-bold text-dark-900"><?php echo e($toplamUrun); ?></p></div>
    <div class="luxury-card p-5"><i class="fas fa-check-circle text-gold-400 text-xl mb-3"></i><p class="text-sm text-dark-400">Aktif Ürün</p><p class="text-2xl font-bold text-green-600"><?php echo e($aktifUrun); ?></p></div>
    <div class="luxury-card p-5"><i class="fas fa-shopping-cart text-gold-400 text-xl mb-3"></i><p class="text-sm text-dark-400">Toplam Sipariş</p><p class="text-2xl font-bold text-dark-900"><?php echo e($toplamSiparis); ?></p></div>
    <div class="luxury-card p-5"><i class="fas fa-clock text-gold-400 text-xl mb-3"></i><p class="text-sm text-dark-400">Bekleyen Sipariş</p><p class="text-2xl font-bold text-gold-600"><?php echo e($bekleyenSiparis); ?></p></div>
</div>

<div class="grid md:grid-cols-3 gap-6 mb-8">
    <a href="<?php echo e(route('satici.urun-ekle')); ?>" class="btn-gold text-center px-6 py-3 rounded-xl text-sm font-semibold"><i class="fas fa-plus mr-2"></i>Yeni Ürün Ekle</a>
    <a href="<?php echo e(route('satici.magaza')); ?>" class="btn-outline-gold text-center px-6 py-3 rounded-xl text-sm font-semibold"><i class="fas fa-store mr-2"></i>Mağazamı Düzenle</a>
    <a href="<?php echo e(route('satici.siparisler')); ?>" class="btn-outline-gold text-center px-6 py-3 rounded-xl text-sm font-semibold"><i class="fas fa-truck mr-2"></i>Siparişler</a>
</div>

<div class="luxury-card p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-dark-900">Son Siparişler</h3>
        <a href="<?php echo e(route('satici.siparisler')); ?>" class="text-sm text-gold-600 hover:text-gold-700">Tümü <i class="fas fa-arrow-right ml-1"></i></a>
    </div>
    <?php if($sonSiparisler->count() > 0): ?>
        <div class="divide-y divide-cream-200">
            <?php $__currentLoopData = $sonSiparisler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-3 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-dark-900"><?php echo e($siparis->siparis_no); ?></p>
                        <p class="text-xs text-dark-400"><?php echo e($siparis->created_at->format('d.m.Y')); ?> - <?php echo e(number_format($siparis->genel_toplam, 2)); ?> ₺</p>
                    </div>
                    <span class="badge
                        <?php if($siparis->siparis_durumu == 'teslim_edildi'): ?> badge-green
                        <?php elseif($siparis->siparis_durumu == 'kargoya_verildi'): ?> badge-gold
                        <?php else: ?> badge-dark <?php endif; ?>"><?php echo e($siparis->siparis_durumu); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center text-dark-400 text-sm py-4">Henüz sipariş yok.</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/dashboard.blade.php ENDPATH**/ ?>