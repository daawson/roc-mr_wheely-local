<?php

    class Car{
        private $name, $type, $price, $image;

        public function __construct($n, $t, $p, $i){
            $this->name = $n;
            $this->type = $t;
            $this->price = $p;
            $this->image = $i;
        }

        function getName(){
            return $this->name;
        }
        function getType(){
            return $this->type;
        }
        function getPrice(){
            return $this->price;
        }
        function getImage(){
            return $this->image;
        }
    }

    class CarsData
    {
        private $allCars, $maxPrice;
        public function __construct()
        {
            $this->allCars = array(
                new Car("Audi", "TT", 13999, "img/auditt.jpg"),
                new Car("Volvo", "S60", 11999, "img/volvos60.jpg"),
                new Car("Saab", "9-5", 10999, "img/saab9-5.jpg"),
                new Car("Fiat", "Punto", 9999, "img/fiatpunto.png"),
                new Car("Audi", "A8", 4999, "img/audia8.jpg"),
                new Car("Audi", "A6", 29999, "img/auditt.jpg"),
                new Car("Mazda", "6", 8999, "img/volvos60.jpg"),
                new Car("Porsche", "Carrera", 99999, "img/saab9-5.jpg"),
                new Car("Daewoo", "Cinqacento", 999, "img/fiatpunto.png"),
                new Car("BMW", "M2", 239999, "img/audia8.jpg")
            );

            $max = 0;
            foreach ($this->allCars as $a) {
                if ($a->getPrice() >= $max) {
                    $max = $a->getPrice();
                }
            }
            $this->maxPrice = $max;
        }

        function getMaxPrice(){

            return $this->maxPrice;
        }

        function getAllCars()
        {
            sort($this->allCars);
            return $this->allCars;
        }

        function getCarsByName($n)
        {
            $sorted = array();
            foreach ($this->getAllCars() as $a) {
                if ($a->getName() == $n) {
                    array_push($sorted, $a);
                }
            }
            return $sorted;
        }

        function getCarsByPrice($min, $max)
        {
            if($min >= $max) $max = $min+100000;
            $sorted = array();
            foreach ($this->getAllCars() as $a) {
                if ($a->getPrice() >= $min && $a->getPrice() <= $max) {
                    array_push($sorted, $a);
                }
            }
            asort($sorted);
            return $sorted;
        }

        function getCarsByPriceAndName($min, $max, $n)
        {
            $sorted = array();
            foreach ($this->getAllCars() as $a) {
                if ($a->getPrice() >= $min && $a->getPrice() <= $max && $a->getName() == $n) {
                    array_push($sorted, $a);
                }
            }

            return $sorted;
        }

        function getFormatedCard($c){
            echo "<div class='card'>";
            echo "<p>". $c->getName() . " " . $c->getType() . " " . $c->getPrice() . "$</p>";
            echo "<img class='preview' alt='car image' src='" . $c->getImage() . "'>";
            echo "</div>";
        }
    }
