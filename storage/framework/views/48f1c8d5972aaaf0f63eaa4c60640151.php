
<?php $__env->startSection('title', $yazi->baslik); ?>
<?php $__env->startSection('meta_desc', $yazi->ozet ?? $yazi->baslik); ?>

<?php $__env->startPush('styles'); ?>
<style>
.blog-hero-bg {
    position: relative;
    background: linear-gradient(135deg, #fdf8ed 0%, #f9edcc 50%, #f2d999 100%);
    overflow: hidden;
}
.blog-hero-bg::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(212,168,83,0.15) 0%, transparent 70%);
    border-radius: 50%;
}
.blog-hero-bg::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(212,168,83,0.1) 0%, transparent 70%);
    border-radius: 50%;
}
.blog-hero-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.04;
    background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4a853' fill-opacity='1'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.blog-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-weight: 700;
    letter-spacing: -0.02em;
    line-height: 1.15;
    color: #1a1713;
}
.blog-content {
    font-family: 'Lora', Georgia, serif;
    font-size: 1.125rem;
    line-height: 1.85;
    color: #453e31;
}
.blog-content p { margin-bottom: 1.75rem; }
.blog-content h2 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.875rem;
    font-weight: 700;
    color: #1a1713;
    margin: 2.5rem 0 1.25rem;
    letter-spacing: -0.01em;
}
.blog-content h3 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: #2b2620;
    margin: 2rem 0 1rem;
}
.blog-content ul, .blog-content ol { margin: 1.25rem 0 1.75rem 1.75rem; }
.blog-content li { margin-bottom: 0.625rem; }
.blog-content img { border-radius: 0.75rem; margin: 2rem 0; box-shadow: 0 8px 24px rgba(0,0,0,0.08); }
.blog-content a { color: #d4a853; text-decoration: underline; text-underline-offset: 2px; }
.blog-content blockquote {
    border-left: 4px solid #d4a853;
    padding: 1rem 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: #5f5645;
    background: #fdf8ed;
    border-radius: 0 0.5rem 0.5rem 0;
}
.blog-content table { width: 100%; border-collapse: collapse; margin: 2rem 0; }
.blog-content th, .blog-content td { border: 1px solid #e8e5df; padding: 0.875rem; text-align: left; }
.blog-content th { background: #f9f6f0; font-weight: 600; font-family: 'Inter', sans-serif; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em; color: #5f5645; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('schemas'); ?>
<script type="application/ld+json">
<?php
$blogSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $yazi->baslik,
    'description' => $yazi->ozet ?? $yazi->baslik,
    'image' => $yazi->foto ? asset('storage/blog/' . $yazi->foto) : 'https://picsum.photos/seed/' . $yazi->id . '/1200/600',
    'datePublished' => $yazi->created_at->toIso8601String(),
    'dateModified' => $yazi->updated_at->toIso8601String(),
    'author' => [
        '@type' => 'Person',
        'name' => $yazi->kullanici->ad_soyad ?? 'kisiyeozel.org',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'kisiyeozel.org',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('img/logo.png'),
        ],
    ],
];
?>
<?php echo json_encode($blogSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="blog-hero-bg border-b">
    <div class="blog-hero-pattern"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <nav class="flex items-center gap-2 text-sm text-dark-400 mb-6">
            <a href="<?php echo e(route('blog')); ?>" class="hover:text-gold-600 transition"><i class="fas fa-arrow-left mr-1"></i>Blog</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-300"></i>
            <span class="text-dark-900 font-medium truncate"><?php echo e($yazi->baslik); ?></span>
        </nav>
        <div class="flex items-center gap-4 mb-5">
            <span class="px-3 py-1 bg-white/60 backdrop-blur-sm text-xs font-semibold text-gold-700 rounded-full uppercase tracking-wider">Blog</span>
            <span class="text-sm text-dark-400"><i class="far fa-calendar text-gold-500 mr-1"></i><?php echo e($yazi->created_at->format('d.m.Y')); ?></span>
            <span class="text-sm text-dark-400"><i class="far fa-eye text-gold-500 mr-1"></i><?php echo e(number_format($yazi->goruntulenme)); ?> okunma</span>
        </div>
        <h1 class="text-3xl md:text-5xl blog-title"><?php echo e($yazi->baslik); ?></h1>
        <?php if($yazi->ozet): ?>
            <p class="mt-4 text-lg text-dark-500 leading-relaxed max-w-2xl"><?php echo e($yazi->ozet); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="rounded-xl overflow-hidden mb-10 shadow-lg">
        <?php if($yazi->foto): ?>
            <img src="<?php echo e(asset('storage/blog/' . $yazi->foto)); ?>"
                 class="w-full h-auto object-cover"
                 loading="eager"
                 style="max-height: 500px;">
        <?php else: ?>
            <img src="https://picsum.photos/seed/<?php echo e($yazi->id); ?>/1200/600"
                 class="w-full h-auto object-cover"
                 loading="eager"
                 style="max-height: 500px;">
        <?php endif; ?>
    </div>
    <article class="blog-content">
        <?php echo clean($yazi->icerik); ?>

    </article>

    
    <div class="mt-16 pt-10 border-t border-dark-100">
        <h2 class="text-2xl font-serif font-bold text-dark-900 mb-8">Yorumlar (<?php echo e($yorumlar->count()); ?>)</h2>

        <?php if($yorumlar->count() > 0): ?>
            <div class="space-y-6 mb-12">
                <?php $__currentLoopData = $yorumlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-xl border border-dark-100 p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold-400 to-gold-500 flex items-center justify-center text-white text-sm font-bold shrink-0">
                                <?php echo e(substr($yorum->ad_soyad, 0, 1)); ?>

                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <span class="font-semibold text-dark-900 text-sm"><?php echo e($yorum->ad_soyad); ?></span>
                                    <span class="text-xs text-dark-400"><?php echo e($yorum->created_at->diffForHumans()); ?></span>
                                </div>
                                <p class="text-sm text-dark-600 leading-relaxed"><?php echo e($yorum->yorum); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-10 bg-dark-50/30 rounded-xl border border-dashed border-dark-200 mb-12">
                <i class="far fa-comment-dots text-3xl text-dark-300 mb-3"></i>
                <p class="text-dark-400 text-sm">Henüz yorum yapılmamış. İlk yorumu siz yapın!</p>
            </div>
        <?php endif; ?>

        
        <div class="bg-white rounded-xl border border-dark-100 p-6 md:p-8">
            <h3 class="text-lg font-semibold text-dark-900 mb-6">Yorum Yap</h3>
            <form action="<?php echo e(route('blog.yorum', $yazi->slug)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-dark-700 mb-1.5">Ad Soyad <span class="text-red-400">*</span></label>
                        <input type="text" name="ad_soyad" value="<?php echo e(old('ad_soyad', auth()->user()->ad_soyad ?? '')); ?>" required
                               class="w-full px-4 py-2.5 border border-dark-100 rounded-lg text-sm focus:border-gold-400 focus:ring-2 focus:ring-gold-500/10 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark-700 mb-1.5">E-posta <span class="text-red-400">*</span></label>
                        <input type="email" name="email" value="<?php echo e(old('email', auth()->user()->email ?? '')); ?>" required
                               class="w-full px-4 py-2.5 border border-dark-100 rounded-lg text-sm focus:border-gold-400 focus:ring-2 focus:ring-gold-500/10 transition">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Yorumunuz <span class="text-red-400">*</span></label>
                    <textarea name="yorum" rows="4" required
                              class="w-full px-4 py-2.5 border border-dark-100 rounded-lg text-sm focus:border-gold-400 focus:ring-2 focus:ring-gold-500/10 transition resize-y"><?php echo e(old('yorum')); ?></textarea>
                </div>
                <button type="submit" class="btn-gold">Gönder</button>
            </form>
        </div>
    </div>

    <div class="mt-12 pt-8 border-t border-dark-100 flex items-center justify-between">
        <a href="<?php echo e(route('blog')); ?>" class="btn-outline-gold !py-2.5"><i class="fas fa-arrow-left mr-1"></i>Tüm Yazılar</a>
        <a href="<?php echo e(route('products')); ?>" class="text-sm text-dark-400 hover:text-gold-600 transition">Alışverişe Devam Et <i class="fas fa-arrow-right ml-1"></i></a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/blog-detay.blade.php ENDPATH**/ ?>