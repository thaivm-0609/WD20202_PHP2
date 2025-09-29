<?php
//khởi tạo: trait TenTrait {}
trait TraitA {
    //trong trait có thể khai báo biến và hằng số
    public $testBien = 'thaivm2';
    const G = 9.8;

    //trong trait có function
    public function sayHello() {
        //sử dụng biến giả $this->testBien
        //không được gọi trực tiếp $testBien
        echo 'Hello '. $this->testBien .'<br>';
    }
}

trait TraitB {
    public function sayGoodBye() {
        echo "Bye";
    }
}

//trait: khái niệm được đưa ra để mô phỏng "đa kế thừa"
//cú pháp: "use"
//1 class có thể use nhiều trait khác nhau
class ClassCon {
    use TraitA, TraitB;
}

//tạo object mới từ ClassCon;
$object = new ClassCon();
$object->sayHello();
$object->sayGoodBye();
?>
