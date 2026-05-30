<div class="group luxury-card flex flex-col bg-white card-shine relative">
    <a href="<?php echo e(route('product.detail', $urun->slug)); ?>" class="block">
        <div class="product-card-image relative">
            <?php if($urun->ana_foto): ?>
                <img src="<?php echo e(\App\Services\ImageService::getUrl($urun->ana_foto, 400, 400)); ?>"
                     srcset="<?php echo e(\App\Services\ImageService::getSrcset($urun->ana_foto, [300, 500, 800])); ?>"
                     sizes="(max-width: 640px) 300w, (max-width: 1024px) 500w, 800w"
                     alt="<?php echo e($urun->urun_adi); ?>"
                     class="w-full h-full object-cover"
                     loading="lazy"
                     decoding="async"
                     width="400"
                     height="400">
            <?php else: ?>
                <div class="w-full h-full flex items-center justify-center shimmer"><i class="fas fa-image text-3xl text-dark-300"></i></div>
            <?php endif; ?>
            <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                <?php if($urun->satis_sayisi > 10): ?><span class="badge-gold text-[10px] shadow-sm"><i class="fas fa-fire mr-0.5"></i> Popüler</span><?php endif; ?>
                <?php if($urun->yeni_mi): ?><span class="badge-green text-[10px] shadow-sm"><i class="fas fa-sparkles mr-0.5"></i> Yeni</span><?php endif; ?>
            </div>
            <?php if($urun->stok_durumu == 'tukendi'): ?>
                <div class="absolute inset-0 bg-cream-50/80 backdrop-blur-sm flex items-center justify-center"><span class="bg-dark-900 text-white px-5 py-2 rounded-lg text-xs font-semibold tracking-wider uppercase shadow-lg">Tükendi</span></div>
            <?php endif; ?>
            <?php if($urun->stok_durumu != 'tukendi'): ?>
                <div class="quick-add"><div class="bg-white/95 backdrop-blur-sm rounded-lg px-4 py-3 flex items-center justify-between hover:bg-white transition shadow-lg"><span class="text-xs font-semibold text-dark-700 tracking-wider uppercase"><i class="fas fa-shopping-bag text-gold-500 mr-1.5"></i>Sepete Ekle</span><i class="fas fa-plus text-gold-500 text-xs"></i></div></div>
            <?php endif; ?>
        </div>
    </a>

    <?php if(auth()->guard()->check()): ?>
        <div class="absolute top-3 right-3 z-20">
            <button type="button" onclick="toggleFavori(<?php echo e($urun->id); ?>, this)" class="favori-btn w-9 h-9 flex items-center justify-center rounded-full bg-white shadow-md hover:scale-110 transition-all duration-200 <?php echo e(in_array($urun->id, $favoriIds ?? []) ? 'text-red-500' : 'text-gray-400 hover:text-red-400'); ?>">
                <i class="fa<?php echo e(in_array($urun->id, $favoriIds ?? []) ? 's' : 'r'); ?> fa-heart text-sm"></i>
            </button>
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('product.detail', $urun->slug)); ?>" class="block p-5 md:p-6 flex flex-col flex-1">
        <?php if($urun->magaza): ?><p class="text-[11px] text-dark-400 mb-1.5 hover:text-gold-600 transition-colors truncate font-sans tracking-wider uppercase"><?php echo e($urun->magaza->magaza_adi); ?></p><?php endif; ?>
        <h3 class="font-serif font-semibold text-dark-900 group-hover:text-gold-600 transition-colors text-sm md:text-base leading-snug line-clamp-2 flex-1"><?php echo e($urun->urun_adi); ?></h3>
        <div class="flex items-center gap-2 mt-2">
            <div class="star-rating text-xs"><?php for($i = 1; $i <= 5; $i++): ?><i class="fas fa-star<?php echo e($i <= round($urun->yorum_ortalamasi) ? '' : '-o text-dark-200'); ?>"></i><?php endfor; ?></div>
            <span class="text-xs text-dark-400">(<?php echo e($urun->yorum_sayisi); ?>)</span>
            <span class="text-xs text-dark-300">|</span>
            <span class="text-xs text-dark-400"><i class="fas fa-question-circle mr-0.5"></i><?php echo e($urun->soru_sayisi ?? 0); ?></span>
        </div>
        <div class="flex items-center justify-between mt-3 pt-3 border-t border-dark-50">
            <p class="text-lg font-bold text-gold-600 font-serif"><?php echo e(number_format($urun->fiyat, 2)); ?> <span class="text-xs font-normal font-sans text-dark-400">₺</span>
                <?php if(\App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger') > 0): ?>
                    <span class="text-[10px] text-dark-300 font-sans">KDV Dahil</span>
                <?php endif; ?>
            </p>
            <?php if($urun->teslim_suresi): ?><span class="text-[10px] text-dark-400 font-sans"><i class="fas fa-clock mr-0.5 text-gold-400"></i><?php echo e($urun->teslim_suresi); ?> gün</span><?php endif; ?>
        </div>
    </a>
</div>
<?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/components/urun-card.blade.php ENDPATH**/ ?>