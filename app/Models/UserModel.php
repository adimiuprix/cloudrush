<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserPlanHistoryModel;

class UserModel extends Model
{
    protected $db;
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'user_wallet',
        'balance',
        'total_earn',
        'reff_code',
        'upline_reward',
        'reff_by',
        'last_claim',
        'earning_balance',
        'ip_address',
        'is_banned',
    ];
    protected $user_plan_history;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->user_plan_history = new UserPlanHistoryModel();
    }

    public function getUserByWallet(string $wallet): array|false
    {
        $builder = $this->db->table('users');
        $builder->where('user_wallet', $wallet);
        $query = $builder->get();

        return $query->getFirstRow('array') ?: false;
    }

    function getBalance(array $data): string
    {
        $builder = $this->db->table('user_plan_histories as uph')
                      ->select('uph.id, uph.plan_id, uph.user_id, uph.last_sum, uph.created_at, p.earning_rate')
                      ->join('plans p', 'uph.plan_id = p.id')
                      ->where('uph.user_id', $data['id'])
                      ->where('uph.status', 'active');
        $result = $builder->get()->getResultArray();

        $earning = 0;
        if ($result) {
            $currentTime = time();

            foreach ($result as $value) {
                $lastSum  = $value['last_sum'] ?: strtotime($value['created_at']);
                $second = $currentTime - $lastSum;
                $earning += $second * ($value['earning_rate'] / 60);

                $this->user_plan_history->update($value['id'], ['last_sum' => time()]);
            }
        }

        return number_format($earning, 8, '.', '');
    }

    public function updateBalances(array $session, float $balance): bool
    {
        return $this->set('balance', 'balance + ' . $balance, false)
            ->where('id', $session['id'])
            ->update();
    }

    public function getUserBalance(array $session)
    {
        $result = $this->db->table('users')
            ->select('balance')
            ->where('id', $session['id'])
            ->get()
            ->getRow();

        return $result->balance;
    }

    public function getActivePlans(array $session)
    {
        return $this->user_plan_history
            ->join('plans', 'plans.id = user_plan_histories.plan_id')
            ->where('user_plan_histories.user_id', $session['id'])
            ->where('user_plan_histories.status', 'active')
            ->findAll();
    }
}
