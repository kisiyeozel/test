 <?php $__env->startSection('title', 'Siparişler'); ?> <?php $__env->startSection('page_title', 'Siparişler'); ?>
<?php $__env->startSection('content'); ?>
<div class="luxury-card overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-cream-100"><tr><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Sipariş No</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Müşteri</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Tutar</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Durum</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">Tarih</th><th class="text-left px-6 py-3 font-medium text-dark-600 uppercase tracking-wider text-xs">İşlem</th></tr></thead>
        <tbody class="divide-y divide-cream-100">
            <?php $__empty_1 = true; $__currentLoopData = $siparisler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-cream-50 transition">
                    <td class="px-6 py-4 font-mono text-xs text-dark-800"><?php echo e($siparis->siparis_no); ?></td>
                    <td class="px-6 py-4 text-dark-800"><?php echo e($siparis->kullanici->ad_soyad ?? '-'); ?></td>
                    <td class="px-6 py-4 font-medium text-dark-900"><?php echo e(number_format($siparis->genel_toplam, 2)); ?> ₺</td>
                    <td class="px-6 py-4">
                        <span class="badge
                            <?php if($siparis->siparis_durumu == 'teslim_edildi'): ?> badge-green
                            <?php elseif($siparis->siparis_durumu == 'kargoya_verildi'): ?> badge-dark
                            <?php elseif($siparis->siparis_durumu == 'hazirlaniyor'): ?> badge-gold
                            <?php else: ?> badge-dark <?php endif; ?>"><?php echo e($siparis->siparis_durumu); ?></span>
                    </td>
                    <td class="px-6 py-4 text-dark-400 text-xs"><?php echo e($siparis->created_at->format('d.m.Y')); ?></td>
                    <td class="px-6 py-4"><a href="<?php echo e(route('satici.siparis-detay', $siparis->id)); ?>" class="text-gold-600 hover:text-gold-700 text-xs font-medium">Detay <i class="fas fa-arrow-right ml-1"></i></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="px-6 py-16 text-center text-dark-400">
                    <div class="w-16 h-16 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-truck text-2xl text-dark-300"></i></div>
                    Henüz sipariş yok.
                </td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="mt-6"><?php echo e($siparisler->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/siparisler.blade.php ENDPATH**/ ?>