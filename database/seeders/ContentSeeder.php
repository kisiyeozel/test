<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Sss;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'baslik' => 'Sevgiliye En Özel Hediye Fikirleri 2026',
                'slug' => 'sevgiliye-en-ozel-hediye-fikirleri',
                'ozet' => 'Sevgilinizi mutlu edecek, onun karakterine ve zevklerine uygun kişiye özel hediye fikirlerini keşfedin.',
                'icerik' => "Sevgilinize alacağınız hediyenin sıradan olmasını istemezsiniz değil mi? İşte tam da bu nedenle kişiye özel hediyeler, sevginizi ifade etmenin en anlamlı yoludur.\n\nÖzel Tasarım Kupa Bardaklar\nSevgilinizin en sevdiği fotoğraf veya sizin için özel bir anlam taşıyan bir görselle tasarlanmış kupa bardaklar, her sabah yüzünde bir tebessüm oluşturacak.\n\nİsim Yazılı Takılar\nAltın veya gümüş üzerine işlenmiş isimler, özel tarihler veya anlamlı mesajlar... Kişiye özel takılar, sevgilinizin her an yanında taşıyacağı bir anı olacak.\n\n Fotoğraf Baskılı Hediyeler\nYastık, battaniye, tablo... Birlikte geçirdiğiniz güzel anıları fotoğraf baskılı ürünlerle somut bir hatıraya dönüştürün.\n\nÖzel Gün Takvimleri\nDoğum günü, yıldönümü veya sadece onu ne kadar sevdiğinizi hatırlatacak özel gün takvimleri, romantik bir hediye alternatifi.\n\nUnutmayın, en değerli hediye üzerinde düşünülmüş ve kişiye özel hazırlanmış olandır. Sevgilinizin gözlerindeki ışıltıyı görmek için hemen kişiselleştirilmiş hediyelere göz atın!",
                'durum' => 'yayinda',
                'goruntulenme' => 0,
                'kullanici_id' => 1,
                'kategori' => 'Hediye Fikirleri',
                'created_at' => '2026-05-10 10:00:00',
            ],
            [
                'baslik' => 'Kişiselleştirilmiş Ürünler Neden Daha Değerli?',
                'slug' => 'kisisellestirilmis-urunler-neden-daha-degerli',
                'ozet' => 'Kişiye özel ürünlerin sıradan hediyelerden farkı nedir? İşte kişiselleştirilmiş ürünlerin özel olmasının 5 nedeni.',
                'icerik' => "Hepimiz sevdiklerimize en güzel hediyeyi vermek isteriz. Peki bir hediyeyi gerçekten değerli kılan nedir? İşte kişiselleştirilmiş ürünlerin bu kadar özel olmasının nedenleri:\n\n1. Eşsiz Olması\nKişiye özel ürünler dünyada sadece bir tane olarak üretilir. Aynısını bir başkasında görmeniz mümkün değildir. Bu eşsizlik, hediyeyi paha biçilmez kılar.\n\n2. Duygusal Bağ\nÜzerinde isim, özel bir tarih veya anlamlı bir mesaj taşıyan ürünler, alıcı ile veren arasında güçlü bir duygusal bağ oluşturur.\n\n3. Düşünülerek Seçilmiş Olması\nKişiye özel bir hediye, onu alan kişi için zaman ve emek harcandığını gösterir. Bu, hediyenin maddi değerinden çok daha önemlidir.\n\n4. Kalıcılık\nÖzel bir tarih veya isim taşıyan ürünler, yıllar geçse bile anlamını kaybetmez. Her bakıldığında o özel anıyı hatırlatır.\n\n5. Özgün Tasarım\nKendi zevkinize ve hayal gücünüze göre tasarlayabileceğiniz ürünler, tamamen size ait bir yaratıcılık ürünüdür.\n\nSiz de sevdiklerinize unutulmaz bir hediye vermek istiyorsanız, kişiye özel ürünler kategorimize göz atabilirsiniz.",
                'durum' => 'yayinda',
                'goruntulenme' => 0,
                'kullanici_id' => 1,
                'kategori' => 'Kişiselleştirme',
                'created_at' => '2026-05-08 10:00:00',
            ],
            [
                'baslik' => 'Anneler Günü İçin En Anlamlı Hediye Önerileri',
                'slug' => 'anneler-gunu-icin-en-anlamli-hediye-onerileri',
                'ozet' => 'Anneler Günü yaklaşırken, annenize verebileceğiniz en özel ve anlamlı kişiye özel hediye fikirleri.',
                'icerik' => "Anneler Günü, hayatımızdaki en özel kadına sevgimizi göstermek için harika bir fırsat. Bu yıl annenize sıradan bir hediye yerine, kişiye özel hazırlanmış anlamlı bir sürpriz yapmaya ne dersiniz?\n\nİsim Yazılı Kolye\nAnnenizin isminin veya sizin isminizin işlendiği şık bir kolye, onun her an yanında taşıyacağı özel bir hatıra olacak.\n\nFotoğraf Baskılı Battaniye\nAile fotoğraflarınızla süslenmiş yumuşacık bir battaniye, annenizin en sevdiği şeylerden biri olacak.\n\nKişiye Özel Takvim\nHer ay farklı bir aile fotoğrafıyla hazırlanmış kişiye özel takvim, annenizin tüm yıl boyunca yüzünü güldürecek.\n\nÖzel Tasarım Kupa\n\"Dünyanın En İyi Annesi\" veya ona özel bir mesajla süslenmiş kupa bardak, kahve keyfine anlam katacak.\n\nAhşap Fotoğraf Baskısı\nAile fotoğrafınızın ahşap üzerine baskısı, evin en güzel köşesinde yer alacak şık bir dekorasyon ürünü.\n\nAnneler Günü'nü unutulmaz kılmak için kişiye özel hediyelerimize göz atmayı unutmayın. Sevgiler, kisiyeozel.org ailesi ❤️",
                'durum' => 'yayinda',
                'goruntulenme' => 0,
                'kullanici_id' => 1,
                'kategori' => 'Özel Günler',
                'created_at' => '2026-05-05 10:00:00',
            ],
            [
                'baslik' => 'Ofis Ortamında Kişiye Özel Ürünlerle Motivasyonu Artırma',
                'slug' => 'ofis-ortaminda-kisiye-ozel-urunlerle-motivasyonu-artirma',
                'ozet' => 'Çalışma arkadaşlarınız ve ekibiniz için kişiselleştirilmiş ofis ürünleriyle motivasyonu ve bağlılığı artırın.',
                'icerik' => "Ofis ortamında motivasyonu ve aidiyet duygusunu artırmanın en yaratıcı yollarından biri kişiye özel ürünlerdir. İşte ofisinizde uygulayabileceğiniz bazı fikirler:\n\nKişiye Özel Termos veya Kupa\nHer çalışanın kendi ismi yazılı termos veya kupa bardak kullanması, hem kişisel alan oluşturur hem de ekip ruhunu güçlendirir.\n\nMasa Aksesuarları\nİsimlikler, masa takvimleri ve not defterleri gibi kişiselleştirilmiş masa aksesuarları, çalışanların kendilerini özel hissetmesini sağlar.\n\nKurumsal Hediyeler\nMüşteri ve iş ortaklarınıza vereceğiniz kişiye özel kurumsal hediyeler, markanızın akılda kalıcılığını artırır.\n\nTakım Ruhu İçin Özel Tasarımlar\nEkip logolu veya takım sloganlı ürünler, çalışanlar arasındaki bağı kuvvetlendirir.\n\nÖdül ve Teşvik Ürünleri\nBaşarılı çalışanlarınızı kişiye özel hazırlanmış plaket, ödül veya hediyelerle onurlandırabilirsiniz.\n\nOfisinizde kişiye özel ürünler kullanarak hem motivasyonu artırabilir hem de çalışanlarınızın kendilerini değerli hissetmesini sağlayabilirsiniz.",
                'durum' => 'yayinda',
                'goruntulenme' => 0,
                'kullanici_id' => 1,
                'kategori' => 'İş & Ofis',
                'created_at' => '2026-04-28 10:00:00',
            ],
            [
                'baslik' => 'Sevgililer Günü Özel: En Romantik Kişiye Özel Hediyeler',
                'slug' => 'sevgililer-gunu-ozel-en-romantik-kisiye-ozel-hediyeler',
                'ozet' => 'Sevgililer Günü için en romantik ve kişiye özel hediye fikirleri. Aşkınızı en özel şekilde ifade edin.',
                'icerik' => "Sevgililer Günü, aşkınızı en güzel şekilde ifade etme zamanı! Bu yıl sevgilinize vereceğiniz hediyeyi unutulmaz kılmak için kişiye özel ürünleri tercih edin.\n\nÖzel Mesajlı Kolye\nİçine sevdiğinizin fotoğrafını veya özel bir mesaj koyabileceğiniz kolye, en romantik hediye seçeneklerinden biri.\n\nBirlikte Fotoğraflarınızla Hazırlanmış Takvim\nHer ay birlikte çekildiğiniz bir fotoğrafla hazırlanmış kişiye özel takvim, tüm yıl ona eşlik edecek.\n\nİsim Yazılı Bileklik\nSevgilinizin isminin veya takma adınızın yazılı olduğu deri veya gümüş bileklik, şık ve anlamlı bir hediye.\n\nÖzel Tasarım Çerçeve\nBirlikte en sevdiğiniz fotoğrafınız için özel tasarlanmış bir çerçeve, evinizin en güzel köşesinde yer alacak.\n\nKişiye Özel Müzik Kutusu\nSevdiğiniz şarkıyı çalan özel bir müzik kutusu, nostaljik ve romantik bir hediye alternatifi.\n\nUnutmayın, en romantik hediyeler sevgiyle düşünülmüş olanlardır. Bu Sevgililer Günü için özel ürünlerimizi keşfedin!",
                'durum' => 'yayinda',
                'goruntulenme' => 0,
                'kullanici_id' => 1,
                'kategori' => 'Özel Günler',
                'created_at' => '2026-04-20 10:00:00',
            ],
            [
                'baslik' => 'Ev Dekorasyonunda Kişisel Dokunuşlar',
                'slug' => 'ev-dekorasyonunda-kisisel-dokunuslar',
                'ozet' => 'Evinizi kişiye özel ürünlerle dekore ederek sıcak ve samimi bir atmosfer yaratmanın yolları.',
                'icerik' => "Eviniz, sizin tarzınızı ve kişiliğinizi yansıtan bir yer olmalı. İşte ev dekorasyonunda kişisel dokunuşlar yapmanız için fikirler:\n\nÖzel Tasarım Yastıklar\nÜzerinde anlamlı sözler, isimler veya özel tarihler yazılı yastıklar, oturma odanıza sıcak bir hava katar.\n\nFotoğraf Baskılı Kanvas Tablolar\nAile fotoğraflarınız veya en sevdiğiniz manzaralarla hazırlanmış kanvas tablolar, duvarlarınızı kişiselleştirir.\n\nKişiye Özel Kapı Süsleri\nEv girişinde sizi ve misafirlerinizi karşılayan özel tasarım kapı süsleri, sıcak bir atmosfer oluşturur.\n\nÖzel Tasarım Mutfak Önlükleri\nKendi sloganınız veya tasarımınızla hazırlanmış mutfak önlükleri, yemek yapmayı daha keyifli hale getirir.\n\nİsim Yazılı Mumluklar\nÖzel günlerinizde kullanabileceğiniz isim yazılı mumluklar, ortama romantik bir hava katar.\n\nEvinizi güzelleştirmek ve kişisel tarzınızı yansıtmak için kişiye özel dekorasyon ürünlerimize göz atabilirsiniz.",
                'durum' => 'yayinda',
                'goruntulenme' => 0,
                'kullanici_id' => 1,
                'kategori' => 'Ev & Dekorasyon',
                'created_at' => '2026-04-15 10:00:00',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        $sss = [
            [
                'soru' => 'Siparişimi nasıl takip edebilirim?',
                'cevap' => 'Siparişiniz kargoya verildiğinde e-posta adresinize bir kargo takip numarası gönderilmektedir. Bu numara ile kargo firmasının web sitesinden siparişinizin durumunu takip edebilirsiniz. Ayrıca "Siparişlerim" sayfasından da sipariş durumunuzu görüntüleyebilirsiniz.',
                'kategori' => 'Sipariş',
                'sira' => 1,
            ],
            [
                'soru' => 'Siparişimi iptal edebilir miyim?',
                'cevap' => 'Siparişiniz henüz hazırlanma aşamasına geçmemişse iptal edebilirsiniz. Ancak kişiye özel ürünlerde üretim süreci başladıktan sonra iptal mümkün olmayabilir. İptal talebiniz için müşteri hizmetlerimizle iletişime geçiniz.',
                'kategori' => 'Sipariş',
                'sira' => 2,
            ],
            [
                'soru' => 'Siparişimde değişiklik yapabilir miyim?',
                'cevap' => 'Siparişiniz henüz hazırlanmaya başlamadıysa, adres, ürün detayı gibi bilgilerde değişiklik yapabilirsiniz. Değişiklik talebiniz için en kısa sürede bizimle iletişime geçmeniz gerekmektedir.',
                'kategori' => 'Sipariş',
                'sira' => 3,
            ],
            [
                'soru' => 'Hangi ödeme yöntemlerini kullanabilirim?',
                'cevap' => 'Kredi kartı (Visa, Mastercard, American Express) ile güvenli ödeme yapabilirsiniz. Tüm ödemeler 256-bit SSL sertifikası ile korunmakta ve 3D Secure doğrulaması ile işlenmektedir. Havale/EFT seçeneği şu an için bulunmamaktadır.',
                'kategori' => 'Ödeme',
                'sira' => 4,
            ],
            [
                'soru' => 'Taksit seçeneği var mı?',
                'cevap' => 'Kredi kartınıza bağlı olarak 3, 6, 9 ve 12 aya varan taksit seçenekleri sunulmaktadır. Taksit sayısı ve faiz oranları, bankanızın kampanyalarına göre değişiklik göstermektedir. Ödeme sayfasında taksit seçeneklerini görebilirsiniz.',
                'kategori' => 'Ödeme',
                'sira' => 5,
            ],
            [
                'soru' => 'Ödeme güvenli mi?',
                'cevap' => 'Kesinlikle! Tüm ödeme işlemleriniz 256-bit SSL sertifikası ile şifrelenmekte ve 3D Secure doğrulaması ile gerçekleştirilmektedir. Kredi kartı bilgileriniz sistemimizde saklanmamakta, doğrudan banka altyapısı üzerinden güvenli bir şekilde işlenmektedir.',
                'kategori' => 'Ödeme',
                'sira' => 6,
            ],
            [
                'soru' => 'Kargo ne kadar sürede teslim edilir?',
                'cevap' => 'Ürünlerimiz kişiye özel hazırlandığı için standart teslimat süresi 3-5 iş günüdür. Ancak ürünün karmaşıklığına ve sipariş yoğunluğuna bağlı olarak bu süre uzayabilir veya kısalabilir. Kesin teslim süresi, ürün detay sayfasında belirtilmektedir.',
                'kategori' => 'Kargo',
                'sira' => 7,
            ],
            [
                'soru' => 'Kargo ücreti ne kadar?',
                'cevap' => '500 TL ve üzeri alışverişlerde kargo ücretsizdir. 500 TL altı alışverişlerde sabit kargo ücreti 49.90 TL\'dir. Kampanyalı dönemlerde kargo ücretinde indirimler uygulanabilmektedir.',
                'kategori' => 'Kargo',
                'sira' => 8,
            ],
            [
                'soru' => 'Kargom hasarlı geldi, ne yapmalıyım?',
                'cevap' => 'Kargonuzu teslim almadan önce mutlaka kontrol ediniz. Hasarlı bir ürün teslim almanız durumunda kargo görevlisine tutanak tutturunuz ve en kısa sürede müşteri hizmetlerimizle iletişime geçiniz. Hasarlı ürünler tarafımıza iletildiğinde en kısa sürede yenisi gönderilecektir.',
                'kategori' => 'Kargo',
                'sira' => 9,
            ],
            [
                'soru' => 'Kişiye özel ürünlerde iade yapabilir miyim?',
                'cevap' => '6502 sayılı Tüketicinin Korunması Hakkında Kanun\'un 15. maddesi uyarınca, size özel hazırlanan kişiselleştirilmiş ürünlerde cayma hakkı bulunmamaktadır. Ancak üründe üretim hatası veya hasar olması durumunda iade kabul edilmektedir.',
                'kategori' => 'İade',
                'sira' => 10,
            ],
            [
                'soru' => 'Standart ürünlerde iade süreci nasıl işler?',
                'cevap' => 'Standart (kişiselleştirilmemiş) ürünlerde teslimattan itibaren 14 gün içinde cayma hakkınız bulunmaktadır. Ürünün kullanılmamış, hasarsız ve orijinal ambalajında iade edilmesi gerekmektedir. İade onaylandıktan sonra ücret 7-14 iş günü içinde iade edilir.',
                'kategori' => 'İade',
                'sira' => 11,
            ],
            [
                'soru' => 'Üyeliğimi nasıl silebilirim?',
                'cevap' => 'Profil sayfanızdan "Hesabımı Sil" seçeneğini kullanarak üyeliğinizi sonlandırabilirsiniz. Hesabınız silindiğinde, geçmiş sipariş kayıtlarınız yasal zorunluluklar nedeniyle sistemimizde saklı kalmaya devam edecektir.',
                'kategori' => 'Üyelik',
                'sira' => 12,
            ],
            [
                'soru' => 'Şifremi unuttum, ne yapmalıyım?',
                'cevap' => 'Giriş sayfasında bulunan "Şifremi Unuttum" bağlantısına tıklayarak e-posta adresinizi giriniz. Kayıtlı e-posta adresinize şifre sıfırlama bağlantısı gönderilecektir. Bu bağlantıya tıklayarak yeni şifrenizi belirleyebilirsiniz.',
                'kategori' => 'Üyelik',
                'sira' => 13,
            ],
            [
                'soru' => 'Satıcı başvurusu nasıl yapılır?',
                'cevap' => 'Sayfamızın üst kısmında bulunan "Satıcı Ol" butonuna tıklayarak başvuru formunu doldurabilirsiniz. Başvurunuz admin ekibimiz tarafından değerlendirilecek ve en kısa sürede size geri dönüş yapılacaktır.',
                'kategori' => 'Satıcı',
                'sira' => 14,
            ],
        ];

        foreach ($sss as $s) {
            Sss::create($s);
        }
    }
}
