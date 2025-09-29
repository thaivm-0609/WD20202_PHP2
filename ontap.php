<?php 
/**
 * 4 tính chất của lập trình hướng đối tượng OOP
 * - Kế thừa: một class cha có thuộc tính/phương thức A(), B()
 * => class con extends class cha sẽ sử dụng được thuộc tính/phương thức được khai báo
 * bằng keyword public hoặc protected;
 * 
 * - Đóng gói: 
 * + public: công khai => ai cũng có thể sử dụng được
 * + protected: chỉ có bản thân class đó và class con (đã kế thừa) có thể sử dụng
 * + private: chỉ có bản thân class đó được sử dụng
 * 
 * - Đa hình: overriding
 * 
 * - Trừu tượng
 */

/**
 * 3 quy tắc đặt tên chính: 
 * - camelCase: danhSachSanPham => đặt tên biến/hàm (*)
 * - snake_case: danh_sach_san_pham => đặt tên biến/hàm
 * - PascalCase: DanhSachSanPham => đặt tên class
 */

/** Class: Lớp/tập hợp các đối tượng có đặc điểm chung thuộc tính/phương thức(hành động)
 * Cú pháp: class TenClass {
 *      //thuộc tính: biến chứa thông tin của class
 *      //phương thức: hàm hành động của class
 * }
 * */
class Product {
    //thuộc tính:
    public $name; 
    public $color;
    public $price;
    public $image;

    //__construct: được thực thi ngay khi khởi tạo object từ class
    public function __construct($inputName, $inputColor, $inputPrice)
    {
        //$this->name: truy suất thuộc tính name của class
        $this->name = $inputName; //gán giá trị cho thuộc tính name bằng inputName truyền vào
        $this->color = $inputColor;
        $this->price = $inputPrice;
    }

    //phương thức: 
    public function getProductInfo() { 
        //sử dụng biến giả $this để truy cập vào các thuộc tính ở trong class
        echo $this->name."-".$this->color."-".$this->price;
    }
}

/**
 * Tạo class con kế thừa class cha
 * Cú pháp: class TenClassCon extends TenClassCha
 */
class ProductApple extends Product {

}

//Object: Đối tượng tạo ra dựa trên class có sẵn
// Cú pháp khởi tạo object khi không có __construct: $tenObject = new TenClass();
// $iphone17ProMax = new Product(); 
// $iphone17ProMax->name = 'iPhone 17 Promax'; //Cú pháp truy suất/cập nhật thuộc tính: $tenObject->tenThuocTinh = '...';
// $iphone17ProMax->color = 'silver';
// $iphone17ProMax->price = 30000000;

$iphone17ProMax = new Product('thaivm2', 'gold', 1000);
// $iphone17ProMax->getProductInfo(); //cú pháp gọi hàm ở trong class

// var_dump($iphone17ProMax);
// die;

//khởi tạo object từ class con
$airPod = new ProductApple('airpod pro', 'white', 510000);
?>
