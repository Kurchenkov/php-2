<?php
    abstract class Goods{
        protected $price;
        protected function __construct($price){
            $this->price = $price;
        }
        abstract protected function calculateTheCost();
        public function show(){
            echo $this->calculateTheCost();
            echo '<br/>';
        }
    }

    class digitalGoods extends Goods{
        public function __construct($price){
            parent:: __construct($price);
            echo 'Digital goods sold for ';
            $this->show();
        }
        public function calculateTheCost(){
            return $this->price / 2;
        }
    }

    class piecePhysicalGoods extends Goods{
        public function __construct($price){
            parent:: __construct($price);
            echo 'Piece goods sold for ';
            $this->show();
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
            echo $this->getWeight().'kg of weight goods are sold for ';
            $this->show();
        }
        public function getWeight(){
            return $this->kg;
        }
        public function calculateTheCost(){
            return $this->price * $this->kg;
        }
    }

    $obj1 = new digitalGoods(150);
    $obj2 = new piecePhysicalGoods(100);
    $obj3 = new weightGoods(50, 13);
?>
