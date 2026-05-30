<?php $__env->startSection('title', 'Blog Yorumları'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Blog Yorumları</h1>
</div>

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">Ad Soyad</th>
                    <th class="px-4 py-3 text-left">Yazı</th>
                    <th class="px-4 py-3 text-left">Yorum</th>
                    <th class="px-4 py-3 text-left">Tarih</th>
                    <th class="px-4 py-3 text-center">Durum</th>
                    <th class="px-4 py-3 text-center">İşlem</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $yorumlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <span class="font-medium text-gray-800"><?php echo e($yorum->ad_soyad); ?></span>
                            <div class="text-xs text-gray-400"><?php echo e($yorum->email); ?></div>
                        </td>
                        <td class="px-4 py-3">
                            <a href="<?php echo e(route('blog.detail', $yorum->blog->slug)); ?>" class="text-orange-600 hover:underline" target="_blank"><?php echo e(Str::limit($yorum->blog->baslik, 40)); ?></a>
                        </td>
                        <td class="px-4 py-3 text-gray-600 max-w-xs"><?php echo e(Str::limit($yorum->yorum, 80)); ?></td>
                        <td class="px-4 py-3 text-gray-500 text-xs"><?php echo e($yorum->created_at->format('d.m.Y H:i')); ?></td>
                        <td class="px-4 py-3 text-center">
                            <?php if($yorum->onaylandi_mi): ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Onaylı</span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Bekliyor</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <?php if(!$yorum->onaylandi_mi): ?>
                                    <a href="<?php echo e(route('admin.blog-yorum-onayla', $yorum->id)); ?>"
                                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-green-500 text-white rounded-lg hover:bg-green-600 transition"
                                       onclick="return confirm('Yorum onaylansın mı?')">
                                        <i class="fas fa-check mr-1"></i>Onayla
                                    </a>
                                <?php endif; ?>
                                <form action="<?php echo e(route('admin.blog-yorum-sil', $yorum->id)); ?>" method="POST" onsubmit="return confirm('Yorum silinsin mi?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                        <i class="fas fa-trash mr-1"></i>Sil
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Henüz yorum yok.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t"> <?php echo e($yorumlar->links()); ?> </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/blog-yorumlar.blade.php ENDPATH**/ ?>