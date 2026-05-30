@extends('layouts.app')

@section('title', 'KVKK & Gizlilik Politikası')
@section('meta_desc', 'Kişiye Özel - 6698 sayılı KVKK kapsamında kişisel verilerin işlenmesi ve gizlilik politikası hakkında detaylı bilgi.')

@section('content')
<div class="bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950 border-b border-gold-500/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="flex items-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-400 text-sm tracking-[0.2em] uppercase font-sans font-medium">Yasal</span>
        </div>
        <h1 class="section-title text-white">KVKK & Gizlilik Politikası</h1>
        <p class="section-subtitle text-dark-300">Kişisel verilerinizin güvenliği bizim için önemlidir. 6698 sayılı KVKK'ya uygun olarak hareket ediyoruz.</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="luxury-card p-8 md:p-12 space-y-10">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-building text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">1. Veri Sorumlusu</h2>
                <p class="text-dark-500 leading-relaxed">
                    6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") uyarınca, kişisel verileriniz; veri sorumlusu olarak kisiyeozel.org tarafından aşağıda açıklanan kapsamda işlenebilecek ve aktarılabilecektir.
                </p>
                <div class="mt-4 bg-cream-50 rounded-xl p-5 border border-gold-100">
                    <p class="text-sm text-dark-600"><span class="font-semibold text-dark-900">Ticari Unvan:</span> Kisiyeozel Online Mağazacılık</p>
                    <p class="text-sm text-dark-600"><span class="font-semibold text-dark-900">Adres:</span> İstanbul, Türkiye</p>
                    <p class="text-sm text-dark-600"><span class="font-semibold text-dark-900">E-posta:</span> info@kisiyeozel.org</p>
                </div>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-tasks text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">2. Kişisel Verilerin İşlenme Amacı</h2>
                <p class="text-dark-500 leading-relaxed mb-4">Kişisel verileriniz aşağıdaki amaçlarla işlenmektedir:</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Siparişlerin alınması, işlenmesi ve teslimatının sağlanması</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Müşteri hizmetleri süreçlerinin yürütülmesi ve taleplerin yanıtlanması</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Hizmet kalitesinin artırılması ve platform deneyiminin kişiselleştirilmesi</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Yasal yükümlülüklerin yerine getirilmesi ve resmi mercilerle iş birliği</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Kampanya, promosyon ve pazarlama faaliyetlerinin yürütülmesi (onayınız dahilinde)</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Ödeme işlemlerinin gerçekleştirilmesi ve fatura düzenlenmesi</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-database text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">3. Hangi Kişisel Veriler Toplanır</h2>
                <p class="text-dark-500 leading-relaxed mb-4">Platformumuzu kullanımınız sırasında aşağıdaki kişisel verileriniz toplanabilir:</p>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-cream-50 rounded-xl p-4 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-user text-gold-500 text-xs"></i>Kimlik Bilgileri</h4>
                        <p class="text-xs text-dark-400 mt-1">Ad, soyad, TC kimlik numarası (gerekli durumlarda)</p>
                    </div>
                    <div class="bg-cream-50 rounded-xl p-4 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-envelope text-gold-500 text-xs"></i>İletişim Bilgileri</h4>
                        <p class="text-xs text-dark-400 mt-1">E-posta adresi, telefon numarası, teslimat adresi</p>
                    </div>
                    <div class="bg-cream-50 rounded-xl p-4 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-credit-card text-gold-500 text-xs"></i>Ödeme Bilgileri</h4>
                        <p class="text-xs text-dark-400 mt-1">Kredi kartı bilgileri (3D secure ile işlenir, saklanmaz)</p>
                    </div>
                    <div class="bg-cream-50 rounded-xl p-4 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-network-wired text-gold-500 text-xs"></i>İşlem Bilgileri</h4>
                        <p class="text-xs text-dark-400 mt-1">IP adresi, tarayıcı bilgileri, site kullanım verileri</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-share-alt text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">4. Kişisel Verilerin Aktarılması</h2>
                <p class="text-dark-500 leading-relaxed mb-4">Kişisel verileriniz, aşağıdaki amaçlarla üçüncü taraflarla paylaşılabilir:</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span><strong class="text-dark-900">Kargo Firmaları:</strong> Siparişlerinizin teslimatı amacıyla ad ve adres bilgileriniz</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span><strong class="text-dark-900">Ödeme Kuruluşları:</strong> Ödeme işlemlerinin gerçekleştirilmesi amacıyla</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span><strong class="text-dark-900">Hukuki Yükümlülükler:</strong> Yetkili kamu kurum ve kuruluşlarına yasal zorunluluk halinde</li>
                </ul>
                <p class="text-dark-400 text-sm mt-4 italic">Kişisel verileriniz, açık rızanız olmaksızın yurt dışına aktarılmaz.</p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-gavel text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">5. KVKK Madde 11 Kapsamında Haklarınız</h2>
                <p class="text-dark-500 leading-relaxed mb-4">KVKK'nın 11. maddesi uyarınca aşağıdaki haklara sahipsiniz:</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">1</span></span>
                        <div><p class="text-sm text-dark-600">Kişisel verinizin işlenip işlenmediğini öğrenme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">2</span></span>
                        <div><p class="text-sm text-dark-600">İşlenmişse buna ilişkin bilgi talep etme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">3</span></span>
                        <div><p class="text-sm text-dark-600">İşlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">4</span></span>
                        <div><p class="text-sm text-dark-600">Yurt içi/yurt dışı aktarılan üçüncü kişileri bilme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">5</span></span>
                        <div><p class="text-sm text-dark-600">Eksik/yanlış işlenmişse düzeltilmesini isteme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">6</span></span>
                        <div><p class="text-sm text-dark-600">KVKK 7. md. kapsamında silinmesini/yok edilmesini isteme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">7</span></span>
                        <div><p class="text-sm text-dark-600">İşlemin münhasıran otomatik sistemlerle analiz edilmesine itiraz etme</p></div>
                    </div>
                    <div class="flex items-start gap-3 bg-cream-50 p-4 rounded-xl">
                        <span class="w-6 h-6 bg-gold-100 rounded-full flex items-center justify-center shrink-0 mt-0.5"><span class="text-gold-600 text-xs font-bold">8</span></span>
                        <div><p class="text-sm text-dark-600">Kanuna aykırı işlenmesi sebebiyle zarara uğramanız halinde tazminat talep etme</p></div>
                    </div>
                </div>
                <div class="mt-6 p-5 bg-gold-50 border border-gold-200 rounded-xl">
                    <p class="text-sm text-dark-600 flex items-start gap-3">
                        <i class="fas fa-pen text-gold-500 mt-0.5"></i>
                        <span>Yukarıda belirtilen haklarınıza ilişkin taleplerinizi, kimliğinizi tespit edecek şekilde <strong class="text-dark-900">info@kisiyeozel.org</strong> adresine e-posta göndererek veya <strong class="text-dark-900">İstanbul, Türkiye</strong> adresine yazılı olarak iletebilirsiniz. Talebiniz en geç 30 (otuz) gün içinde ücretsiz olarak sonuçlandırılacaktır.</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-lock text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">6. Güvenlik Önlemleri</h2>
                <p class="text-dark-500 leading-relaxed mb-4">Kişisel verilerinizin güvenliğini sağlamak amacıyla aşağıdaki teknik ve idari önlemleri almaktayız:</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Tüm veriler 256-bit SSL sertifikası ile şifrelenmektedir</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Ödeme işlemleri PCI DSS standartlarına uygun olarak gerçekleştirilmektedir</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Sunucularımız düzenli güvenlik taramalarından geçirilmektedir</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Personelimiz veri güvenliği konusunda düzenli olarak eğitilmektedir</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Verilere erişim yalnızca yetkili personel ile sınırlandırılmıştır</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <p class="text-dark-400 text-sm">Son güncelleme: Mayıs 2026</p>
    </div>
</div>
@endsection
