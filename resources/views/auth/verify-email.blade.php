<x-guest-layout>
    <div class="text-center">
        <div class="w-16 h-16 mx-auto bg-gold-100 rounded-2xl flex items-center justify-center mb-6">
            <i class="fas fa-envelope text-2xl text-gold-600"></i>
        </div>
        <h2 class="text-2xl font-serif font-bold text-dark-900 mb-3">E-posta Doğrulaması</h2>
        <p class="text-sm text-dark-500 mb-6">
            Kaydınız tamamlandı! E-posta adresinize bir doğrulama linki gönderdik.
            Linke tıklayarak hesabınızı aktif edebilirsiniz.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm mb-6">
                <i class="fas fa-check-circle mr-1"></i>Yeni bir doğrulama linki e-posta adresinize gönderildi.
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-gold !py-3 !px-6">
                    <i class="fas fa-redo mr-1"></i>Tekrar Gönder
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-dark-400 hover:text-gold-600 transition px-4 py-3">
                    Çıkış Yap
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
