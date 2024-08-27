<?php

namespace App\Models;

use CodeIgniter\Model;

class WithdrawModel extends Model
{
    protected $table            = 'withdraw_histories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'sum_withdraw', 'hash_tx', 'status'];
}
