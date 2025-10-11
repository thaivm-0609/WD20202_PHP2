<?php

use App\Controllers\Admin\ContestController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\UserController;

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
$router->mount('/admin', function () use ($router) {
    $router->get('/', HomeController::class.'@index');
    $router->get('/home', HomeController::class.'@home');
    $router->get('/test', HomeController::class.'@test');
    $router->get('/users', UserController::class.'@index');
    // $router->get('/users/{id}/type/{typeId}', UserController::class.'@detail');
    $router->mount('/contests', function() use ($router) {
        $router->get('/', ContestController::class.'@index'); //lấy danh sách contest
        //thêm mới 
        $router->get('/create', ContestController::class.'@create'); //hiển thị ra form thêm mới
        $router->post('/store', ContestController::class.'@store'); //đẩy dữ liệu lên và thêm bản ghi
        //cập nhật
        $router->get('/edit/{id}', ContestController::class.'@edit'); //hiển thị ra form thêm mới
        $router->post('/update/{id}', ContestController::class.'@update'); //đẩy dữ liệu lên và thêm bản ghi
        $router->get('/detail/{id}', ContestController::class.'@getDetail');//lấy thông tin chi tiết
        $router->get('/delete/{id}', ContestController::class.'@delete'); //xóa bản ghi
    });
});

?>
