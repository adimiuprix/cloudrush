<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;

class CcPaymentWebhook extends BaseController
{
    public function resolver()
    {
        $jsonData = $this->request->getJSON(true);
        $filePath = WRITEPATH . 'data.json';
        file_put_contents($filePath, json_encode($jsonData));
    }
}
