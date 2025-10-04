<?php

use App\Controllers\ContestController;
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
// $router->get('/users/{id}/type/{typeId}', UserController::class.'@detail');

$router->get('/contests', ContestController::class.'@index'); //lấy danh sách contest
//thêm mới 
$router->get('/contests/create', ContestController::class.'@create'); //hiển thị ra form thêm mới
$router->post('/contests/store', ContestController::class.'@store'); //đẩy dữ liệu lên và thêm bản ghi
//cập nhật
$router->get('/contests/edit/{id}', ContestController::class.'@edit'); //hiển thị ra form thêm mới
$router->post('/contests/update/{id}', ContestController::class.'@update'); //đẩy dữ liệu lên và thêm bản ghi
$router->get('/contests/detail/{id}', ContestController::class.'@getDetail');//lấy thông tin chi tiết
$router->get('/contests/delete/{id}', ContestController::class.'@delete'); //xóa bản ghi

//B4: thực thi $router
$router->run();
?>