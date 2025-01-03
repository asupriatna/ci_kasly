<?php
namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['rol_name', 'rol_description', 'rol_guid'];
    protected $useTimestamps = true;
    protected $createdField  = 'ety_created_at';
    protected $updatedField  = 'ety_updated_at';

}

