@extends('layouts.app')
@section('title', 'Satıcı Başvurusu')
@section('meta_desc', 'Mağazanı aç, ürünlerini satmaya başla')

@section('content')
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950"></div>
    <div class="absolute inset-0 bg-luxury-pattern opacity-10"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
    <div class="particle" style="--p-x:20%;--p-y:30%;--p-dur:8s;--p-delay:0s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:80%;--p-y:60%;--p-dur:9s;--p-delay:1s;--p-size:2px;--p-color:#e8c566"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="text-center max-w-3xl mx-auto reveal">
            <div class="w-16 h-16 mx-auto bg-gold-500/10 rounded-2xl flex items-center justify-center mb-6 backdrop-blur-sm border border-gold-500/20">
                <i class="fas fa-store text-2xl text-gold-400"></i>
            </div>
            <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-5 leading-tight">
                Mağazanı <span class="gradient-text">Aç</span>
            </h1>
            <p class="text-lg md:text-xl text-dark-400 max-w-2xl mx-auto leading-relaxed">
                Kendi ürünlerini sat, hayalini kurduğun mağazayı kur. Binlerce müşteriye ulaş, işinin patronu ol.
            </p>
        </div>
    </div>
</section>

<section class="relative -mt-16 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-4 reveal">
            <div class="bg-white rounded-2xl p-5 shadow-lg border border-dark-100 text-center">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <span class="text-gold-600 font-bold text-lg">1</span>
                </div>
                <h3 class="font-semibold text-dark-900 text-sm">Başvuru Yap</h3>
                <p class="text-xs text-dark-400 mt-1">Formu doldur, mağazanı oluştur.</p>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-lg border border-dark-100 text-center">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <span class="text-gold-600 font-bold text-lg">2</span>
                </div>
                <h3 class="font-semibold text-dark-900 text-sm">Onay Bekle</h3>
                <p class="text-xs text-dark-400 mt-1">Ekibimiz başvurunu inceler.</p>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-lg border border-dark-100 text-center">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <span class="text-gold-600 font-bold text-lg">3</span>
                </div>
                <h3 class="font-semibold text-dark-900 text-sm">Ürün Ekle</h3>
                <p class="text-xs text-dark-400 mt-1">Ürünlerini yükle, vitrinini hazırla.</p>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-lg border border-dark-100 text-center">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <span class="text-gold-600 font-bold text-lg">4</span>
                </div>
                <h3 class="font-semibold text-dark-900 text-sm">Satışa Başla</h3>
                <p class="text-xs text-dark-400 mt-1">Sipariş al, kazanmaya başla.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <span class="text-gold-500 text-sm tracking-[0.2em] uppercase font-sans font-medium">Neden Satıcı Olmalısın?</span>
            <div class="section-divider mt-3 mb-5"></div>
            <h2 class="text-3xl font-serif font-bold text-dark-900">Avantajlar</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-16 reveal">
            <div class="luxury-card p-6 flex items-start gap-4">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-chart-line text-gold-500"></i></div>
                <div><h3 class="font-semibold text-dark-900 text-sm mb-1">Geniş Müşteri Kitlesi</h3><p class="text-xs text-dark-400 leading-relaxed">Binlerce aktif müşteriye ulaşın. Ürünleriniz milyonlara gösterilsin.</p></div>
            </div>
            <div class="luxury-card p-6 flex items-start gap-4">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-percent text-gold-500"></i></div>
                <div><h3 class="font-semibold text-dark-900 text-sm mb-1">Düşük Komisyon</h3><p class="text-xs text-dark-400 leading-relaxed">Rakiplerine göre daha düşük komisyon oranlarıyla satış yapın.</p></div>
            </div>
            <div class="luxury-card p-6 flex items-start gap-4">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-tools text-gold-500"></i></div>
                <div><h3 class="font-semibold text-dark-900 text-sm mb-1">Kolay Yönetim Paneli</h3><p class="text-xs text-dark-400 leading-relaxed">Ürünlerinizi, siparişlerinizi ve mağazanızı tek panelden yönetin.</p></div>
            </div>
            <div class="luxury-card p-6 flex items-start gap-4">
                <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-headset text-gold-500"></i></div>
                <div><h3 class="font-semibold text-dark-900 text-sm mb-1">7/24 Destek</h3><p class="text-xs text-dark-400 leading-relaxed">Uzman ekibimiz her zaman yanınızda. Tüm sorularınıza hızlı yanıt.</p></div>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-dark-100 p-8 md:p-12 shadow-xl reveal" id="basvuru">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-serif font-bold text-dark-900 mb-3">Başvuru Formu</h2>
                <p class="text-dark-400 text-sm">Aşağıdaki bilgileri doldurun, size en kısa sürede dönüş yapalım.</p>
            </div>

            <form action="{{ route('satici-basvuru.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                @guest
                <div class="bg-gradient-to-r from-gold-50 to-cream-50 rounded-2xl p-6 border border-gold-200/50">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-gold-100 rounded-xl flex items-center justify-center"><i class="fas fa-user-plus text-gold-600"></i></div>
                        <div><p class="font-semibold text-dark-900 text-sm">Hesap Bilgileriniz</p><p class="text-xs text-dark-400">Yeni bir hesap oluşturun veya <a href="{{ route('login') }}" class="text-gold-600 hover:underline">giriş yapın</a></p></div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Ad Soyad <span class="text-red-400">*</span></label>
                            <input type="text" name="ad_soyad" value="{{ old('ad_soyad') }}" class="input-field" required>
                            @error('ad_soyad')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">E-posta <span class="text-red-400">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="input-field" required>
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Şifre <span class="text-red-400">*</span></label>
                            <input type="password" name="password" class="input-field" required minlength="8" placeholder="En az 8 karakter">
                            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>
                @endguest

                <div class="border-t border-dark-100 pt-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-gold-100 rounded-xl flex items-center justify-center"><i class="fas fa-store text-gold-600"></i></div>
                        <div><p class="font-semibold text-dark-900 text-sm">Mağaza Bilgileri</p></div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Mağaza Adı <span class="text-red-400">*</span></label>
                            <input type="text" name="magaza_adi" value="{{ old('magaza_adi') }}" class="input-field" required placeholder="Örn: Elif Tasarım Atölyesi">
                            @error('magaza_adi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Telefon</label>
                            <input type="text" name="telefon" value="{{ old('telefon') }}" class="input-field" placeholder="05XX XXX XX XX">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">E-posta (Mağaza İletişim)</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="input-field" placeholder="Mağazanız için iletişim e-postası">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Şehir</label>
                            <input type="text" name="sehir" value="{{ old('sehir') }}" class="input-field" placeholder="Örn: İstanbul">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Web Sitesi</label>
                            <input type="url" name="website" value="{{ old('website') }}" class="input-field" placeholder="https://">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Slogan</label>
                            <input type="text" name="slogan" value="{{ old('slogan') }}" class="input-field" placeholder="Mağazanızı özetleyen kısa bir slogan" maxlength="200">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Mağaza Açıklaması</label>
                            <textarea name="aciklama" rows="4" class="input-field" placeholder="Mağazanızı tanıtın, hangi ürünleri satacaksınız? Hedef kitleniz kim?">{{ old('aciklama') }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-dark-700 mb-1.5">Adres</label>
                            <textarea name="adres" rows="2" class="input-field" placeholder="Mağazanızın adresi (opsiyonel)">{{ old('adres') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-dark-50 rounded-2xl p-5 border border-dark-100 flex items-start gap-4">
                    <i class="fas fa-shield-alt text-gold-500 mt-0.5"></i>
                    <div class="text-xs text-dark-400 leading-relaxed">
                        <p class="font-medium text-dark-600 mb-1">Başvuru Süreci Hakkında</p>
                        <ul class="space-y-1">
                            <li><i class="fas fa-check text-green-500 mr-1"></i>Başvurunuz 1-2 iş günü içinde değerlendirilir.</li>
                            <li><i class="fas fa-check text-green-500 mr-1"></i>Onaylandıktan sonra satıcı panelinize erişebilirsiniz.</li>
                            <li><i class="fas fa-check text-green-500 mr-1"></i>Ürün eklemek ve satış yapmak tamamen ücretsizdir.</li>
                            <li><i class="fas fa-check text-green-500 mr-1"></i>Detaylı bilgi için <a href="{{ route('faq') }}" class="text-gold-600 hover:underline">SSS</a> sayfamızı ziyaret edebilirsiniz.</li>
                        </ul>
                    </div>
                </div>

                <button type="submit" class="btn-gold w-full justify-center !py-4 !text-base">
                    <i class="fas fa-store"></i> Başvuruyu Gönder
                </button>
            </form>
        </div>
    </div>
</section>
@endsection