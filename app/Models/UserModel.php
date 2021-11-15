<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    
    protected $table = 'users';
    protected $allowedFields = [
        'user_email', 
        'username', 
        'user_password', 
        'user_password_hash', 
        'user_type', 
        'user_date_created', 
        'user_date_modified', 
        'user_img', 
        'user_status', 
        'user_fname', 
        'user_lname'
    ];
}
