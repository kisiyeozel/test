 <?php $__env->startSection('title', 'Kullanıcılar'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl border overflow-hidden">
    <div class="p-6 border-b"><h2 class="text-lg font-semibold text-gray-900">Tüm Kullanıcılar</h2></div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="text-left px-6 py-3 font-medium text-gray-500">ID</th><th class="text-left px-6 py-3 font-medium text-gray-500">Ad Soyad</th><th class="text-left px-6 py-3 font-medium text-gray-500">E-posta</th><th class="text-left px-6 py-3 font-medium text-gray-500">Rol</th><th class="text-left px-6 py-3 font-medium text-gray-500">Durum</th><th class="text-left px-6 py-3 font-medium text-gray-500">İşlem</th></tr></thead>
            <tbody class="divide-y">
                <?php $__currentLoopData = $kullanicilar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kullanici): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><?php echo e($kullanici->id); ?></td>
                        <td class="px-6 py-4 font-medium"><?php echo e($kullanici->ad_soyad); ?></td>
                        <td class="px-6 py-4 text-gray-500"><?php echo e($kullanici->email); ?></td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                <?php if($kullanici->role == 'admin'): ?> bg-purple-100 text-purple-700
                                <?php elseif($kullanici->role == 'satici'): ?> bg-orange-100 text-orange-700
                                <?php else: ?> bg-blue-100 text-blue-700 <?php endif; ?>">
                                <?php echo e($kullanici->role == 'admin' ? 'Admin' : ($kullanici->role == 'satici' ? 'Satıcı' : 'Müşteri')); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                <?php if($kullanici->durum == 'aktif'): ?> bg-green-100 text-green-700
                                <?php elseif($kullanici->durum == 'pasif'): ?> bg-yellow-100 text-yellow-700
                                <?php else: ?> bg-red-100 text-red-700 <?php endif; ?>">
                                <?php echo e($kullanici->durum); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <form action="<?php echo e(route('admin.kullanici-durum', $kullanici->id)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <select name="durum" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1">
                                        <option value="aktif" <?php echo e($kullanici->durum == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                                        <option value="pasif" <?php echo e($kullanici->durum == 'pasif' ? 'selected' : ''); ?>>Pasif</option>
                                        <option value="banli" <?php echo e($kullanici->durum == 'banli' ? 'selected' : ''); ?>>Banlı</option>
                                    </select>
                                </form>
                                <form action="<?php echo e(route('admin.kullanici-role', $kullanici->id)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <select name="role" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1">
                                        <option value="musteri" <?php echo e($kullanici->role == 'musteri' ? 'selected' : ''); ?>>Müşteri</option>
                                        <option value="satici" <?php echo e($kullanici->role == 'satici' ? 'selected' : ''); ?>>Satıcı</option>
                                        <option value="admin" <?php echo e($kullanici->role == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                    </select>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4"><?php echo e($kullanicilar->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/kullanicilar.blade.php ENDPATH**/ ?>