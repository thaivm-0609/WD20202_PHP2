<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function signup()
    {
        $data = $_POST;
        
        if (!$this->user->checkExistEmail($data['email'])) {
            //nếu email chưa tồn tại trong db thì mới lưu
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); //mã hóa password
            $data['role'] = 0; //role 0 là client

            $this->user->insert($data);

            redirect('/login');
        }
    }

    public function login()
    {
        // return view('auth.login');
    }

    public function signin()
    {

    }

    public function logout()
    {

    }
}
?>