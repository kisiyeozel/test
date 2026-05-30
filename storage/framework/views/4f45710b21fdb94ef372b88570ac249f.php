<?php $__env->startSection('title', 'Galeri'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-dark-900">Galeri</h1>
        <p class="text-dark-400 text-sm mt-1">Mağaza portföyünüzü sergileyin</p>
    </div>
</div>

<div class="luxury-card p-6 mb-6">
    <form action="<?php echo e(route('satici.galeri-yukle')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="border-2 border-dashed border-dark-200 rounded-xl p-8 text-center hover:border-gold-400 transition cursor-pointer" onclick="document.getElementById('gorseller-input').click()">
            <i class="fas fa-cloud-upload-alt text-4xl text-gold-500 mb-3"></i>
            <p class="text-dark-500 font-medium">Görsel yüklemek için tıklayın</p>
            <p class="text-dark-400 text-xs mt-1">JPG, PNG veya WebP (max 5MB) — birden fazla seçebilirsiniz</p>
            <input id="gorseller-input" type="file" name="gorseller[]" multiple accept="image/*" class="hidden">
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-dark-700 mb-1">Açıklama (tüm görseller için)</label>
            <input type="text" name="baslik" placeholder="Örn: El işi tasarımlar, özel siparişler..." class="w-full px-4 py-2.5 bg-dark-50/50 border border-dark-200 rounded-lg text-sm focus:border-gold-300 focus:ring-2 focus:ring-gold-500/10 transition">
        </div>
        <button type="submit" class="btn-gold mt-4 !py-2.5 !px-6 text-sm"><i class="fas fa-upload mr-1.5"></i>Yükle</button>
    </form>
</div>

<?php if($magaza->gorseller->count()): ?>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php $__currentLoopData = $magaza->gorseller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gorsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group relative luxury-card overflow-hidden rounded-xl">
                <img src="<?php echo e(asset('storage/' . $gorsel->dosya_yolu)); ?>"
                     class="w-full h-48 object-cover"
                     alt="">
                <?php if($gorsel->baslik): ?>
                    <div class="px-3 py-2 border-t border-dark-100">
                        <p class="text-xs text-dark-500 truncate"><?php echo e($gorsel->baslik); ?></p>
                    </div>
                <?php endif; ?>
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-3">
                    <form action="<?php echo e(route('satici.galeri-sil', $gorsel->id)); ?>" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="w-10 h-10 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <div class="absolute bottom-2 left-2 bg-dark-900/70 text-white text-xs px-2 py-1 rounded"><?php echo e($gorsel->sira); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <div class="text-center py-16">
        <div class="w-20 h-20 mx-auto bg-cream-100 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-images text-3xl text-dark-300"></i></div>
        <p class="text-dark-400 font-medium">Henüz görsel eklenmemiş</p>
        <p class="text-dark-300 text-sm mt-1">Yukarıdan görsel yükleyerek portföyünüzü oluşturun</p>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.satici', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/satici/galeri.blade.php ENDPATH**/ ?>