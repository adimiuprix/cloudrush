<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserPlanHistoryModel;

class PlanModel extends Model
{
    protected $table            = 'plans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $user_plan_history;
    protected $allowedFields    = ['plan_name', 'is_free', 'earning_per_day', 'earning_rate', 'price', 'duration', 'profit'];


    public static function plans_cron(array $session){
        $user_plan_history = new UserPlanHistoryModel();

        $plans = $user_plan_history
            ->where('user_id', $session['id'])
            ->where('status', 'active')
            ->where('expire_date IS NOT NULL', null, false)
            ->findAll();

        foreach ($plans as $plan) {
            $now = time();
            $expire_date = strtotime($plan['expire_date']);

            if ($now >= $expire_date) {
                $user_plan_history->update($plan['id'], ['status' => 'inactive']);
            }
        }
    }
}
