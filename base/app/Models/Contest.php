<?php 

namespace App\Models;

use App\Model;

class Contest extends Model {
    protected $table = 'contests'; //khai báo tên bảng dùng để truy vấn

    public function findAll() {
        $contests = $this->getAll(); //gọi hàm getAll ở trong Model cha để lấy dữ liệu
        
        return $contests; //trả dữ liệu về cho Controller
        // return $this->getAll(); //cách viết rút gọn
    }

    public function findOne($id) {
        $contest = $this->getOne($id);

        return $contest;
    } 
}

?>