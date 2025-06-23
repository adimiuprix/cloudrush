<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;
use App\Controllers\WebhookResolver\ApiHook;

class WebhookActivate extends BaseController
{
    public function handleRequest()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $body = $this->request->getBody();
        $ts = $this->request->getHeaderLine('Timestamp');
        $sign = $this->request->getHeaderLine('Sign');
        $appid = $this->request->getHeaderLine('Appid');

        if ($appid !== $app_id || abs(time() - $ts) > 300)
            return $this->response->setStatusCode(401)->setBody('Invalid AppId or Timestamp');

        if (!$this->verifySignature($appid, $ts, $body, $sign, $app_secret))
            return $this->response->setStatusCode(403)->setBody('Invalid Signature');

        $json = json_decode($body, true);
        if (($json['type'] ?? null) !== 'ActivateWebhookURL')
            return $this->response->setStatusCode(400)->setBody('Invalid Type');

        return $this->response->setJSON(['msg' => 'success']);
    }

    private function verifySignature($appid, $ts, $body, $sign, $secret): bool
    {
        $expected = hash_hmac('sha256', $appid . $ts . $body, $secret);
        return hash_equals($expected, $sign);
    }
}
