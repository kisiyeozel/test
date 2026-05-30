 <?php $__env->startSection('title', 'Kategoriler'); ?>
<?php $__env->startPush('scripts'); ?>
<script>
function switchTab(lang, formId) {
    document.querySelectorAll('.lang-tab-' + formId).forEach(t => t.classList.remove('hidden'));
    document.querySelectorAll('.lang-btn-' + formId).forEach(b => b.classList.remove('bg-orange-500', 'text-white'));
    document.querySelectorAll('.lang-btn-' + formId).forEach(b => b.classList.add('bg-gray-100', 'text-gray-600'));
    document.querySelector('.lang-tab-' + formId + '[data-lang="' + lang + '"]').classList.remove('hidden');
    document.querySelector('.lang-btn-' + formId + '[data-lang="' + lang + '"]').classList.remove('bg-gray-100', 'text-gray-600');
    document.querySelector('.lang-btn-' + formId + '[data-lang="' + lang + '"]').classList.add('bg-orange-500', 'text-white');
}
function openEdit(id) { document.getElementById('editForm-' + id).classList.toggle('hidden'); }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border p-6">
        <h3 class="font-semibold text-gray-900 mb-4">Yeni Kategori</h3>
        <form action="<?php echo e(route('admin.kategori-ekle')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="flex gap-2 mb-4">
                <button type="button" data-lang="tr" class="lang-btn-new text-xs px-3 py-1.5 rounded bg-orange-500 text-white font-medium" onclick="switchTab('tr', 'new')">TR</button>
                <button type="button" data-lang="en" class="lang-btn-new text-xs px-3 py-1.5 rounded bg-gray-100 text-gray-600 font-medium" onclick="switchTab('en', 'new')">EN</button>
            </div>
            <div class="lang-tab-new" data-lang="tr">
                <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Kategori Adı (TR)</label><input type="text" name="kategori_adi" class="w-full border-gray-300 rounded-lg" required></div>
                <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Açıklama (TR)</label><textarea name="aciklama" rows="2" class="w-full border-gray-300 rounded-lg"></textarea></div>
            </div>
            <div class="lang-tab-new hidden" data-lang="en">
                <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Category Name (EN)</label><input type="text" name="en_kategori_adi" class="w-full border-gray-300 rounded-lg"></div>
                <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Description (EN)</label><textarea name="en_aciklama" rows="2" class="w-full border-gray-300 rounded-lg"></textarea></div>
            </div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Üst Kategori</label><select name="ust_id" class="w-full border-gray-300 rounded-lg"><option value="">Yok</option><?php $__currentLoopData = $ustKategoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($ust->id); ?>"><?php echo e($ust->kategori_adi); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="mb-3"><label class="block text-sm font-medium text-gray-700 mb-1">Sıra</label><input type="number" name="sira" value="0" class="w-24 border-gray-300 rounded-lg"></div>
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">Ekle</button>
        </form>
    </div>
    <div class="bg-white rounded-xl border overflow-hidden">
        <div class="p-4 border-b"><h3 class="font-semibold text-gray-900">Mevcut Kategoriler</h3></div>
        <div class="divide-y">
            <?php $__currentLoopData = $kategoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="font-medium text-gray-900"><?php echo e($kategori->kategori_adi); ?></span>
                            <?php if($kategori->ustKategori): ?><span class="text-xs text-gray-400 ml-2">→ <?php echo e($kategori->ustKategori->kategori_adi); ?></span><?php endif; ?>
                            <?php if(isset($kategori->translations['en']['kategori_adi'])): ?>
                                <span class="text-xs text-orange-500 ml-2">EN: <?php echo e($kategori->translations['en']['kategori_adi']); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="openEdit(<?php echo e($kategori->id); ?>)" class="text-blue-500 hover:text-blue-600 text-sm"><i class="fas fa-edit"></i></button>
                            <form action="<?php echo e(route('admin.kategori-sil', $kategori->id)); ?>" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-500 hover:text-red-600 text-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    <div id="editForm-<?php echo e($kategori->id); ?>" class="hidden mt-4 pt-4 border-t">
                        <form action="<?php echo e(route('admin.kategori-guncelle', $kategori->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="flex gap-2 mb-3">
                                <button type="button" data-lang="tr" class="lang-btn-<?php echo e($kategori->id); ?> text-xs px-3 py-1.5 rounded bg-orange-500 text-white font-medium" onclick="switchTab('tr', <?php echo e($kategori->id); ?>)">TR</button>
                                <button type="button" data-lang="en" class="lang-btn-<?php echo e($kategori->id); ?> text-xs px-3 py-1.5 rounded bg-gray-100 text-gray-600 font-medium" onclick="switchTab('en', <?php echo e($kategori->id); ?>)">EN</button>
                            </div>
                            <div class="lang-tab-<?php echo e($kategori->id); ?>" data-lang="tr">
                                <div class="mb-2"><label class="block text-xs font-medium text-gray-600">Kategori Adı (TR)</label><input type="text" name="kategori_adi" value="<?php echo e($kategori->kategori_adi); ?>" class="w-full border-gray-300 rounded-lg text-sm" required></div>
                                <div class="mb-2"><label class="block text-xs font-medium text-gray-600">Açıklama (TR)</label><textarea name="aciklama" rows="2" class="w-full border-gray-300 rounded-lg text-sm"><?php echo e($kategori->aciklama); ?></textarea></div>
                            </div>
                            <div class="lang-tab-<?php echo e($kategori->id); ?> hidden" data-lang="en">
                                <div class="mb-2"><label class="block text-xs font-medium text-gray-600">Category Name (EN)</label><input type="text" name="en_kategori_adi" value="<?php echo e($kategori->translations['en']['kategori_adi'] ?? ''); ?>" class="w-full border-gray-300 rounded-lg text-sm"></div>
                                <div class="mb-2"><label class="block text-xs font-medium text-gray-600">Description (EN)</label><textarea name="en_aciklama" rows="2" class="w-full border-gray-300 rounded-lg text-sm"><?php echo e($kategori->translations['en']['aciklama'] ?? ''); ?></textarea></div>
                            </div>
                            <div class="mb-2"><label class="block text-xs font-medium text-gray-600">Sıra</label><input type="number" name="sira" value="<?php echo e($kategori->sira); ?>" class="w-24 border-gray-300 rounded-lg text-sm"></div>
                            <button type="submit" class="bg-orange-500 text-white px-4 py-1.5 rounded-lg text-xs font-medium hover:bg-orange-600">Güncelle</button>
                            <button type="button" onclick="openEdit(<?php echo e($kategori->id); ?>)" class="ml-2 text-gray-500 text-xs">İptal</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/admin/kategoriler.blade.php ENDPATH**/ ?>