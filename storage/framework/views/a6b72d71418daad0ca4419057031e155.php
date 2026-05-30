

<?php $__env->startSection('title', $urun->urun_adi); ?>
<?php $__env->startSection('meta_desc', $urun->kisa_aciklama ?? $urun->urun_adi); ?>

 <?php $__env->startPush('schemas'); ?>
<script type="application/ld+json">
<?php
$productSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $urun->urun_adi,
    'description' => strip_tags($urun->kisa_aciklama ?? $urun->aciklama),
    'image' => $urun->ana_foto ? asset('storage/' . $urun->ana_foto) : asset('img/no-image.png'),
    'sku' => (string) $urun->id,
    'brand' => [
        '@type' => 'Brand',
        'name' => $urun->magaza->magaza_adi ?? 'kisiyeozel.org',
    ],
    'offers' => [
        '@type' => 'Offer',
        'price' => number_format($urun->fiyat, 2, '.', ''),
        'priceCurrency' => 'TRY',
        'availability' => $urun->stok_durumu == 'var' ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'url' => route('product.detail', $urun->slug),
    ],
];
if ($urun->yorum_sayisi > 0) {
    $productSchema['aggregateRating'] = [
        '@type' => 'AggregateRating',
        'ratingValue' => number_format($urun->yorum_ortalamasi, 1),
        'reviewCount' => $urun->yorum_sayisi,
    ];
}
?>
<?php echo json_encode($productSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <nav class="flex items-center gap-2 text-sm text-dark-400">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-gold-600 transition">Ana Sayfa</a>
            <i class="fas fa-chevron-right text-[10px] text-gray-300"></i>
            <?php if($urun->kategori): ?>
                <a href="<?php echo e(route('category', $urun->kategori->slug)); ?>" class="hover:text-gold-600 transition"><?php echo e($urun->kategori->kategori_adi); ?></a>
                <i class="fas fa-chevron-right text-[10px] text-gray-300"></i>
            <?php endif; ?>
            <span class="text-dark-900 font-medium truncate"><?php echo e($urun->urun_adi); ?></span>
        </nav>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
        
        <div>
            <div class="bg-white rounded-2xl border border-dark-100 overflow-hidden cursor-pointer relative" onclick="openGallery(0)">
                <?php if($urun->ana_foto): ?>
                    <img src="<?php echo e(\App\Services\ImageService::getUrl($urun->ana_foto, 800, 800)); ?>"
                         srcset="<?php echo e(\App\Services\ImageService::getSrcset($urun->ana_foto, [400, 800, 1200])); ?>"
                         sizes="(max-width: 768px) 400w, (max-width: 1200px) 800w, 1200w"
                         alt="<?php echo e($urun->urun_adi); ?>"
                         class="w-full h-auto"
                         loading="eager"
                         decoding="async"
                         width="800"
                         height="800">
                    <div style="position:absolute;inset:0;pointer-events:none;z-index:2;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect width=%22200%22 height=%22200%22 fill=%22none%22/%3E%3Ctext x=%22100%22 y=%22100%22 text-anchor=%22middle%22 dominant-baseline=%22central%22 font-size=%2218%22 font-weight=%22800%22 font-family=%22serif%22 letter-spacing=%223%22 fill=%22%23d4a853%22 opacity=%220.4%22 transform=%22rotate(-35,100,100)%22%3Ekisiyeozel.org%3C/text%3E%3C/svg%3E');background-repeat:repeat;background-size:150px 150px"></div>
                <?php else: ?>
                    <div class="aspect-square flex items-center justify-center"><i class="fas fa-image text-6xl text-gray-200"></i></div>
                <?php endif; ?>
            </div>
            <?php if($urun->gorseller->count() > 0): ?>
                <div class="grid grid-cols-4 gap-3 mt-4">
                    <?php $__currentLoopData = $urun->gorseller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $gorsel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-xl border border-dark-100 overflow-hidden cursor-pointer hover:border-gold-300 transition relative" onclick="openGallery(<?php echo e($i + 1); ?>)">
                            <img src="<?php echo e(\App\Services\ImageService::getUrl($gorsel->dosya_yolu, 150, 150)); ?>"
                                 alt="<?php echo e($urun->urun_adi); ?>"
                                 class="w-full aspect-square object-cover"
                                 loading="lazy"
                                 decoding="async"
                                 width="150"
                                 height="150">
                            <div style="position:absolute;inset:0;pointer-events:none;z-index:2;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22%3E%3Crect width=%22120%22 height=%22120%22 fill=%22none%22/%3E%3Ctext x=%2260%22 y=%2260%22 text-anchor=%22middle%22 dominant-baseline=%22central%22 font-size=%2211%22 font-weight=%22800%22 font-family=%22serif%22 letter-spacing=%222%22 fill=%22%23d4a853%22 opacity=%220.35%22 transform=%22rotate(-35,60,60)%22%3Ekisiyeozel.org%3C/text%3E%3C/svg%3E');background-repeat:repeat;background-size:80px 80px"></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        
        <div>
            <?php if($urun->magaza): ?>
                <a href="<?php echo e(route('magaza.detail', $urun->magaza->slug)); ?>" class="inline-flex items-center gap-2 text-sm text-gold-600 hover:text-gold-700 font-medium mb-3 bg-gold-50 px-3 py-1.5 rounded-full">
                    <i class="fas fa-store"></i><?php echo e($urun->magaza->magaza_adi); ?>

                </a>
            <?php endif; ?>

            <h1 class="text-2xl md:text-3xl font-bold text-dark-900 mb-4"><?php echo e($urun->urun_adi); ?></h1>

            <div class="flex items-center gap-4 mb-6">
                <div class="star-rating">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star<?php echo e($i <= round($urun->yorum_ortalamasi) ? '' : '-o text-gray-200'); ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="text-sm text-dark-400">(<?php echo e($urun->yorum_sayisi); ?> yorum)</span>
                <span class="text-gray-300">|</span>
                <span class="text-sm text-dark-400"><i class="fas fa-question-circle mr-1 text-gold-500"></i><?php echo e($urun->sorular->where('durum', 'yayinda')->count()); ?> soru</span>
                <span class="text-gray-300">|</span>
                <span class="text-sm text-dark-400"><i class="fas fa-shopping-bag mr-1 text-gold-500"></i><?php echo e($urun->satis_sayisi); ?> satış</span>
            </div>

            <div class="flex items-center justify-between mb-6">
                <p class="text-3xl md:text-4xl font-bold text-gold-600"><?php echo e(number_format($urun->fiyat, 2)); ?> <span class="text-sm font-normal">₺</span>
                    <?php $kdv = \App\Models\Ayar::where('anahtar', 'kdv_orani')->value('deger'); ?>
                    <?php if($kdv > 0): ?>
                        <span class="text-xs font-normal text-dark-400 ml-1">(KDV Dahil)</span>
                    <?php endif; ?>
                </p>
                <?php if(auth()->guard()->check()): ?>
                    <button type="button" onclick="toggleFavori(<?php echo e($urun->id); ?>, this)" class="favori-btn flex items-center gap-2 px-4 py-2 rounded-full border text-sm font-medium transition-all duration-200 <?php echo e(in_array($urun->id, $favoriIds ?? []) ? 'bg-red-50 border-red-200 text-red-500' : 'border-dark-200 text-dark-400 hover:border-red-200 hover:text-red-400 hover:bg-red-50'); ?>">
                        <i class="fa<?php echo e(in_array($urun->id, $favoriIds ?? []) ? 's' : 'r'); ?> fa-heart"></i>
                        <span><?php echo e(in_array($urun->id, $favoriIds ?? []) ? 'Favorilerden Çıkar' : 'Favorilere Ekle'); ?></span>
                    </button>
                <?php endif; ?>
            </div>

            <?php if($urun->kisa_aciklama): ?>
                <p class="text-dark-500 mb-6 leading-relaxed"><?php echo e($urun->kisa_aciklama); ?></p>
            <?php endif; ?>

            
            <form action="<?php echo e(route('cart.add')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($urun->id); ?>">

                
                <?php if($urun->kisinin_adi || $urun->fotograf_yukle || $urun->renk_secimi || $urun->olcu_secimi || $urun->ozel_not): ?>
                    <div class="bg-gradient-to-br from-gold-50 to-cream-50 rounded-2xl p-6 mb-6 border border-gold-100">
                        <h3 class="font-semibold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-paint-brush text-gold-500"></i>Kişiselleştirme Seçenekleri</h3>
                        <div class="space-y-4">
                            <?php if($urun->kisinin_adi): ?>
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">İsim / Yazı</label><input type="text" name="kisisellestirme[isim]" placeholder="Yazılmasını istediğiniz isim" class="input-field"></div>
                            <?php endif; ?>
                            <?php if($urun->fotograf_yukle): ?>
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Fotoğraf Yükle</label>
                                    <input type="file" name="kisisellestirme[fotograf]" accept="image/*" class="w-full text-sm text-dark-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gold-50 file:text-gold-700 hover:file:bg-gold-100">
                                </div>
                            <?php endif; ?>
                            <?php if($urun->renk_secimi): ?>
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Renk Seçimi</label>
                                    <div class="flex flex-wrap gap-2.5">
                                        <?php $__currentLoopData = ['#ef4444','#3b82f6','#22c55e','#eab308','#a855f7','#ec4899','#f97316','#6366f1','#14b8a6']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="w-9 h-9 rounded-xl border-2 border-transparent has-[:checked]:border-gold-500 cursor-pointer transition-all hover:scale-110 shadow-sm" style="background:<?php echo e($c); ?>">
                                                <input type="radio" name="kisisellestirme[renk]" value="<?php echo e($c); ?>" class="hidden">
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($urun->olcu_secimi): ?>
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Ölçü / Beden</label>
                                    <select name="kisisellestirme[olcu]" class="input-field w-full">
                                        <option value="">Seçiniz</option>
                                        <?php $__currentLoopData = ['Standart','Small','Medium','Large','X-Large']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $olcu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($olcu); ?>"><?php echo e($olcu); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <?php if($urun->ozel_not): ?>
                                <div><label class="block text-sm font-medium text-dark-700 mb-1.5">Özel Not</label><textarea name="kisisellestirme[ozel_not]" rows="3" placeholder="Satıcıya iletmek istediğiniz not..." class="input-field"></textarea></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                
                <?php if($urun->varyantlar->count() > 0): ?>
                    <div class="mb-6">
                        <h3 class="font-semibold text-dark-900 mb-3">Varyantlar</h3>
                        <div class="flex flex-wrap gap-2">
                            <?php $__currentLoopData = $urun->varyantlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varyant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="px-4 py-2.5 border border-dark-200 rounded-xl text-sm hover:border-gold-400 hover:text-gold-600 transition-all cursor-pointer has-[:checked]:border-gold-500 has-[:checked]:bg-gold-50">
                                    <input type="radio" name="varyant_id" value="<?php echo e($varyant->id); ?>" class="hidden">
                                    <?php echo e($varyant->deger); ?>

                                    <?php if($varyant->fiyat_farki > 0): ?>
                                        <span class="text-gold-500 font-medium">+<?php echo e(number_format($varyant->fiyat_farki, 2)); ?> ₺</span>
                                    <?php endif; ?>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex items-center border border-dark-200 rounded-xl overflow-hidden">
                        <button type="button" onclick="this.parentNode.querySelector('input').stepDown(); this.parentNode.querySelector('input').dispatchEvent(new Event('input'))" class="px-4 py-3 text-dark-400 hover:bg-cream-50 transition font-medium">-</button>
                        <input type="number" name="adet" value="1" min="1" class="w-16 text-center border-x-0 py-3 text-sm font-medium">
                        <button type="button" onclick="this.parentNode.querySelector('input').stepUp(); this.parentNode.querySelector('input').dispatchEvent(new Event('input'))" class="px-4 py-3 text-dark-400 hover:bg-cream-50 transition font-medium">+</button>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="btn-gold w-full justify-center !py-4 shadow-2xl shadow-gold-500/30">
                        <i class="fas fa-shopping-bag"></i> Sepete Ekle
                    </button>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('favori.add', $urun->id)); ?>" onclick="event.preventDefault(); document.getElementById('fav-form').submit();" class="w-14 h-14 border border-dark-200 rounded-xl flex items-center justify-center text-dark-400 hover:text-red-500 hover:border-red-200 hover:bg-red-50 transition-all">
                            <i class="far fa-heart text-xl"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </form>
            <?php if(auth()->guard()->check()): ?>
                <form id="fav-form" action="<?php echo e(route('favori.add', $urun->id)); ?>" method="POST" class="hidden"><?php echo csrf_field(); ?></form>
            <?php endif; ?>

            
            <div class="mt-8 p-5 bg-cream-50 rounded-2xl space-y-3 text-sm">
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span>Teslim Süresi: <strong><?php echo e($urun->teslim_suresi); ?> <?php echo e($urun->teslim_sure_birimi == 'gun' ? 'gün' : 'saat'); ?></strong></span></div>
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span>Stok Durumu: <strong class="<?php echo e($urun->stok_durumu == 'var' ? 'text-green-600' : 'text-red-600'); ?>"><?php echo e($urun->stok_durumu == 'var' ? 'Stokta' : ($urun->stok_durumu == 'tukendi' ? 'Tükendi' : 'Stok Yok')); ?></strong></span></div>
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span><strong>Güvenli Ödeme</strong> — 256-bit SSL ile şifrelenir</span></div>
                <div class="flex items-center gap-3"><div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check text-green-600 text-xs"></i></div><span><strong>İade Garantisi</strong> — Hatalı ürünlerde ücretsiz iade</span></div>
            </div>
        </div>
    </div>

    
    <?php if($urun->aciklama): ?>
        <div class="mt-12 bg-white rounded-2xl border border-dark-100 p-8">
            <h2 class="text-xl font-bold text-dark-900 mb-4 flex items-center gap-2"><i class="fas fa-align-left text-gold-500"></i>Ürün Açıklaması</h2>
            <div class="prose max-w-none text-dark-500 leading-relaxed"><?php echo nl2br(e($urun->aciklama)); ?></div>
        </div>
    <?php endif; ?>

    
    <div class="mt-8 bg-white rounded-2xl border border-dark-100 p-8">
        <h2 class="text-xl font-bold text-dark-900 mb-6 flex items-center gap-2"><i class="fas fa-star text-yellow-500"></i>Yorumlar (<?php echo e($urun->yorum_sayisi); ?>)</h2>
        <?php $__empty_1 = true; $__currentLoopData = $urun->yorumlar->where('durum', 'onayli'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border-b border-dark-100 pb-5 mb-5 last:border-0 last:pb-0 last:mb-0">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden shrink-0<?php echo e($yorum->kullanici->avatar ? '' : ' bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center text-white font-semibold text-sm shadow-sm'); ?>">
                            <?php if($yorum->kullanici->avatar): ?>
                                <img src="<?php echo e(asset('img/'.$yorum->kullanici->avatar)); ?>" alt="" class="w-full h-full object-cover">
                            <?php else: ?>
                                <?php echo e($yorum->kullanici->ad_soyad[0] ?? '?'); ?>

                            <?php endif; ?>
                        </div>
                        <div><p class="font-medium text-dark-900"><?php echo e($yorum->kullanici->ad_soyad ?? 'Anonim'); ?></p><p class="text-xs text-dark-400"><?php echo e($yorum->created_at->diffForHumans()); ?></p></div>
                    </div>
                    <div class="star-rating text-sm">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="fas fa-star<?php echo e($i <= $yorum->puan ? '' : '-o text-gray-200'); ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <p class="text-dark-500 text-sm leading-relaxed"><?php echo e($yorum->yorum); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-10">
                <div class="w-16 h-16 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-comment text-2xl text-gray-300"></i></div>
                <p class="text-dark-400">Henüz yorum yapılmamış. İlk yorumu siz yapın!</p>
            </div>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('yorum.ekle')); ?>" method="POST" class="mt-6 border-t border-dark-100 pt-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="urun_id" value="<?php echo e($urun->id); ?>">
                <h3 class="font-semibold text-dark-900 mb-4">Yorum Yap</h3>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark-700 mb-2">Puanınız</label>
                    <div class="flex gap-1 text-2xl star-rating">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <label class="cursor-pointer"><input type="radio" name="puan" value="<?php echo e($i); ?>" class="hidden"><i class="fas fa-star text-gray-200 hover:text-yellow-400 transition" data-star="<?php echo e($i); ?>"></i></label>
                        <?php endfor; ?>
                    </div>
                </div>
                <textarea name="yorum" rows="4" class="input-field" placeholder="Yorumunuz..." required></textarea>
                <button type="submit" class="btn-gold mt-3">Gönder</button>
            </form>
        <?php endif; ?>
    </div>

    
    <div class="mt-10 border-t border-dark-100 pt-8">
        <h2 class="text-xl font-bold text-dark-900 mb-6 flex items-center gap-2"><i class="fas fa-question-circle text-gold-500"></i>Soru & Cevap</h2>

        <?php if($urun->sorular->where('durum', 'yayinda')->count() > 0): ?>
            <div class="space-y-4 mb-8">
                <?php $__currentLoopData = $urun->sorular->where('durum', 'yayinda'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-2xl border border-dark-100 p-5">
                        <div class="flex items-start gap-3 mb-2">
                            <div class="w-8 h-8 bg-gold-50 rounded-full flex items-center justify-center shrink-0"><i class="fas fa-user text-gold-500 text-xs"></i></div>
                            <div><p class="font-medium text-dark-900 text-sm"><?php echo e($soru->musteri_adi); ?></p><p class="text-xs text-dark-400"><?php echo e($soru->created_at->diffForHumans()); ?></p></div>
                        </div>
                        <p class="text-dark-500 text-sm mb-3 pl-11"><?php echo e($soru->soru); ?></p>
                        <?php if($soru->cevap): ?>
                            <div class="bg-gold-50/50 rounded-xl p-4 ml-11 border border-gold-100/50">
                                <div class="flex items-center gap-2 mb-2"><div class="w-6 h-6 bg-gold-500 rounded-full flex items-center justify-center text-white text-[10px] font-bold">S</div><span class="text-xs font-semibold text-gold-700"><?php echo e($soru->cevaplayan->ad_soyad ?? 'Satıcı'); ?></span></div>
                                <p class="text-dark-600 text-sm"><?php echo e($soru->cevap); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-dark-400 text-sm mb-6">Henüz soru sorulmamış. İlk soruyu siz sorun!</p>
        <?php endif; ?>

        <form action="<?php echo e(route('urun.soru-sor', $urun->id)); ?>" method="POST" class="bg-white rounded-2xl border border-dark-100 p-6">
            <?php echo csrf_field(); ?>
            <h3 class="font-semibold text-dark-900 mb-4">Soru Sor</h3>
            <?php if(auth()->guard()->guest()): ?>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark-700 mb-1.5">Adınız *</label>
                    <input type="text" name="musteri_adi" value="<?php echo e(old('musteri_adi')); ?>" class="input-field" required>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <label class="block text-sm font-medium text-dark-700 mb-1.5">Sorunuz *</label>
                <textarea name="soru" rows="3" class="input-field" placeholder="Ürün hakkında merak ettiklerinizi sorun..." required><?php echo e(old('soru')); ?></textarea>
            </div>
            <button type="submit" class="btn-gold"><i class="fas fa-paper-plane"></i>Gönder</button>
        </form>
    </div>

    
    <?php if(count($benzerUrunler) > 0): ?>
        <div class="mt-12">
            <h2 class="text-xl font-bold text-dark-900 mb-6">Benzer Ürünler</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <?php $__currentLoopData = $benzerUrunler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benzer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.urun-card','data' => ['urun' => $benzer,'favoriIds' => $favoriIds ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('urun-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['urun' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($benzer),'favoriIds' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($favoriIds ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689)): ?>
<?php $attributes = $__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689; ?>
<?php unset($__attributesOriginal61bf99b05b3cd00ece5ada0e0a1ea689); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689)): ?>
<?php $component = $__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689; ?>
<?php unset($__componentOriginal61bf99b05b3cd00ece5ada0e0a1ea689); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    
    <?php $sidebarBanner = \App\Models\Banner::where('aktif', true)->where('pozisyon', 'sidebar')->inRandomOrder()->first(); ?>
    <?php if($sidebarBanner): ?>
        <a href="<?php echo e($sidebarBanner->link ?: '#'); ?>" class="mt-8 block relative overflow-hidden rounded-xl h-40 group">
            <img src="<?php echo e(asset('storage/banner/' . $sidebarBanner->foto)); ?>" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105" alt="<?php echo e($sidebarBanner->baslik); ?>" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-dark-950/70 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4">
                <h3 class="text-white font-serif font-bold text-lg"><?php echo e($sidebarBanner->baslik); ?></h3>
                <?php if($sidebarBanner->alt_baslik): ?><p class="text-gold-300 text-sm"><?php echo e($sidebarBanner->alt_baslik); ?></p><?php endif; ?>
            </div>
        </a>
    <?php endif; ?>
