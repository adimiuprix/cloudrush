<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class PtcModel extends Model
{
    protected $table            = 'Ptc_ads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'title', 'link', 'timer', 'is_vip', 'period'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    public function availableAds(int $userId): array
    {
        $past = time() - 86400;

        return $this->db->table('ptc_ads')
        ->where('views < total_view')
        ->where('status', 'active')
        ->whereNotIn('id', function(BaseBuilder $builder) use ($past, $userId) {
            return $builder->select('ads_id')
                ->from('ptc_histories')
                ->where('claim_time >', $past)
                ->where('user_id', $userId);
        })
        ->orderBy('reward', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function getAllAds(): array
    {
        return $this->findAll();
    }

    public function getAdById(int $id): ?array
    {
        return $this->find($id);
    }

    public function verify($user_id, $ads_id)
    {
        return $this->db->table('ptc_histories')
            ->where('ads_id', $ads_id)
            ->where('user_id', $user_id)
            ->where('claim_time >', time() - 86400)
            ->countAllResults() === 0;
    }

    public function updateUser(int $userId, float $amount): void
    {
        $balance = $this->db->table('users')->select('balance')->where('id', $userId)->get()->getRow()->balance;

        $this->db->table('users')->where('id', $userId)->update([
            'balance'       => $balance + $amount,
        ]);
    }

    public function addView(int $adsId): void
    {
        $this->update($adsId, [
            'views' => new \CodeIgniter\Database\RawSql('views + 1'),
        ]);
    }

    public function setCompleted(int $id)
	{
		return $this->update($id, ['status' => 'completed']);
	}

    public function insertHistory(int $userId, int $adsId, float $amount): void
    {
        $this->db->table('ptc_histories')->insert([
            'user_id'    => $userId,
            'ads_id'      => $adsId,
            'amount'     => $amount,
            'claim_time' => time(),
        ]);
    }
}
