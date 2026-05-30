 <?php $__env->startSection('title', 'Ürün Düzenle'); ?> <?php $__env->startSection('page_title', 'Ürün Düzenle'); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-3xl">
    <div class="luxury-card p-6">
        <form action="<?php echo e(route('satici.urun-guncelle', $urun->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Ürün Adı</label><input type="text" name="urun_adi" value="<?php echo e($urun->urun_adi); ?>" class="input-field w-full" required></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Kategori</label><select name="kategori_id" class="input-field w-full" required><?php $__currentLoopData = $kategoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($k->id); ?>" <?php echo e($urun->kategori_id == $k->id ? 'selected' : ''); ?>><?php echo e($k->kategori_adi); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Fiyat (₺)</label><input type="text" name="fiyat" value="<?php echo e($urun->fiyat); ?>" class="input-field w-full" required></div>
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Kısa Açıklama</label><input type="text" name="kisa_aciklama" value="<?php echo e($urun->kisa_aciklama); ?>" class="input-field w-full"></div>
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Açıklama</label><textarea name="aciklama" rows="4" class="input-field w-full"><?php echo e($urun->aciklama); ?></textarea></div>
                <?php if($urun->ana_foto): ?><div class="col-span-2"><img src="<?php echo e(asset('storage/' . $urun->ana_foto)); ?>" class="h-24 rounded-lg border border-cream-200"></div><?php endif; ?>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Yeni Fotoğraf</label><input type="file" name="ana_foto" accept="image/*" class="w-full text-sm text-dark-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gold-50 file:text-gold-700 hover:file:bg-gold-100"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Teslim Süresi (gün)</label><input type="number" name="teslim_suresi" value="<?php echo e($urun->teslim_suresi); ?>" min="1" class="input-field w-full"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Stok Durumu</label><select name="stok_durumu" class="input-field w-full"><option value="var" <?php echo e($urun->stok_durumu == 'var' ? 'selected' : ''); ?>>Stokta Var</option><option value="yok" <?php echo e($urun->stok_durumu == 'yok' ? 'selected' : ''); ?>>Stok Yok</option><option value="tukendi" <?php echo e($urun->stok_durumu == 'tukendi' ? 'selected' : ''); ?>>Tükendi</option></select></div>
            </div>

            <hr class="my-6 border-cream-200">
            <h3 class="font-semibold text-dark-900 mb-4"><i class="fas fa-palette text-gold-500 mr-2"></i>Kişiselleştirme Seçenekleri</h3>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="kisinin_adi" value="1" <?php echo e($urun->kisinin_adi ? 'checked' : ''); ?> class="accent-gold-500"> <span class="text-sm text-dark-700">İsim Yazılacak</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="fotograf_yukle" value="1" <?php echo e($urun->fotograf_yukle ? 'checked' : ''); ?> class="accent-gold-500"> <span class="text-sm text-dark-700">Fotoğraf Yüklenecek</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="renk_secimi" value="1" <?php echo e($urun->renk_secimi ? 'checked' : ''); ?> class="accent-gold-500"> <span class="text-sm text-dark-700">Renk Seçilecek</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="olcu_secimi" value="1" <?php echo e($urun->olcu_secimi ? 'checked' : ''); ?> class="accent-gold-500"> <span class="text-sm text-dark-700">Ölçü Seçilecek</span></label>
                <label class="flex items-center gap-3 p-3 border border-cream-200 rounded-xl cursor-pointer hover:border-gold-400 transition"><input type="checkbox" name="ozel_not" value="1" <?php echo e($urun->ozel_not ? 'checked' : ''); ?> class="accent-gold-500"> <span class="text-sm text-dark-700">Özel Not Alanı</span></label>
            </div>

            <button type="submit" class="btn-gold px-10 py-3 rounded-xl font-semibold text-sm"><i class="fas fa-save mr-2"></i>Güncelle</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/urun-duzenle.blade.php ENDPATH**/ ?>