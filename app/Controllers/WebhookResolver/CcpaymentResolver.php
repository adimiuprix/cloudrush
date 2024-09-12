<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;
use App\Models\DepositModel;
use App\Models\UserPlanHistoryModel;

class CcpaymentResolver extends BaseController
{
    public function resolver()
    {
        $data = $this->request->getJSON(true);
        $type = $data['type'];
        $orderId = $data['msg']['orderId'];
        $status = $data['msg']['status'];

        $deposit_model = new DepositModel();
        $user_plan_history_model = new UserPlanHistoryModel();

        if($type == 'ApiDeposit'){
            switch ($status) {
                case 'Procesing':
                    $order = $deposit_model->where('hash_tx', $orderId)->first();
                    $deposit_model->update($order['id'], ['status' => $status]);
                  break;
                case 'Success':
                    $order = $deposit_model->where('hash_tx', $orderId)->first();
                    $deposit_model->update($order['id'], ['status' => $status]);
                  break;
              }
        }
    }
}


// {
//     "type": "ApiDeposit",
//     "msg": {
//       "recordId": "20240313121919...",
//       "orderId": "202403131218361...",
//       "coinId": 1329,
//       "coinSymbol": "MATIC",
//       "status": "Success"
//     }
//   }