</div>


<div id="productGallery" class="fixed inset-0 hidden" oncontextmenu="return false" style="z-index:99999;background:rgba(10,10,20,0.95);backdrop-filter:blur(8px)">
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative max-w-4xl w-full" style="border:3px solid rgba(212,168,83,0.6);border-radius:20px;padding:6px;background:linear-gradient(135deg,rgba(212,168,83,0.15),rgba(255,255,255,0.05));box-shadow:0 30px 80px rgba(0,0,0,0.6),0 0 60px rgba(212,168,83,0.1)">
            <div style="border-radius:14px;overflow:hidden;position:relative;background:#0a0a14">
                <img id="galleryImg" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain mx-auto" style="filter:drop-shadow(0 0 40px rgba(212,168,83,0.08))" oncontextmenu="return false" ondragstart="return false">
                <div style="position:absolute;inset:0;pointer-events:none;z-index:5;background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect width=%22200%22 height=%22200%22 fill=%22none%22/%3E%3Ctext x=%22100%22 y=%22100%22 text-anchor=%22middle%22 dominant-baseline=%22central%22 font-size=%2222%22 font-weight=%22800%22 font-family=%22serif%22 letter-spacing=%223%22 fill=%22%23d4a853%22 opacity=%220.5%22 transform=%22rotate(-35,100,100)%22%3Ekisiyeozel.org%3C/text%3E%3C/svg%3E');background-repeat:repeat;background-size:200px 200px"></div>
            </div>
        </div>
        
        <div style="position:absolute;top:20px;left:50%;transform:translateX(-50%);background:rgba(212,168,83,0.12);backdrop-filter:blur(12px);border:1px solid rgba(212,168,83,0.25);border-radius:100px;padding:6px 20px;display:flex;align-items:center;gap:10px">
            <span style="color:#d4a853;font-size:12px;font-weight:600;letter-spacing:2px;text-transform:uppercase;font-family:serif">✦ kisiyeozel.org</span>
            <span id="galleryCounter" style="color:rgba(255,255,255,0.5);font-size:11px;font-weight:500"></span>
        </div>
    </div>
    <button onclick="closeGallery()" style="position:absolute;top:20px;right:20px;z-index:30;width:44px;height:44px;background:rgba(255,255,255,0.08);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.1);border-radius:50%;color:#fff;font-size:18px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s" onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'"><i class="fas fa-times"></i></button>
    <button onclick="prevImage()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);z-index:30;width:48px;height:48px;background:rgba(255,255,255,0.06);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.08);border-radius:50%;color:#d4a853;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s" onmouseover="this.style.background='rgba(212,168,83,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="nextImage()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);z-index:30;width:48px;height:48px;background:rgba(255,255,255,0.06);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.08);border-radius:50%;color:#d4a853;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s" onmouseover="this.style.background='rgba(212,168,83,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'"><i class="fas fa-chevron-right"></i></button>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
const galleryImages = [
    '<?php echo e(asset("storage/" . $urun->ana_foto)); ?>',
    <?php $__currentLoopData = $urun->gorseller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        '<?php echo e(asset("storage/" . $g->dosya_yolu)); ?>',
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
].filter(Boolean);
let currentIdx = 0;

function openGallery(idx) {
    currentIdx = idx;
    document.getElementById('productGallery').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    showImage();
}

function closeGallery() {
    document.getElementById('productGallery').classList.add('hidden');
    document.body.style.overflow = '';
}

function showImage() {
    document.getElementById('galleryImg').src = galleryImages[currentIdx];
    document.getElementById('galleryCounter').textContent = (currentIdx + 1) + ' / ' + galleryImages.length;
}

function prevImage() {
    currentIdx = (currentIdx - 1 + galleryImages.length) % galleryImages.length;
    showImage();
}

function nextImage() {
    currentIdx = (currentIdx + 1) % galleryImages.length;
    showImage();
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeGallery();
    if (e.key === 'ArrowLeft') prevImage();
    if (e.key === 'ArrowRight') nextImage();
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\yenideneme\resources\views/product-detail.blade.php ENDPATH**/ ?>