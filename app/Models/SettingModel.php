<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'site_name',
        'keywords',
        'description',
        'start_from',
        'curr_name',
        'curr_code',
        'deposit_method',
        'withdraw_method'
    ];
}
