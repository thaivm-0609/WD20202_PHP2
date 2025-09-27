<?php
trait TraitA {

}

trait TraitB {

}

//trait: khái niệm được đưa ra để mô phỏng "đa kế thừa"
//cú pháp: "use"
//1 class có thể use nhiều trait khác nhau
class ClassCon {
    use TraitA, TraitB;
}
?>
