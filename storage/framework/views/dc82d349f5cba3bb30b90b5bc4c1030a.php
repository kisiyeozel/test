 <?php $__env->startSection('title', 'Mağazam'); ?> <?php $__env->startSection('page_title', 'Mağaza Yönetimi'); ?>
<?php $__env->startSection('content'); ?>
<?php if($magaza): ?>
    <div class="luxury-card p-6 mb-6">
        <div class="flex items-start gap-5 mb-6">
            <div class="w-20 h-20 bg-gold-100 rounded-xl flex items-center justify-center text-gold-500 shrink-0 border-2 border-gold-200 overflow-hidden">
                <?php if($magaza->logo): ?><img src="<?php echo e(\App\Services\ImageService::getUrl($magaza->logo, 100, 100)); ?>" class="w-full h-full object-cover" loading="lazy" decoding="async" width="100" height="100"><?php else: ?><img src="<?php echo e(\App\Services\MagazaGorselService::getLogoUrl($magaza->magaza_adi, 100)); ?>" class="w-full h-full object-cover" loading="lazy" width="100" height="100"><?php endif; ?>
            </div>
            <div class="flex-1">
                <h2 class="text-xl font-bold text-dark-900 font-serif gradient-text"><?php echo e($magaza->magaza_adi); ?></h2>
                <p class="text-sm text-dark-400 mt-1"><?php echo e($magaza->aciklama); ?></p>
                <span class="badge mt-2
                    <?php if($magaza->durum == 'onaylandi'): ?> badge-green
                    <?php elseif($magaza->durum == 'beklemede'): ?> badge-gold
                    <?php else: ?> badge-dark <?php endif; ?> inline-block">
                    <?php echo e($magaza->durum == 'onaylandi' ? 'Onaylı' : ($magaza->durum == 'beklemede' ? 'Onay Bekliyor' : 'Reddedildi')); ?>

                </span>
            </div>
        </div>
        <hr class="border-cream-200 mb-6">
        <form action="<?php echo e(route('satici.magaza.update')); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Mağaza Adı</label><input type="text" name="magaza_adi" value="<?php echo e($magaza->magaza_adi); ?>" class="input-field w-full" required></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Telefon</label><input type="text" name="telefon" value="<?php echo e($magaza->telefon); ?>" class="input-field w-full"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">E-posta</label><input type="email" name="email" value="<?php echo e($magaza->email); ?>" class="input-field w-full"></div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1">Slogan</label>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-3 py-2.5 bg-gold-50 border border-r-0 border-gold-200 rounded-l-lg text-gold-600 text-sm font-medium whitespace-nowrap">Biz kişiye özel</span>
                        <?php
                            $prefix = 'Biz kişiye özel ';
                            $sloganInput = str_starts_with($magaza->slogan ?? '', $prefix) ? substr($magaza->slogan, strlen($prefix)) : ($magaza->slogan ?? '');
                        ?>
                        <input type="text" name="slogan" value="<?php echo e($sloganInput); ?>" class="input-field w-full rounded-l-none" placeholder="ürünler tasarlanıyoruz..." maxlength="200">
                    </div>
                </div>
                <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Açıklama</label><textarea name="aciklama" rows="3" class="input-field w-full"><?php echo e($magaza->aciklama); ?></textarea></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Logo</label><input type="file" name="logo" accept="image/*" class="input-field w-full"></div>
                <div><label class="block text-sm font-medium text-dark-700 mb-1">Banner (kapak)</label><input type="file" name="banner" accept="image/*" class="input-field w-full"></div>
            </div>
            <button type="submit" class="btn-gold mt-4 px-8 py-2.5 rounded-xl font-medium"><i class="fas fa-save mr-2"></i>Güncelle</button>
        </form>
    </div>
<?php else: ?>
    <div class="max-w-2xl">
        <div class="luxury-card p-6">
            <div class="text-center mb-6"><i class="fas fa-store text-4xl text-gold-400"></i><h2 class="text-xl font-bold text-dark-900 mt-3">Mağaza Başvurusu</h2><p class="text-sm text-dark-400 mt-1">Satış yapmaya başlamak için mağaza başvurusu yapın.</p></div>
            <form action="<?php echo e(route('satici.magaza.store')); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Mağaza Adı</label><input type="text" name="magaza_adi" class="input-field w-full" required></div>
                    <div><label class="block text-sm font-medium text-dark-700 mb-1">Telefon</label><input type="text" name="telefon" class="input-field w-full"></div>
                    <div><label class="block text-sm font-medium text-dark-700 mb-1">E-posta</label><input type="email" name="email" class="input-field w-full"></div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-dark-700 mb-1">Slogan</label>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-3 py-2.5 bg-gold-50 border border-r-0 border-gold-200 rounded-l-lg text-gold-600 text-sm font-medium whitespace-nowrap">Biz kişiye özel</span>
                            <input type="text" name="slogan" class="input-field w-full rounded-l-none" placeholder="ürünler tasarlanıyoruz..." maxlength="200">
                        </div>
                    </div>
                    <div class="col-span-2"><label class="block text-sm font-medium text-dark-700 mb-1">Açıklama</label><textarea name="aciklama" rows="3" class="input-field w-full" placeholder="Mağazanızı tanıtın..."></textarea></div>
                    <div><label class="block text-sm font-medium text-dark-700 mb-1">Logo</label><input type="file" name="logo" accept="image/*" class="input-field w-full"></div>
                    <div><label class="block text-sm font-medium text-dark-700 mb-1">Banner (kapak)</label><input type="file" name="banner" accept="image/*" class="input-field w-full"></div>
                </div>
                <button type="submit" class="btn-gold mt-4 px-8 py-2.5 rounded-xl font-medium w-full"><i class="fas fa-paper-plane mr-2"></i>Başvuruyu Gönder</button>
            </form>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/magaza.blade.php ENDPATH**/ ?>