<?php $__env->startSection('title', 'Profilim'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl md:text-4xl font-bold text-dark-900 mb-2">Profilim</h1>
    <p class="text-dark-400 mb-8">Hesap bilgilerinizi görüntüleyin ve düzenleyin</p>

    <?php if(session('status') === 'profile-updated'): ?>
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl text-sm mb-6">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shrink-0"><i class="fas fa-check-circle text-green-600"></i></div>
            Profil bilgileriniz başarıyla güncellendi.
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl border border-dark-100 p-6 md:p-8 mb-6">
        <h2 class="text-lg font-bold text-dark-900 mb-6 flex items-center gap-3"><div class="w-10 h-10 bg-gold-50 rounded-xl flex items-center justify-center"><i class="fas fa-image text-gold-500"></i></div>Profil Fotoğrafı</h2>
        <form method="POST" action="<?php echo e(route('profile.update')); ?>" id="avatarForm">
            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
            <input type="hidden" name="avatar" id="selectedAvatar" value="<?php echo e($user->avatar ?? 'avatars/avatar_1.png'); ?>">
            <input type="hidden" name="ad_soyad" value="<?php echo e($user->ad_soyad); ?>">
            <input type="hidden" name="email" value="<?php echo e($user->email); ?>">
            <input type="hidden" name="telefon" value="<?php echo e($user->telefon); ?>">
            <div class="grid grid-cols-4 sm:grid-cols-5 md:grid-cols-6 gap-3">
                <?php $__currentLoopData = ['avatar_1.png','avatar_2.png','avatar_3.png','avatar_4.png','avatar_5.png','avatar_6.png','avatar_7.png','avatar_8.png']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $av): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" onclick="selectAvatar('avatars/<?php echo e($av); ?>', this)" class="avatar-option rounded-xl border-2 p-2 transition-all duration-200 <?php echo e(($user->avatar ?: 'avatars/avatar_1.png') === 'avatars/'.$av ? 'border-gold-500 bg-gold-50 shadow-md shadow-gold-500/10' : 'border-dark-100 hover:border-gold-300 hover:bg-cream-50'); ?>">
                    <img src="<?php echo e(asset('img/avatars/'.$av)); ?>" alt="" class="w-full aspect-square rounded-lg object-contain bg-cream-50">
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="flex items-center justify-end mt-6 pt-6 border-t border-dark-100">
                <button type="submit" class="btn-gold px-8 py-3 text-sm"><i class="fas fa-save"></i>Kaydet</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-dark-100 p-6 md:p-8 mb-6">
        <h2 class="text-lg font-bold text-dark-900 mb-6 flex items-center gap-3"><div class="w-10 h-10 bg-gold-50 rounded-xl flex items-center justify-center"><i class="fas fa-user text-gold-500"></i></div>Profil Bilgileri</h2>
        <form method="POST" action="<?php echo e(route('profile.update')); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
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
                    <input type="text" name="telefon" value="<?php echo e(old('telefon', $user->telefon)); ?>" class="input-field">
                </div>
            </div>
            <div class="flex items-center justify-end mt-6 pt-6 border-t border-dark-100">
                <button type="submit" class="btn-gold px-8 py-3 text-sm"><i class="fas fa-save"></i>Kaydet</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-dark-100 p-6 md:p-8">
        <h2 class="text-lg font-bold text-dark-900 mb-6 flex items-center gap-3"><div class="w-10 h-10 bg-gold-50 rounded-xl flex items-center justify-center"><i class="fas fa-lock text-gold-500"></i></div>Şifre Değiştir</h2>
        <form method="POST" action="<?php echo e(route('password.update')); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Mevcut Şifre</label>
                    <input type="password" name="current_password" class="input-field" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Yeni Şifre</label>
                    <input type="password" name="password" class="input-field" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Yeni Şifre Tekrar</label>
                    <input type="password" name="password_confirmation" class="input-field" required>
                </div>
            </div>
            <div class="flex items-center justify-end mt-6 pt-6 border-t border-dark-100">
                <button type="submit" class="btn-gold px-8 py-3 text-sm"><i class="fas fa-key"></i>Şifreyi Güncelle</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
function selectAvatar(file, btn) {
    document.getElementById('selectedAvatar').value = file;
    document.querySelectorAll('.avatar-option').forEach(el => {
        el.classList.remove('border-gold-500', 'bg-gold-50', 'shadow-md', 'shadow-gold-500/10');
        el.classList.add('border-dark-100');
    });
    btn.classList.remove('border-dark-100');
    btn.classList.add('border-gold-500', 'bg-gold-50', 'shadow-md', 'shadow-gold-500/10');
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/profile/edit.blade.php ENDPATH**/ ?>