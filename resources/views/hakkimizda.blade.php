@extends('layouts.app')

@section('title', 'Hakkımızda')
@section('meta_desc', 'Kişiye Özel - Türkiye\'nin en özel kişiye özel ürün platformu. Misyonumuz, vizyonumuz ve hikayemiz.')

@section('content')
<div class="bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950 border-b border-gold-500/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="flex items-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-400 text-sm tracking-[0.2em] uppercase font-sans font-medium">Kurumsal</span>
        </div>
        <h1 class="section-title text-white">Hakkımızda</h1>
        <p class="section-subtitle text-dark-300">Her ürün bir hikaye anlatır. Biz hikayenizi en güzel şekilde anlatmak için varız.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
        <div>
            <div class="flex items-center gap-4 mb-4">
                <div class="gold-line"></div>
                <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Hikayemiz</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-dark-900 mb-6">Her Şey Bir <span class="text-gold-500">Hediye</span> Fikriyle Başladı</h2>
            <div class="space-y-4 text-dark-500 leading-relaxed text-base">
                <p>kisiyeozel.org, 2022 yılında birbirinden yetenekli üreticileri ve tasarımcıları bir araya getirme hayaliyle kuruldu. Fark ettik ki en değerli hediyeler, üzerinde düşünülmüş, kişiye özel hazırlanmış olanlardı. Standartlaşmış ürünlerin arasında kaybolan özelliğin peşine düştük.</p>
                <p>Bugün, yüzlerce üreticimizle birlikte binlerce kişiye özel ürünü, Türkiye'nin dört bir yanındaki müşterilerimizle buluşturuyoruz. Her sipariş, bir hikayenin parçası oluyor; her ürün, birinin yüzünde tebessüm oluşturuyor.</p>
                <p>Amacımız, herkesin kendini ifade edebileceği, sevdiklerine anlamlı hediyeler verebileceği bir platform oluşturmak. Özel günlerinizde yanınızda olmak, evinizi ve ofisinizi size özel tasarımlarla süslemenize yardımcı olmak için buradayız.</p>
            </div>
        </div>
        <div class="relative">
            <div class="luxury-card p-8 md:p-12">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-gradient-to-br from-gold-500/20 to-transparent rounded-2xl"></div>
                <div class="relative z-10 space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-bullseye text-gold-500 text-lg"></i></div>
                        <div>
                            <h4 class="font-semibold text-dark-900 font-serif text-lg">Misyonumuz</h4>
                            <p class="text-dark-400 text-sm mt-1">Kişiye özel ürünlerle insanların kendilerini en özel şekilde ifade etmelerini sağlamak, anlamlı hediyelerle bağları güçlendirmek.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-eye text-gold-500 text-lg"></i></div>
                        <div>
                            <h4 class="font-semibold text-dark-900 font-serif text-lg">Vizyonumuz</h4>
                            <p class="text-dark-400 text-sm mt-1">Türkiye'nin en kapsamlı kişiye özel ürün platformu olmak ve herkesin hayalindeki özel ürüne ulaşabildiği bir dünya yaratmak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-16 reveal">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Değerlerimiz</span>
        </div>
        <h2 class="text-3xl md:text-4xl font-serif font-bold text-dark-900">Bizi Biz Yapan <span class="text-gold-500">Değerler</span></h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-24">
        <div class="luxury-card p-6 text-center group hover:-translate-y-1 transition-all duration-300">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-gold-100 to-gold-50 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-medal text-gold-500 text-2xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg mb-2">Kalite</h3>
            <p class="text-dark-400 text-sm leading-relaxed">Her ürün titizlikle kontrol edilir, en yüksek kalite standartlarında üretilir.</p>
        </div>
        <div class="luxury-card p-6 text-center group hover:-translate-y-1 transition-all duration-300">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-gold-100 to-gold-50 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-palette text-gold-500 text-2xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg mb-2">Özgünlük</h3>
            <p class="text-dark-400 text-sm leading-relaxed">Her tasarım size özel hazırlanır, hiçbir ürün bir diğerinin aynısı değildir.</p>
        </div>
        <div class="luxury-card p-6 text-center group hover:-translate-y-1 transition-all duration-300">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-gold-100 to-gold-50 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-shield-alt text-gold-500 text-2xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg mb-2">Güven</h3>
            <p class="text-dark-400 text-sm leading-relaxed">Güvenli ödeme altyapımız ve şeffaf süreçlerimizle içiniz rahat olsun.</p>
        </div>
        <div class="luxury-card p-6 text-center group hover:-translate-y-1 transition-all duration-300">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-gold-100 to-gold-50 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-heart text-gold-500 text-2xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg mb-2">Müşteri Memnuniyeti</h3>
            <p class="text-dark-400 text-sm leading-relaxed">Her adımda yanınızdayız, sorularınıza hızlı cevap verir, çözüm odaklı yaklaşırız.</p>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-24">
        <div class="luxury-card p-8 text-center bg-gradient-to-br from-gold-50 to-cream-50 border-gold-100">
            <div class="text-4xl font-bold font-serif text-gold-500 mb-1" x-data="{ count: 0 }" x-init="setInterval(() => { if(count < 3) count++ }, 100)" x-text="count">3</div>
            <p class="text-dark-400 text-sm font-medium">Yıllık Deneyim</p>
        </div>
        <div class="luxury-card p-8 text-center bg-gradient-to-br from-gold-50 to-cream-50 border-gold-100">
            <div class="text-4xl font-bold font-serif text-gold-500 mb-1">10.000+</div>
            <p class="text-dark-400 text-sm font-medium">Mutlu Müşteri</p>
        </div>
        <div class="luxury-card p-8 text-center bg-gradient-to-br from-gold-50 to-cream-50 border-gold-100">
            <div class="text-4xl font-bold font-serif text-gold-500 mb-1">5.000+</div>
            <p class="text-dark-400 text-sm font-medium">Özel Ürün</p>
        </div>
        <div class="luxury-card p-8 text-center bg-gradient-to-br from-gold-50 to-cream-50 border-gold-100">
            <div class="text-4xl font-bold font-serif text-gold-500 mb-1">200+</div>
            <p class="text-dark-400 text-sm font-medium">Üretici & Tasarımcı</p>
        </div>
    </div>

    <div class="text-center mb-12 reveal">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Ekibimiz</span>
        </div>
        <h2 class="text-3xl md:text-4xl font-serif font-bold text-dark-900">Birlikte <span class="text-gold-500">Çalışıyoruz</span></h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="luxury-card p-6 text-center group">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gold-200 to-gold-100 rounded-full flex items-center justify-center mb-5 group-hover:scale-105 transition-transform duration-300 shadow-lg shadow-gold-500/10">
                <i class="fas fa-user-tie text-gold-500 text-4xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg">Ahmet Yılmaz</h3>
            <p class="text-gold-500 text-sm font-medium">Kurucu & CEO</p>
            <p class="text-dark-400 text-xs mt-2">Hayalperest ve girişimci</p>
        </div>
        <div class="luxury-card p-6 text-center group">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gold-200 to-gold-100 rounded-full flex items-center justify-center mb-5 group-hover:scale-105 transition-transform duration-300 shadow-lg shadow-gold-500/10">
                <i class="fas fa-user-tie text-gold-500 text-4xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg">Ayşe Kaya</h3>
            <p class="text-gold-500 text-sm font-medium">Operasyon Direktörü</p>
            <p class="text-dark-400 text-xs mt-2">Mükemmeliyetçi ve düzen tutkunu</p>
        </div>
        <div class="luxury-card p-6 text-center group">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gold-200 to-gold-100 rounded-full flex items-center justify-center mb-5 group-hover:scale-105 transition-transform duration-300 shadow-lg shadow-gold-500/10">
                <i class="fas fa-user-tie text-gold-500 text-4xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg">Mehmet Demir</h3>
            <p class="text-gold-500 text-sm font-medium">Tasarım Lideri</p>
            <p class="text-dark-400 text-xs mt-2">Estetiğe tutkulu bir tasarımcı</p>
        </div>
        <div class="luxury-card p-6 text-center group">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gold-200 to-gold-100 rounded-full flex items-center justify-center mb-5 group-hover:scale-105 transition-transform duration-300 shadow-lg shadow-gold-500/10">
                <i class="fas fa-user-tie text-gold-500 text-4xl"></i>
            </div>
            <h3 class="font-serif font-semibold text-dark-900 text-lg">Zeynep Şahin</h3>
            <p class="text-gold-500 text-sm font-medium">Müşteri Deneyimi Müdürü</p>
            <p class="text-dark-400 text-xs mt-2">İnsan odaklı çözüm üreticisi</p>
        </div>
    </div>
</div>
@endsection
