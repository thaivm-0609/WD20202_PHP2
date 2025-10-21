<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;
use Rakit\Validation\Validator;

class AuthController extends Controller {
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
        try {
            $data = $_POST;
        
            //validate data người dùng nhập vào
            $validator = new Validator; //khởi tạo validator từ thư viện
            //tạo biến $errors để lưu trữ lỗi của dữ liệu
            $errors = $this->validate(
                $validator,
                $data,
                [
                    //cú pháp: trường dữ liệu => điều kiện validate
                    'email' => ['required', 'email'], //email không được bỏ trống + đúng định dạng
                    'password' => ['required', 'min:6', 'max:20'], //password không được bỏ trống + tối thiểu 6 ký tự
                ]
            );
            //nếu như có lỗi validate => show thông báo lỗi
            if (!empty($errors)) {
                $_SESSION['status'] = false; 
                $_SESSION['errors'] = $errors;

                redirect('/register'); //đẩy về trang đăng ký
            } else {
                if (!$this->user->checkExistEmail($data['email'])) {
                    //nếu email chưa tồn tại trong db thì mới lưu
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); //mã hóa password
                    $data['role'] = 0; //role 0 là client

                    $this->user->insert($data);

                    redirect('/login');
                }
            }
        } catch (\Throwable $th) {
            
            $_SESSION['status'] = false;
            $_SESSION['errors'] = ["Something went wrong"];
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