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
        return view('auth.login');
    }

    public function signin()
    {
        //lấy dữ liệu từ form
        $data = $_POST;
        
        //tìm user có email mà ng dùng nhập vào form
        $existedUser = $this->user->getUserByEmail($data['email']);
        $checkPass = password_verify($data['password'], $existedUser['password'] ?? null); //kiểm tra password
        
        //check điều kiện đúng &&
        // if ($existedUser && $checkPass) { //nếu tồn tại user và password trùng khớp
        //     $_SESSION['user'] = $existedUser; //lưu người dùng vào trong SESSION
        // } else {
        //     redirect('/login');
        // }

        //check điều kiện sai: ||
        if (empty($existedUser) || !$checkPass) {
            redirect('/login');
        } else {
            $_SESSION['user'] = $existedUser;
            //nếu có quyền admin thì đẩy vào trang admin, ko thì đẩy về trang chủ
            redirect($_SESSION['user']['role'] == 1 ? '/admin' : '/');
        }
    } 

    public function logout() 
    {
        unset($_SESSION['user']); //xóa SESSION 

        redirect('/login');
    }
}
?>