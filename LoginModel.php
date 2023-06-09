<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';

    protected $allowedFields = ['Username', 'Password'];

    public function ambil($user) //dipanggil ke controller
    {
        return $this->where(['Username' => $user])->first();
    }
}
