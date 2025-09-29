<?php
//khai báo namespace cho class UserController
namespace App\Controllers;

//sử dụng từ khóa use + namespace của class cần nạp vào
use App\Controller;

//đặt biệt danh (alias) bằng từ khóa "as" nhằm 2 mục đích
//+ rút gọn tên class
//+ tránh bị lỗi có 2 class trùng tên nhau  
// use App\Controllers\Admin\ProductController;
// use App\Controllers\Client\ProductController as Client;

class UserController extends Controller {

}
?>