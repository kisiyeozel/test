 <?php $__env->startSection('title', 'Ürünler'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">Tüm Ürünler</h2>
        <span class="text-sm text-gray-500"><?php echo e($urunler->count()); ?> ürün</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">Ürün</th><th class="text-left px-6 py-3 font-medium text-gray-500">Satıcı</th><th class="text-left px-6 py-3 font-medium text-gray-500">Kategori</th><th class="text-left px-6 py-3 font-medium text-gray-500">Fiyat</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">İşlem</th></tr></thead>
            <tbody class="divide-y">
                <?php $__currentLoopData = $urunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden">
                                    <?php if($urun->ana_foto): ?><img src="<?php echo e(\App\Services\ImageService::getUrl($urun->ana_foto, 50, 50)); ?>" class="w-full h-full object-cover" loading="lazy" decoding="async" width="50" height="50"><?php endif; ?>
                                </div>
                                <span class="font-medium"><?php echo e($urun->urun_adi); ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500"><?php echo e($urun->kullanici->ad_soyad ?? '?'); ?></td>
                        <td class="px-6 py-4 text-gray-500"><?php echo e($urun->kategori->kategori_adi ?? '-'); ?></td>
                        <td class="px-6 py-4 font-medium"><?php echo e(number_format($urun->fiyat, 2)); ?> ₺</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                <?php if($urun->durum == 'onaylandi'): ?> bg-green-100 text-green-700
                                <?php elseif($urun->durum == 'beklemede'): ?> bg-yellow-100 text-yellow-700
                                <?php else: ?> bg-red-100 text-red-700 <?php endif; ?>">
                                <?php if($urun->durum == 'onaylandi'): ?> Onaylı
                                <?php elseif($urun->durum == 'beklemede'): ?> Beklemede
                                <?php else: ?> Reddedildi <?php endif; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <?php if($urun->durum != 'onaylandi'): ?>
                                    <a href="<?php echo e(route('admin.urun-onayla', $urun->id)); ?>" class="px-3 py-1 bg-green-500 text-white rounded text-xs hover:bg-green-600">Onayla</a>
                                <?php endif; ?>
                                <?php if($urun->durum != 'reddedildi'): ?>
                                    <a href="<?php echo e(route('admin.urun-reddet', $urun->id)); ?>" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">Reddet</a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4"><?php echo e($urunler->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/urunler.blade.php ENDPATH**/ ?>