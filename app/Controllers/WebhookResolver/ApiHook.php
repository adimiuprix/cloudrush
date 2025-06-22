<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;

class ApiHook extends BaseController
{
    public static function getAppIdSecret()
    {
        return [
            'app_id' => "VdS2OWAtAJDTlbpG",
            'app_secret' => "488e69a937c75a5e8565dd4e7874e661",
        ];
    }
}