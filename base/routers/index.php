<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use Bramus\Router\Router; //B1: nạp package BramusRouter

//B2: khởi tạo object router từ class Router;
$router = new Router();

//B3: khai báo đường dẫn 
//$router->method('url', function);
//có 2 cách để viết function: 
//C1: viết trực tiếp function
// $router->get('/', function () {
//     echo "Hello WD20202";
// });
// $router->get('/home', function () {
//     echo "Đây là trang chủ";
// });
// $router->get('/test', function() {
//     echo "Day la trang test";
// });

//C2: gọi function từ Controller ngoài
//$router->method('url', AbcController::class.'@tenFunction');
$router->get('/', HomeController::class.'@index');
$router->get('/home', HomeController::class.'@home');
$router->get('/test', HomeController::class.'@test');
$router->get('/users', UserController::class.'@index');
$router->get('/users/{id}/type/{typeId}', UserController::class.'@detail');

//B4: thực thi $router
$router->run();
?>