<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usr_username', 'usr_email', 'usr_password', 'usr_email_verified_at', 'usr_remember_token','usr_guid','usr_entity_id','usr_role_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'usr_created_at';
    protected $updatedField  = 'usr_updated_at';
}