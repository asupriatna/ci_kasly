<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'trn_transaction_date', 
        'trn_account_id', 
        'trn_amount', 
        'type', 
        'trn_description', 
        'trn_created_by', 
        'trn_updated_by', 
        'trn_guid'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'trn_created_at';
    protected $updatedField  = 'trn_updated_at';
}