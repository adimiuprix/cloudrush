<?php

namespace App\Http\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class WebhookController extends BaseController
{
    use ResponseTrait;

    public function webhook()
    {
        $jsonData = $this->request->getJSON(true);
        // Periksa jika data webhook valid
        if (isset($jsonData['type']) && $jsonData['type'] === 'ApiDeposit') {
        }

        // Jika format tidak sesuai
        return $this->fail('Invalid webhook data', 400);
    }

    /**
     * Verifikasi signature dengan HMAC SHA256
     *
     * @param string $content Konten request body
     * @param string $signature Signature dari header
     * @param string $app_id ID aplikasi
     * @param string $app_secret Secret aplikasi
     * @param string $timestamp Timestamp dari header
     * @return bool
     */
    private function verifySignature($content, $signature, $app_id, $app_secret, $timestamp)
    {
        // Concatenate app_id, timestamp, dan content untuk membuat sign_text
        $sign_text = empty($content) ? $app_id . $timestamp : $app_id . $timestamp . $content;

        // HMAC SHA256 dengan app_secret
        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        // Cek apakah signature dari server sama dengan yang diterima
        return hash_equals($server_sign, $signature);
    }
}
