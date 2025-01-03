<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['acc_name', 'acc_type', 'acc_bank_name', 'acc_created_at', 'acc_updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'acc_created_at';
    protected $updatedField  = 'acc_updated_at';
}