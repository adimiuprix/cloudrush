<?php

namespace App\Models;

use CodeIgniter\Model;

class AdsvertModel extends Model
{
    protected $table            = 'adsverts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'title', 'link', 'timer', 'is_vip', 'period'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
