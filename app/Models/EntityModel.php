<?php

namespace App\Models;

use CodeIgniter\Model;

class EntityModel extends Model
{
    protected $table = 'entity';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ety_name', 'ety_referal_code', 'ety_guid'];
    protected $useTimestamps = true;
    protected $createdField  = 'ety_created_at';
    protected $updatedField  = 'ety_updated_at';
}