<?php

use Bramus\Router\Router; //B1: nạp package BramusRouter

//B2: khởi tạo object router từ class Router;
$router = new Router();

require 'admin.php'; //router cho các chức năng bên admin
require 'client.php'; //router cho các chức năng bên client
require 'auth.php'; //router cho chức năng xác thực

//B4: thực thi $router
$router->run();
?>