

<?php $__env->startSection('title', 'Ödeme'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-cream-50 border-b">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-dark-900">Ödeme</h1>
        <p class="text-dark-400 mt-2">Sipariş bilgilerinizi tamamlayın</p>
    </div>
</div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <form action="<?php echo e(route('checkout.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="bg-white rounded-2xl border border-dark-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-dark-900 mb-6 flex items-center gap-2"><i class="fas fa-truck text-gold-500"></i>Teslimat Bilgileri</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Ad Soyad</label>
                    <input type="text" name="ad_soyad" value="<?php echo e(old('ad_soyad', $user->ad_soyad)); ?>" class="input-field" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">E-posta</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" class="input-field" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Telefon</label>
                    <input type="text" name="telefon" value="<?php echo e(old('telefon', $user->telefon)); ?>" class="input-field" required>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Adres</label>
                    <textarea name="adres" rows="3" class="input-field" required><?php echo e(old('adres')); ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">İl</label>
                    <input type="text" name="sehir" class="input-field" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">İlçe</label>
                    <input type="text" name="ilce" class="input-field" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Posta Kodu</label>
                    <input type="text" name="posta_kodu" class="input-field">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-dark-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-note-sticky text-gold-500"></i>Sipariş Notu</h2>
            <textarea name="notlar" rows="3" class="input-field" placeholder="Satıcıya iletmek istediğiniz bir not var mı?"></textarea>
        </div>

        <div class="bg-white rounded-2xl border border-dark-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-dark-900 mb-6 flex items-center gap-2"><i class="fas fa-receipt text-gold-500"></i>Sipariş Özeti</h2>
            <div class="space-y-3">
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between text-sm py-2 border-b border-dark-50 last:border-0">
                        <span class="text-dark-500"><?php echo e($item['ad']); ?> <span class="text-dark-400">x<?php echo e($item['adet']); ?></span></span>
                        <span class="font-medium"><?php echo e(number_format($item['fiyat'] * $item['adet'], 2)); ?> ₺</span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <hr class="border-dark-100">
                <?php $kdvOrani = (float)(\App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger') ?? 0); $kdvTutari = $kdvOrani > 0 ? $araToplam * $kdvOrani / (100 + $kdvOrani) : 0; ?>
                <div class="flex justify-between text-sm"><span class="text-dark-500">Ara Toplam</span><span><?php echo e(number_format($araToplam, 2)); ?> ₺</span></div>
                <?php if($kdvOrani > 0): ?>
                    <div class="flex justify-between text-xs text-dark-400"><span>KDV (%<?php echo e($kdvOrani); ?>)</span><span><?php echo e(number_format($kdvTutari, 2)); ?> ₺</span></div>
                <?php endif; ?>
                <div class="flex justify-between text-sm"><span class="text-dark-500">Kargo</span><span class="<?php echo e($araToplam >= 500 ? 'text-green-600 font-medium' : ''); ?>"><?php echo e($araToplam >= 500 ? 'Ücretsiz' : '49.90 ₺'); ?></span></div>
                <hr class="border-dark-100">
                <div class="flex justify-between text-xl font-bold"><span>Toplam</span><span class="text-gold-600"><?php echo e(number_format($araToplam + ($araToplam >= 500 ? 0 : 49.90), 2)); ?> ₺</span></div>
            </div>
        </div>

        <button type="submit" class="btn-gold w-full justify-center !py-4 text-lg shadow-2xl shadow-gold-500/30">
            <i class="fas fa-lock"></i><?php echo e(number_format($araToplam + ($araToplam >= 500 ? 0 : 49.90), 2)); ?> ₺ Ödeme Yap
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/checkout.blade.php ENDPATH**/ ?>