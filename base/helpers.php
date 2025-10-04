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
?>