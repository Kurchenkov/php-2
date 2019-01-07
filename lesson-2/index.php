<!--
1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?
2. *Реализовать паттерн Singleton при помощи traits.-->

<?php
    abstract class Goods{
        protected $price;
        protected function __construct($price){
            $this->price = $price;
        }
        abstract protected function calculateTheCost();
    }

    class digitalGoods extends Goods{
        public function __construct($price){
            parent:: __construct($price);
        }
        public function calculateTheCost(){
            return $this->price / 2;
        }
    }

    class piecePhysicalGoods extends Goods{
        public function __construct($price){
            parent:: __construct($price);
        }
        public function calculateTheCost(){
            return $this->price;
        }
    }

    class weightGoods extends Goods{
        private $kg;
        public function __construct($price, $kg){
            parent:: __construct($price);
            $this->kg = $kg;
        }
        public function getWeight(){
            return $this->kg;
        }
        public function calculateTheCost(){
            return $this->price * $this->kg;
        }
    }

    $obj1 = new digitalGoods(50);
    echo 'Digital goods sold for '.$obj1->calculateTheCost().'<br/>';
    $obj2 = new piecePhysicalGoods(100);
    echo 'Piece goods sold for '.$obj2->calculateTheCost().'<br/>';
    $obj3 = new weightGoods(50, 13);
    echo $obj3->getWeight().'kg of weight goods are sold for '.$obj3->calculateTheCost();
?>
