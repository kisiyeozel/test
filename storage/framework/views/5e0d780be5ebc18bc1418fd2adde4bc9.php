 <?php $__env->startSection('title', 'Siparişler'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Tüm Siparişler</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3">Sipariş No</th><th class="text-left px-6 py-3">Müşteri</th><th class="text-left px-6 py-3">Tutar</th><th class="text-left px-6 py-3">Ödeme</th><th class="text-left px-6 py-3">Durum</th><th class="text-left px-6 py-3">Tarih</th><th class="text-left px-6 py-3">İşlem</th></tr></thead>
            <tbody class="divide-y">
                <?php $__currentLoopData = $siparisler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs"><?php echo e($siparis->siparis_no); ?></td>
                        <td class="px-6 py-4"><?php echo e($siparis->kullanici->ad_soyad ?? '-'); ?></td>
                        <td class="px-6 py-4 font-medium"><?php echo e(number_format($siparis->genel_toplam, 2)); ?> ₺</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-xs font-medium <?php echo e($siparis->odeme_durumu == 'basarili' ? 'bg-green-100 text-green-700' : ($siparis->odeme_durumu == 'beklemede' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700')); ?>"><?php echo e($siparis->odeme_durumu); ?></span>
                        </td>
                        <td class="px-6 py-4"><?php echo e($siparis->siparis_durumu); ?></td>
                        <td class="px-6 py-4 text-gray-500 text-xs"><?php echo e($siparis->created_at->format('d.m.Y')); ?></td>
                        <td class="px-6 py-4"><a href="#" class="text-orange-600 hover:text-orange-700 text-xs">Detay</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4"><?php echo e($siparisler->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/siparisler.blade.php ENDPATH**/ ?>