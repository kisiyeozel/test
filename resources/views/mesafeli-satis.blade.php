@extends('layouts.app')

@section('title', 'Mesafeli Satış Sözleşmesi')
@section('meta_desc', 'Kişiye Özel - 6502 sayılı Tüketicinin Korunması Hakkında Kanun kapsamında mesafeli satış sözleşmesi, cayma hakkı ve iade koşulları.')

@section('content')
<div class="bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950 border-b border-gold-500/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="flex items-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-400 text-sm tracking-[0.2em] uppercase font-sans font-medium">Yasal</span>
        </div>
        <h1 class="section-title text-white">Mesafeli Satış Sözleşmesi</h1>
        <p class="section-subtitle text-dark-300">6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği'ne uygun olarak hazırlanmıştır.</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="luxury-card p-8 md:p-12 space-y-10">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-store text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">1. Satıcı ve Alıcı Bilgileri</h2>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="bg-cream-50 rounded-xl p-5 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2 mb-3"><i class="fas fa-store text-gold-500"></i> Satıcı Bilgileri</h4>
                        <div class="space-y-2 text-sm text-dark-500">
                            <p><span class="font-medium text-dark-700">Ünvan:</span> Kisiyeozel Online Mağazacılık</p>
                            <p><span class="font-medium text-dark-700">Adres:</span> İstanbul, Türkiye</p>
                            <p><span class="font-medium text-dark-700">E-posta:</span> info@kisiyeozel.org</p>
                            <p><span class="font-medium text-dark-700">Telefon:</span> 0850 000 00 00</p>
                        </div>
                    </div>
                    <div class="bg-cream-50 rounded-xl p-5 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2 mb-3"><i class="fas fa-user text-gold-500"></i> Alıcı Bilgileri</h4>
                        <div class="space-y-2 text-sm text-dark-500">
                            <p><span class="font-medium text-dark-700">Ad Soyad:</span> Sipariş sırasında belirtilen bilgiler</p>
                            <p><span class="font-medium text-dark-700">Adres:</span> Sipariş sırasında belirtilen teslimat adresi</p>
                            <p><span class="font-medium text-dark-700">E-posta:</span> Sipariş sırasında belirtilen e-posta adresi</p>
                            <p><span class="font-medium text-dark-700">Telefon:</span> Sipariş sırasında belirtilen telefon numarası</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-file-invoice text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">2. Sözleşme Konusu</h2>
                <p class="text-dark-500 leading-relaxed">İşbu sözleşme, Alıcı'nın Satıcı'ya ait kisiyeozel.org platformu üzerinden elektronik ortamda sipariş verdiği ürün/ürünlerin satışı ve teslimatı ile ilgili olarak 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği hükümleri gereğince tarafların hak ve yükümlülüklerini düzenler.</p>
                <p class="text-dark-500 leading-relaxed mt-3">Sözleşmede belirtilen ürün/ürünlerin niteliği, miktarı, fiyatı ve özellikleri sipariş sürecinde Alıcı tarafından görüntülenir ve onaylanır. Siparişin tamamlanmasıyla birlikte Alıcı, işbu sözleşme hükümlerini kabul etmiş sayılır.</p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-truck text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">3. Ürün Teslimatı</h2>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Ürünler, siparişin tamamlanmasını takiben ürün detay sayfasında belirtilen hazırlık süresi içerisinde kargoya verilir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Kişiye özel ürünlerin hazırlanma süresi, ürünün karmaşıklığına ve üretim yoğunluğuna bağlı olarak değişiklik gösterebilir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Teslimat, Alıcı'nın belirttiği adrese kargo firması aracılığıyla gerçekleştirilir. Kargo teslim süreleri firmaya ve bölgeye göre değişiklik gösterebilir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>500 TL ve üzeri alışverişlerde kargo ücretsizdir. 500 TL altı alışverişlerde kargo ücreti 49.90 TL'dir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Alıcı, teslimat sırasında ürünü kontrol etmekle yükümlüdür. Hasarlı ürün teslim alınmamalı, kargo firmasına tutanak tutturulmalıdır.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-undo text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">4. Cayma Hakkı</h2>
                <div class="bg-red-50 border border-red-200 rounded-xl p-5 mb-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                        <div>
                            <h4 class="font-semibold text-red-800 text-sm">Önemli Bilgi: Kişiselleştirilmiş Ürünler İstisnası</h4>
                            <p class="text-red-600 text-xs mt-1">6502 sayılı Tüketicinin Korunması Hakkında Kanun'un 15. maddesi ve Mesafeli Sözleşmeler Yönetmeliği'nin 15. maddesi uyarınca, tüketicinin isteği doğrultusunda kişiselleştirilen ve bireysel ihtiyaçlara göre hazırlanan ürünlerde <strong>cayma hakkı bulunmamaktadır</strong>.</p>
                        </div>
                    </div>
                </div>
                <p class="text-dark-500 leading-relaxed mb-4">Cayma hakkı ile ilgili genel düzenlemeler:</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Standart (kişiselleştirilmemiş) ürünler için Alıcı, ürünü teslim aldığı tarihten itibaren <strong>14 (on dört) gün</strong> içinde cayma hakkını kullanabilir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Cayma hakkının kullanılması için Alıcı'nın, bu iradesini info@kisiyeozel.org adresine e-posta göndererek veya Platform üzerinden bildirmesi yeterlidir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Cayma hakkı kullanılan ürünlerin, kullanılmamış, hasarsız ve orijinal ambalajında iade edilmesi gerekmektedir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span><strong class="text-dark-900">Kişiye özel hazırlanan ürünlerde cayma hakkı istisnası uygulanır.</strong> Bu ürünler, size özel hazırlandığından iade veya değişim yapılamaz. Ancak üründe üretim hatası olması durumunda iade kabul edilir.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-credit-card text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">5. Fiyat ve Ödeme</h2>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Ürün fiyatları, sipariş anında geçerli olan fiyatlardır. Tüm fiyatlar TL olarak belirtilmiştir ve KDV dahildir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Ödeme, kredi kartı (Visa, Mastercard, American Express) ile 3D Secure güvenlik sistemi kullanılarak gerçekleştirilir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Kredi kartı bilgileriniz Kesinlikle sistemimizde saklanmaz, doğrudan banka altyapısı üzerinden güvenli bir şekilde işlenir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Siparişin tamamlanabilmesi için ödemenin başarıyla gerçekleştirilmesi gerekmektedir.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-exchange-alt text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">6. İade Koşulları</h2>
                <p class="text-dark-500 leading-relaxed mb-4">Kişiye özel ürünlerin yapısı gereği iade politikamız aşağıdaki şekildedir:</p>
                <div class="grid sm:grid-cols-2 gap-4 mb-4">
                    <div class="bg-cream-50 rounded-xl p-4 border border-green-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-check-circle text-green-600"></i>İade Kabul Edilen Durumlar</h4>
                        <ul class="mt-2 space-y-1.5">
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Üretim hatası veya kusur</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Yanlış ürün gönderimi</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Hasarlı teslimat</li>
                        </ul>
                    </div>
                    <div class="bg-cream-50 rounded-xl p-4 border border-red-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-times-circle text-red-500"></i>İade Kabul Edilmeyen Durumlar</h4>
                        <ul class="mt-2 space-y-1.5">
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Kişiye özel hazırlanan ürünler</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Kullanılmış veya hasar görmüş ürünler</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Fikri vazgeçme (beğenmeme)</li>
                        </ul>
                    </div>
                </div>
                <p class="text-dark-400 text-sm">İade sürecinde, iadenin onaylanması halinde bedel, ödeme yönteminize göre 7-14 iş günü içerisinde iade edilir. İade kargo ücreti, hatalı ürün gönderimi durumunda Satıcı tarafından karşılanır.</p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-gavel text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">7. Yetkili Mahkeme</h2>
                <p class="text-dark-500 leading-relaxed">İşbu sözleşmenin uygulanmasından kaynaklanan uyuşmazlıklarda Türkiye Cumhuriyeti Kanunları uygulanır.</p>
                <ul class="space-y-3 mt-4">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>6502 sayılı Tüketicinin Korunması Hakkında Kanun kapsamındaki uyuşmazlıklarda, Alıcı'nın ikametgahının bulunduğu yerdeki <strong class="text-dark-900">Tüketici Hakem Heyetleri</strong> veya <strong class="text-dark-900">Tüketici Mahkemeleri</strong> yetkilidir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Diğer uyuşmazlıklarda <strong class="text-dark-900">İstanbul (Merkez) Mahkemeleri ve İcra Daireleri</strong> yetkilidir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Para limiti dahilinde Tüketici Hakem Heyeti'ne başvuru zorunludur.</li>
                </ul>
                <div class="mt-6 p-5 bg-gold-50 border border-gold-200 rounded-xl">
                    <p class="text-sm text-dark-600 flex items-start gap-3">
                        <i class="fas fa-info-circle text-gold-500 mt-0.5"></i>
                        <span>Alıcı, siparişi tamamlayarak işbu Mesafeli Satış Sözleşmesi'ni okuduğunu, anladığını ve kabul ettiğini beyan eder.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <p class="text-dark-400 text-sm">Son güncelleme: Mayıs 2026</p>
    </div>
</div>
@endsection
