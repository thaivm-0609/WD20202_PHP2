<?php 

use eftec\bladeone\BladeOne; 

if (!function_exists('view')) { //nếu chưa có hàm view thì tạo hàm 
    function view($view, $data=[]) {
        $views = __DIR__ . '/views'; //đường dẫn lưu trữ file giao diện
        $cache = __DIR__ . '/storages'; //đường dẫn lưu trữ file cache
        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
        
        echo $blade->run($view, $data); //$view: file giao diện được hiển thị ra
    }
}

if (!function_exists('redirect')) {
    function redirect($path) {
        header('Location: ' .$path);
        exit;
    }
}

if (!function_exists('notFound')) {
    function notFound() {
        header('HTTP/1.1 404 Not Found');
        exit;
    }
}

if (!function_exists('middleware_auth')) {
    function middleware_auth() {
        //lấy đường dẫn ng dùng đang truy cập
        $currentUrl = $_SERVER['REQUEST_URI'];
        $adminRegex = '/^\/admin/'; //kiểm tra admin
        $authRegex = '/^\/(login|signin|register|signup)$/'; //kiểm tra trang đăng nhập
    
        //kiểm tra ng dùng đăng nhập hay chưa
        if (empty($_SESSION['user'])) {
            if (preg_match($adminRegex, $currentUrl)) {
                redirect('/login');
            }
        } else { //user đã đăng nhập rồi
            //ko cho vào lại trang đăng ký đăng nhập nữa
            if (preg_match($authRegex, $currentUrl)) {
                redirect('/');
            }

            //check quyền
            if (preg_match($adminRegex, $currentUrl) && $_SESSION['user']['role'] != 1) {
                redirect('/login');
            }
        }
    }
}
?>