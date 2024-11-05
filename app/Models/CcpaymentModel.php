<?php

namespace App\Models;

use CodeIgniter\Model;

class CcpaymentModel extends Model
{
    protected $table            = 'ccpayments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['coin_id', 'chain', 'app_id', 'app_secret'];
}
