<?php

use Dotenv\Dotenv;

session_start();

require 'vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load(); //tải thông tin từ file .env

require 'routers/index.php';
?>
