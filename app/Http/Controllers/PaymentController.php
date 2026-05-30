<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use App\Services\PaytrService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paytr;

    public function __construct(PaytrService $paytr)
    {
        $this->paytr = $paytr;
    }

    public function pay($siparisId)
    {
        $siparis = Siparis::with('urunler')->findOrFail($siparisId);

        if ($siparis->kullanici_id !== auth()->id()) {
            abort(403);
        }

        $result = $this->paytr->getIframeUrl([
            'user_ip' => request()->ip(),
            'merchant_oid' => $siparis->siparis_no,
            'email' => $siparis->email,
            'payment_amount' => round($siparis->genel_toplam * 100),
            'user_name' => $siparis->ad_soyad,
            'user_address' => $siparis->adres . ' ' . $siparis->sehir,
            'user_phone' => $siparis->telefon,
            'merchant_ok_url' => route('payment.success'),
            'merchant_fail_url' => route('payment.fail'),
            'basket' => $siparis->urunler->toArray(),
            'no_installment' => '0',
            'max_installment' => '12',
            'currency' => 'TL',
            'test_mode' => config('paytr.test_mode'),
            'lang' => 'tr',
        ]);

        if ($result['status'] !== 'success') {
            return redirect()->route('siparis.detay', $siparis->id)
                ->with('error', 'Ödeme sayfası yüklenemedi: ' . ($result['error'] ?? ''));
        }

        return view('payment', [
            'token' => $result['token'],
            'siparis' => $siparis,
        ]);
    }

    public function success(Request $request)
    {
        if (!$this->paytr->validateCallback($request->all())) {
            abort(403, 'Geçersiz ödeme bildirimi.');
        }

        $siparis = Siparis::where('siparis_no', $request->merchant_oid)->first();
        if ($siparis) {
            $siparis->update(['odeme_durumu' => 'basarili', 'siparis_durumu' => 'hazirlaniyor']);
        }
        return redirect()->route('siparis.detay', $siparis?->id ?? 0)
            ->with('success', 'Ödeme başarıyla tamamlandı!');
    }

    public function fail(Request $request)
    {
        if (!$this->paytr->validateCallback($request->all())) {
            abort(403, 'Geçersiz ödeme bildirimi.');
        }

        $siparis = Siparis::where('siparis_no', $request->merchant_oid)->first();
        if ($siparis) {
            $siparis->update(['odeme_durumu' => 'basarisiz']);
        }
        return redirect()->route('siparis.detay', $siparis?->id ?? 0)
            ->with('error', 'Ödeme başarısız oldu. Lütfen tekrar deneyin.');
    }

    public function callback(Request $request)
    {
        if (!$this->paytr->validateCallback($request->all())) {
            return 'HASH FAILED';
        }

        $siparis = Siparis::where('siparis_no', $request->merchant_oid)->first();
        if ($siparis && $request->status === 'success') {
            $siparis->update(['odeme_durumu' => 'basarili', 'siparis_durumu' => 'hazirlaniyor']);
        }

        return 'OK';
    }
}
