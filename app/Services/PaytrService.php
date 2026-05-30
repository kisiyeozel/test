<?php

namespace App\Services;

class PaytrService
{
    protected $merchantId;
    protected $merchantKey;
    protected $merchantSalt;

    public function __construct()
    {
        $this->merchantId = config('paytr.merchant_id');
        $this->merchantKey = config('paytr.merchant_key');
        $this->merchantSalt = config('paytr.merchant_salt');
    }

    public function getIframeUrl($data)
    {
        $userBasket = [];
        foreach ($data['basket'] as $item) {
            $userBasket[] = [$item['ad'], $item['fiyat'], $item['adet']];
        }
        $userBasketJson = json_encode($userBasket);
        $userBasket64 = base64_encode($userBasketJson);

        $hashStr = $this->merchantId
            . $data['user_ip']
            . $data['merchant_oid']
            . $data['email']
            . $data['payment_amount']
            . $userBasket64
            . $data['no_installment']
            . $data['max_installment']
            . $data['currency']
            . $data['test_mode']
            . $this->merchantSalt;

        $paytrToken = base64_encode(hash('sha256', $hashStr . $this->merchantKey, true));

        $postData = [
            'merchant_id' => $this->merchantId,
            'user_ip' => $data['user_ip'],
            'merchant_oid' => $data['merchant_oid'],
            'email' => $data['email'],
            'payment_amount' => $data['payment_amount'],
            'payment_type' => 'card',
            'user_name' => $data['user_name'],
            'user_address' => $data['user_address'],
            'user_phone' => $data['user_phone'],
            'merchant_ok_url' => $data['merchant_ok_url'],
            'merchant_fail_url' => $data['merchant_fail_url'],
            'user_basket' => $userBasket64,
            'no_installment' => $data['no_installment'],
            'max_installment' => $data['max_installment'],
            'currency' => $data['currency'],
            'test_mode' => $data['test_mode'],
            'lang' => $data['lang'] ?? 'tr',
            'paytr_token' => $paytrToken,
        ];

        $ch = curl_init('https://www.paytr.com/odeme/api/get-token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, config('paytr.ssl_verify', true));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);

        if (!$result || !isset($result['status'])) {
            return ['status' => 'error', 'error' => 'PayTR bağlantı hatası'];
        }

        if ($result['status'] == 'success') {
            return ['status' => 'success', 'token' => $result['token']];
        }

        return ['status' => 'error', 'error' => $result['reason'] ?? 'Bilinmeyen hata'];
    }

    public function validateCallback($post)
    {
        $hash = base64_encode(hash('sha256', $post['merchant_oid'] . $this->merchantSalt . $post['status'] . $post['total_amount'] . $this->merchantKey, true));
        return $hash === ($post['hash'] ?? '');
    }
}
