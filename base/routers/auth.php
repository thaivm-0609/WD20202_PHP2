<?php

use App\Controllers\AuthController;

// đăng ký
$router->get('/register', AuthController::class . '@register'); //hiển thị form đăng ký
$router->post('/signup', AuthController::class . '@signup'); //gửi dữ liệu lên đăng ký

//đăng nhập
$router->get('/login', AuthController::class . '@login'); //hiển thị form đăng nhập
$router->post('/signin', AuthController::class . '@signin'); //gửi dữ liệu đăng nhập

$router->get('/logout', AuthController::class . '@logout'); //đăng xuất

?>
