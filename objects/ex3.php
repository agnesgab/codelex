<?php

class Car
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

}

$bmw = new Car('BMW X3');
$audi = new Car('Audi A8');
$toyota = new Car('Toyota RAV4');
$renault = new Car('Renault ZOE');
$vw = new Car('Volkswagen Passat');


class Rent
{
    public array $cars;

    public function __construct(array $cars)
    {
        $this->cars = $cars;
    }

    public function getAllCars(Car $car)
    {
        $this->cars[] = $car;
    }

    public function doReservation($cars)
    {

        $reserved = [];

        while (true) {
            echo "Car rental" . PHP_EOL;
            echo "[1] Available cars for rent" . PHP_EOL;
            echo "[2] Reserved" . PHP_EOL;
            echo "[Any] Exit" . PHP_EOL;

            $input = (int)readline('Select: ');

            switch ($input) {

                case 1:

                    echo "~~ALL CARS~~" . PHP_EOL;
                    foreach ($cars as $available) {
                        foreach ($available as $index => $car) {
                            if (in_array($car, $reserved)) {
                                unset($car);
                            } else {
                                echo "[$index]$car->name" . PHP_EOL;
                            }
                        }
                        echo '~~~~~~~~~~~' . PHP_EOL;
                        $selectedCarIndex = (int)readline('Choose car: ');
                        $selectedCar = $available[$selectedCarIndex];

                        if (!isset($selectedCarIndex) || $selectedCar == in_array($selectedCar, $reserved)) {
                            echo 'Not available' . PHP_EOL;
                        } else {
                            echo "You reserved {$available[$selectedCarIndex]->name}" . PHP_EOL;
                            echo "~~~~~~~~~~~" . PHP_EOL;
                            $reserved[] = $selectedCar;


                        }
                    }

                    break;

                case 2:
                    echo "~~RESERVED~~" . PHP_EOL;
                    foreach ($reserved as $car) {
                        echo "$car->name" . PHP_EOL;
                    }
                    echo "~~~~~~~~~" . PHP_EOL;
                    break;
                default:
                    exit;

            }
        }

    }

}

$salon = new Rent([]);
$salon->getAllCars($bmw);
$salon->getAllCars($audi);
$salon->getAllCars($toyota);
$salon->getAllCars($renault);
$salon->getAllCars($vw);

$salon->doReservation($salon);

