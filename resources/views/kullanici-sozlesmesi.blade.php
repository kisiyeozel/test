@extends('layouts.app')

@section('title', 'Kullanıcı Sözleşmesi')
@section('meta_desc', 'Kişiye Özel - Kullanıcı sözleşmesi, üyelik koşulları, kullanıcı hak ve yükümlülükleri hakkında detaylı bilgi.')

@section('content')
<div class="bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950 border-b border-gold-500/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="flex items-center gap-4 mb-4">
            <div class="gold-line"></div>
            <span class="text-gold-400 text-sm tracking-[0.2em] uppercase font-sans font-medium">Yasal</span>
        </div>
        <h1 class="section-title text-white">Kullanıcı Sözleşmesi</h1>
        <p class="section-subtitle text-dark-300">Platformumuzu kullanırken uymanız gereken kurallar ve haklarınız.</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="luxury-card p-8 md:p-12 space-y-10">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-file-contract text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">1. Taraflar ve Kapsam</h2>
                <p class="text-dark-500 leading-relaxed">
                    İşbu Kullanıcı Sözleşmesi ("Sözleşme"), kisiyeozel.org ("Platform") ile Platform'a üye olan gerçek veya tüzel kişi ("Kullanıcı" veya "Üye") arasında akdedilmiştir. Platform üzerinden sunulan tüm hizmetler bu Sözleşme hükümlerine tabidir.
                </p>
                <div class="mt-4 bg-cream-50 rounded-xl p-5 border border-gold-100">
                    <p class="text-sm text-dark-600"><span class="font-semibold text-dark-900">Platform:</span> kisiyeozel.org (Kisiyeozel Online Mağazacılık)</p>
                    <p class="text-sm text-dark-600"><span class="font-semibold text-dark-900">Adres:</span> İstanbul, Türkiye</p>
                    <p class="text-sm text-dark-600"><span class="font-semibold text-dark-900">E-posta:</span> info@kisiyeozel.org</p>
                </div>
                <p class="text-dark-500 leading-relaxed mt-4">Kullanıcı, Platform'a üye olarak veya Platform'u kullanarak bu Sözleşme'nin tüm hükümlerini kabul etmiş sayılır. Kullanıcı, Sözleşme'yi kabul etmemesi halinde Platform'u kullanmamalıdır.</p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-user-check text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">2. Üyelik Koşulları</h2>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Üyelik başvurusu sırasında verilen bilgilerin doğru, eksiksiz ve güncel olması zorunludur.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>18 yaşından küçükler, yasal vasilerinin onayı olmadan üye olamaz ve alışveriş yapamaz.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Her kullanıcı yalnızca bir hesaba sahip olabilir. Birden fazla hesap açtığı tespit edilen kullanıcıların hesapları kapatılabilir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Kullanıcı, hesap şifresinin gizliliğinden tamamen kendisi sorumludur. Hesabın üçüncü kişilerce kullanımından doğacak zararlardan Platform sorumlu değildir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Platform, üyelik başvurularını onaylama veya reddetme hakkını saklı tutar.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-balance-scale text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">3. Kullanıcı Hak ve Yükümlülükleri</h2>
                <div class="grid sm:grid-cols-2 gap-4 mb-4">
                    <div class="bg-cream-50 rounded-xl p-4 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-check-circle text-green-600 text-xs"></i>Haklar</h4>
                        <ul class="mt-2 space-y-1.5">
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Güvenli alışveriş yapma</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Bilgi ve belge talep etme</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Hesabını yönetme ve düzenleme</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-green-400 rounded-full mt-1.5"></span>Yorum ve değerlendirme yapma</li>
                        </ul>
                    </div>
                    <div class="bg-cream-50 rounded-xl p-4 border border-dark-100">
                        <h4 class="font-semibold text-dark-900 text-sm flex items-center gap-2"><i class="fas fa-times-circle text-red-500 text-xs"></i>Yasaklar</h4>
                        <ul class="mt-2 space-y-1.5">
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Yasa dışı içerik paylaşmak</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Başka kullanıcıları taciz etmek</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Platformu kötüye kullanmak</li>
                            <li class="flex items-start gap-2 text-xs text-dark-500"><span class="w-1 h-1 bg-red-400 rounded-full mt-1.5"></span>Sahte sipariş oluşturmak</li>
                        </ul>
                    </div>
                </div>
                <p class="text-dark-500 text-sm leading-relaxed">Kullanıcı, Platform üzerinden gerçekleştirdiği tüm işlemlerden bizzat sorumludur. Üye, yürürlükteki tüm yasal düzenlemelere uymayı taahhüt eder.</p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-copyright text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">4. Fikri Mülkiyet</h2>
                <p class="text-dark-500 leading-relaxed">Platform üzerinde yer alan tüm içerikler (metin, görsel, logo, ikon, yazılım, tasarım, kod vb.) kisiyeozel.org'a veya ilgili üreticilere/tasarımcılara aittir. Fikri mülkiyet hakları saklıdır.</p>
                <ul class="space-y-3 mt-4">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Platform içerikleri, yazılı izin olmaksızın kopyalanamaz, çoğaltılamaz, dağıtılamaz veya ticari amaçla kullanılamaz.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Satıcılar tarafından yüklenen ürün görselleri ve açıklamalarının fikri mülkiyet hakları ilgili satıcıya aittir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Kullanıcılar tarafından yapılan yorum ve değerlendirmelerin kullanım hakkı Platform'a aittir.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-exclamation-triangle text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">5. Sorumluluğun Sınırlandırılması</h2>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Platform, ürünlerin kişiye özel hazırlanması nedeniyle, ürünlerin bireysel beklentileri karşılayacağına dair garanti vermez. Bu konudaki sorumluluk satıcıya aittir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Platform, mücbir sebepler (deprem, sel, yangın, savaş, terör, grev, pandemi vb.) nedeniyle hizmet yükümlülüklerini yerine getirememekten sorumlu değildir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Platform, kullanıcılar arasındaki uyuşmazlıklarda taraf değildir ve bu uyuşmazlıklardan sorumlu tutulamaz.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Bağlantılı üçüncü taraf sitelerin içerik ve gizlilik uygulamalarından Platform sorumlu değildir.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-door-open text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">6. Fesih</h2>
                <p class="text-dark-500 leading-relaxed">İşbu Sözleşme, kullanıcı Platform'a üye olduğu tarihten itibaren yürürlüğe girer ve üyeliğin sona ermesine kadar geçerlidir.</p>
                <ul class="space-y-3 mt-4">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span><strong class="text-dark-900">Kullanıcı:</strong> Hesabını silerek üyeliğini her zaman sonlandırabilir. Hesap silme işlemi, geçmiş siparişlerin kayıtlarını ortadan kaldırmaz.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span><strong class="text-dark-900">Platform:</strong> Kullanıcının Sözleşme hükümlerine aykırı davranması halinde, önceden bildirim yapmaksızın üyeliği askıya alma veya sonlandırma hakkına sahiptir.</li>
                </ul>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gold-50 rounded-xl flex items-center justify-center shrink-0 mt-1">
                <i class="fas fa-gavel text-gold-500 text-lg"></i>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-bold text-dark-900 mb-3">7. Uyuşmazlıkların Çözümü</h2>
                <p class="text-dark-500 leading-relaxed">İşbu Sözleşme'nin uygulanmasından kaynaklanan veya bununla ilgili her türlü uyuşmazlıkta öncelikle dostane çözüm aranacaktır.</p>
                <ul class="space-y-3 mt-4">
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Uyuşmazlık durumunda <strong class="text-dark-900">Türkiye Cumhuriyeti Kanunları</strong> uygulanır.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>Uyuşmazlığın dostane yolla çözülememesi halinde, <strong class="text-dark-900">İstanbul (Merkez) Mahkemeleri ve İcra Daireleri</strong> yetkilidir.</li>
                    <li class="flex items-start gap-3 text-dark-500"><span class="w-1.5 h-1.5 bg-gold-500 rounded-full mt-2 shrink-0"></span>6502 sayılı Tüketicinin Korunması Hakkında Kanun kapsamında, tüketici işlemleri ile ilgili uyuşmazlıklarda tüketicinin ikametgahının bulunduğu yerdeki tüketici mahkemeleri de yetkilidir.</li>
                </ul>
                <div class="mt-6 p-5 bg-gold-50 border border-gold-200 rounded-xl">
                    <p class="text-sm text-dark-600 flex items-start gap-3">
                        <i class="fas fa-info-circle text-gold-500 mt-0.5"></i>
                        <span>Bu Sözleşme, Platform tarafından her zaman güncellenebilir. Değişiklikler, sitede yayınlandığı tarihten itibaren geçerlilik kazanır. Önemli değişiklikler kullanıcılara e-posta yoluyla bildirilir.</span>
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
