<?php
//khởi tạo class
// final class SinhVien { :: không cho class khác kế thừa class này
// class SinhVien {
abstract class SinhVien { //có ít nhất 1 abstract function
    public $maSV;
    public $hoTen;
    public $chuyenNganh;
    protected $diemThi; //không truy cập trực tiếp, phải thông qua getter/setter
    const PI = 3.14; //hằng số

    //final dùng cho function => không cho class con ghi đè hàm đó
    //final public function __construct($maSV, $hoTen, $chuyenNganh, $diemThi)
    public function __construct($maSV, $hoTen, $chuyenNganh, $diemThi)
    {
        $this->maSV = $maSV;
        $this->hoTen = $hoTen;
        $this->chuyenNganh = $chuyenNganh;
        $this->diemThi = $diemThi;
    }

    public function getDiemThi() { //getter
        echo $this->diemThi;
    }

    public function setDiemThi($diemThiMoi) { //setter
        $this->diemThi = $diemThiMoi;
    }

    public function getInfo() {
        echo $this->maSV; //truy suất thuộc tính (biến)
        echo $this->hoTen; //truy suất thuộc tính (biến)
        echo $this->chuyenNganh; //truy suất thuộc tính (biến)
        echo $this->diemThi; //truy suất thuộc tính (biến)

        // echo $this->PI; =>lỗi undefined
        // echo self::PI; //truy suất hằng số
    }

    //khai báo hàm trừu tượng: chỉ có khai báo tên, không có xử lý logic
    abstract public function getTienQuyet();
}

//khởi tạo object: $tenObject = new TenClass();
// $kyAnh = new SinhVien();
// $kyAnh->hoTen = 'Hà Kỳ Anh';
// $kyAnh->chuyenNganh = 'Backend';
// $kyAnh->setDiemThi(5); //gán giá trị cho thuộc tính protected thông qua setter
// $kyAnh->getDiemThi(); //lấy thuộc tính protected thông qua getter

class SinhVienBE extends SinhVien {
    public $diemPhp2;

    public function __construct($maSV, $hoTen, $chuyenNganh, $diemThi, $diemPhp2)
    {
        // $this->maSV = $maSV;
        // $this->hoTen = $hoTen;
        // $this->chuyenNganh = $chuyenNganh;
        // $this->diemThi = $diemThi;
        parent::__construct($maSV,$hoTen,$chuyenNganh,$diemThi); //thực thi __construct giống class cha
        $this->diemPhp2 = $diemPhp2; //thêm thuộc tinh diemPhp2 của riêng class con
    }

    public function getInfo() {
        parent::getInfo();
        echo $this->diemPhp2;
    }

    //class con kế thừa lại abstract class cha => bắt buộc phải ghi đè lại abstract function của class cha
    public function getTienQuyet()
    {
        echo "PHP2";
    }
}

//khởi tạo Object từ SinhVienBE
$tienAnh = new SinhVienBE('PH12345', 'Tiến Anh', 'Backend', 0, 5);
$tienAnh->getInfo();
?>
