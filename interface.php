<?php 
interface DaGiac {
    //public $testBien; //trong Interface không chứa thuộc tính (biến)
    const PI = 3.14; //trong Interface chỉ được chứa hằng số

    /**
     * Các function ở trong Interface không cần từ khóa abstract
     * Nhưng class con implements interface thì bắt buộc phải ghi đè lại tất cả 
     * các function ở trong interface
     */
    public function tinhChuVi();
    public function tinhDienTich();
}
class HinhChuNhat implements DaGiac {
    public function tinhChuVi() {
        echo "(a+b)*2";
    }
    public function tinhDienTich() {
        echo "a*b";
    }
}
class HinhVuong implements DaGiac {
    public function tinhChuVi() {
        echo "a*4";
    }
    public function tinhDienTich() {
        echo "a*a";
    }
}
?> 