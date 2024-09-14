<?php

namespace App\Models;

use CodeIgniter\Model;

class CollectModel extends Model
{
    protected $table            = 'collet_histories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['user_id', 'date_time'];
}
