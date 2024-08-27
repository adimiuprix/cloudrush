<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPlanHistoryModel extends Model
{
    protected $table            = 'user_plan_histories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'plan_id', 'status', 'last_sum', 'expire_date'];

    public function getActiveUserPlans(int $userId)
    {
        return $this->select('user_plan_histories.*, plans.*')
            ->join('plans', 'plans.id = user_plan_histories.plan_id')
            ->where('user_plan_histories.user_id', $userId)
            ->where('user_plan_histories.status', 'active')
            ->findAll();
    }
}
