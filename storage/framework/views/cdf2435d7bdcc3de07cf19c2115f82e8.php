 <?php $__env->startSection('title', 'Sipariş Detay'); ?> <?php $__env->startSection('page_title', 'Sipariş Detay - ' . $siparis->siparis_no); ?>
<?php $__env->startSection('content'); ?>
<div class="grid md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-6">
        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-box text-gold-500"></i>Sipariş Ürünleri</h3>
            <?php $__currentLoopData = $siparis->urunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center gap-4 p-3 border-b border-cream-100 last:border-0">
                    <div class="w-16 h-16 bg-cream-100 rounded-xl overflow-hidden shrink-0">
                        <?php if($item->urun && $item->urun->ana_foto): ?><img src="<?php echo e(\App\Services\ImageService::getUrl($item->urun->ana_foto, 80, 80)); ?>" class="w-full h-full object-cover" loading="lazy" decoding="async" width="80" height="80"><?php endif; ?>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-dark-900 truncate"><?php echo e($item->urun_adi); ?> <span class="text-dark-400 font-normal">x<?php echo e($item->adet); ?></span></p>
                        <p class="text-sm text-dark-400"><?php echo e(number_format($item->birim_fiyat, 2)); ?> ₺</p>
                        <?php if($item->kisisellestirme_bilgisi): ?>
                            <p class="text-xs text-gold-600 mt-1"><i class="fas fa-paint-brush mr-1"></i>Kişiselleştirilmiş</p>
                        <?php endif; ?>
                    </div>
                    <p class="font-bold text-dark-900 shrink-0"><?php echo e(number_format($item->toplam, 2)); ?> ₺</p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-user text-gold-500"></i>Müşteri Bilgileri</h3>
            <div class="space-y-3 text-sm">
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">Ad Soyad:</span><span class="text-dark-800"><?php echo e($siparis->ad_soyad); ?></span></div>
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">E-posta:</span><span class="text-dark-800"><?php echo e($siparis->email); ?></span></div>
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">Telefon:</span><span class="text-dark-800"><?php echo e($siparis->telefon); ?></span></div>
                <div class="flex"><span class="text-dark-400 w-24 shrink-0">Adres:</span><span class="text-dark-800"><?php echo e($siparis->adres); ?>, <?php echo e($siparis->ilce); ?>/<?php echo e($siparis->sehir); ?></span></div>
                <?php if($siparis->notlar): ?><div class="flex"><span class="text-dark-400 w-24 shrink-0">Not:</span><span class="text-dark-600 italic"><?php echo e($siparis->notlar); ?></span></div><?php endif; ?>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-receipt text-gold-500"></i>Sipariş Özeti</h3>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between"><span class="text-dark-400">Ara Toplam</span><span class="text-dark-800"><?php echo e(number_format($siparis->ara_toplam, 2)); ?> ₺</span></div>
                <div class="flex justify-between"><span class="text-dark-400">Kargo</span><span class="text-dark-800"><?php echo e(number_format($siparis->kargo_ucreti, 2)); ?> ₺</span></div>
                <hr class="border-cream-200">
                <div class="flex justify-between font-bold text-lg"><span class="text-dark-900">Toplam</span><span class="text-gold-600"><?php echo e(number_format($siparis->genel_toplam, 2)); ?> ₺</span></div>
            </div>
        </div>

        <div class="luxury-card p-6">
            <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-truck text-gold-500"></i>Durum Güncelle</h3>
            <form action="<?php echo e(route('satici.siparis-durum', $siparis->id)); ?>" method="POST" class="mb-5">
                <?php echo csrf_field(); ?>
                <label class="block text-sm font-medium text-dark-700 mb-1.5">Sipariş Durumu</label>
                <select name="durum" class="input-field mb-3">
                    <option value="hazirlaniyor" <?php echo e($siparis->siparis_durumu == 'hazirlaniyor' ? 'selected' : ''); ?>>Hazırlanıyor</option>
                    <option value="kargoya_verildi" <?php echo e($siparis->siparis_durumu == 'kargoya_verildi' ? 'selected' : ''); ?>>Kargoya Verildi</option>
                    <option value="teslim_edildi" <?php echo e($siparis->siparis_durumu == 'teslim_edildi' ? 'selected' : ''); ?>>Teslim Edildi</option>
                </select>
                <button type="submit" class="btn-gold w-full justify-center !py-2.5">Güncelle</button>
            </form>

            <hr class="border-cream-200 mb-5">
            <h4 class="font-medium text-dark-900 mb-3 text-sm">Kargo Bilgisi Ekle</h4>
            <form action="<?php echo e(route('satici.siparis-kargo', $siparis->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-dark-700 mb-1">Kargo Firması</label>
                    <input type="text" name="kargo_firmasi" placeholder="Kargo firması adı" class="input-field">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-dark-700 mb-1">Takip Kodu</label>
                    <input type="text" name="takip_kodu" placeholder="Takip kodu" class="input-field">
                </div>
                <button type="submit" class="btn-outline-gold w-full justify-center !py-2.5">Kaydet</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/siparis-detay.blade.php ENDPATH**/ ?>