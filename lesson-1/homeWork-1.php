<?php
/*1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
4. Придумать наследников класса из п.1. Чем они будут отличаться?*/

   class Good {
        private $name;
        private $price;  
        public function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }
        public function getName() {
            return $this->name;
        }
        public function getPrice() {
            return $this->price;
        }
    }

    class GoodUnit extends Good {
        private $color;
        public function __construct($name, $price, $color) {
            parent::__construct($name, $price);
            $this->color = $color;
        }
        public function getColor() {
            return $this->color;
        }
        public function showGoodProps() {
            echo 'name: '.$this->getName().'<br/> price: '.$this->getPrice().'<br/> color: '.$this->getColor();
        }
    }

    $object = new GoodUnit("carpet", 1000, "brown");
    $object->showGoodProps();
?>
