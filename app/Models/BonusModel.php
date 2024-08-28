<?php

namespace App\Models;

use CodeIgniter\Model;

class BonusModel extends Model
{
    protected $table            = 'bonuses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'amount_bonus', 'status'];
}
