<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $pic;

        function setCar($make_model, $new_price, $new_miles, $new_pic)
        {
            $this->model = $make_model;
            $this->price = $new_price;
            $this->miles = $new_miles;
            $this->pic = $new_pic;
        }

        function getModel()
        {
            return $this->make_model;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function getPic()
        {
            return $this->pic;
        }

        function worthBuying($max_price, $max_mileage)
        {
          return ($this->price <= ($max_price + 100) && $this->miles <= $max_mileage);
        }

        function __construct($car_make_model, $car_price, $car_miles, $car_pic) {
            $this->make_model = $car_make_model;
            $this->price = $car_price;
            $this->miles = $car_miles;
            $this->pic = $car_pic;
        }

    }


    $porsche = new Car("2014 Porsche 911", 114991, 7864, 'img/porsche.png' );
    $ford = new Car("2011 Ford F450", 55995, 14241, 'img/ford.jpg');
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000, 'img/lexus.png');
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, 'img/mercedes.jpg');

    $cars = array($porsche, $ford, $lexus, $mercedes);
    $cars_matching_search = array();

    foreach ($cars as $car) {
        if ($car->worthBuying($_GET["price"], $_GET["mileage"])) {
            array_push($cars_matching_search, $car);
        }
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <title>Your Car Dealership's Homepage</title>
 </head>
 <body>
     <h1>Your Car Dealership</h1>
     <ul>
         <?php
            if(empty($cars_matching_search)){
                echo "No Cars Matching";
            } else {
                foreach ($cars_matching_search as $car) {
                  // $car_model = $car->getModel();
                  $car_price = $car->getPrice();
                  $car_miles = $car->getMiles();
                  $car_pic = $car->getPic();
                  echo "<img src='" . $car_pic . "' alt='car-pic'>";
                  echo "<li>" . $car->getModel() . "</li>";
                  echo "<ul>";
                  echo "<li> $$car_price </li>";
                  echo "<li> Miles: $car_miles </li>";
                  echo "</ul>";
                }
            }
         ?>
     </ul>
 </body>
 </html>
