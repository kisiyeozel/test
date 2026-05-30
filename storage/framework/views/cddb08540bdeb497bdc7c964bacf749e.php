 <?php $__env->startSection('title', 'Varyantlar'); ?> <?php $__env->startSection('page_title', $urun->urun_adi . ' - Varyantlar'); ?>
<?php $__env->startSection('content'); ?>
<div class="grid md:grid-cols-2 gap-6">
    <div class="luxury-card p-6">
        <h3 class="font-semibold text-dark-900 mb-4"><i class="fas fa-plus-circle text-gold-500 mr-2"></i>Yeni Varyant</h3>
        <form action="<?php echo e(route('satici.varyant-kaydet')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="urun_id" value="<?php echo e($urun->id); ?>">
            <div class="mb-3"><label class="block text-sm font-medium text-dark-700 mb-1">Tür</label>
                <select name="tur" class="input-field w-full" required>
                    <option value="renk">Renk</option>
                    <option value="beden">Beden</option>
                    <option value="olcu">Ölçü</option>
                    <option value="yazi_tipi">Yazı Tipi</option>
                </select>
            </div>
            <div class="mb-3"><label class="block text-sm font-medium text-dark-700 mb-1">Değer</label><input type="text" name="deger" class="input-field w-full" required placeholder="Örn: Kırmızı, L, 35, Arial"></div>
            <div class="grid grid-cols-2 gap-3 mb-3">
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Fiyat Farkı (₺)</label><input type="text" name="fiyat_farki" value="0" class="input-field w-full"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Stok</label><input type="number" name="stok" value="0" min="0" class="input-field w-full"></div>
            </div>
            <button type="submit" class="btn-gold px-6 py-2.5 rounded-xl text-sm font-medium"><i class="fas fa-plus mr-1"></i>Ekle</button>
        </form>
    </div>
    <div class="luxury-card overflow-hidden">
        <div class="p-4 border-b border-cream-200"><h3 class="font-semibold text-dark-900">Mevcut Varyantlar (<?php echo e($urun->varyantlar->count()); ?>)</h3></div>
        <div class="divide-y divide-cream-200">
            <?php $__empty_1 = true; $__currentLoopData = $urun->varyantlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varyant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="p-4 flex items-center justify-between hover:bg-cream-50 transition">
                    <div>
                        <span class="text-xs text-dark-400 uppercase tracking-wider"><?php echo e($varyant->tur); ?></span>
                        <p class="font-medium text-dark-800"><?php echo e($varyant->deger); ?></p>
                        <p class="text-xs text-dark-400">Fiyat Farkı: <?php echo e($varyant->fiyat_farki > 0 ? '+' : ''); ?><?php echo e(number_format($varyant->fiyat_farki, 2)); ?> ₺ | Stok: <?php echo e($varyant->stok); ?></p>
                    </div>
                    <form action="<?php echo e(route('satici.varyant-sil', $varyant->id)); ?>" method="POST" onsubmit="return confirm('Emin misiniz?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-400 hover:text-red-600 transition"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="p-8 text-center text-dark-400 text-sm">Henüz varyant eklenmemiş.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/varyantlar.blade.php ENDPATH**/ ?>