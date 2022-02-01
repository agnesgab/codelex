<?php

$person = new stdClass();
$person->name = 'Agnese';
$person->licence = ['A', 'B'];
$person->cash = 2000;


function createWeapon(string $name, int $price, string $licence = null): stdClass {
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->price = $price;
    $weapon->licence = $licence;
    return $weapon;
}

$weapons = [
    createWeapon('Machine gun', 2000, 'C'),
    createWeapon('Rifle', 2000, 'B'),
    createWeapon('Knife', 100),
    createWeapon('Glock', 250, 'A')
];

echo "$person->name has $person->cash$" . PHP_EOL . PHP_EOL;

$basket = [];

while(true){

    echo "[1] Purchase" . PHP_EOL;
    echo "[2] Checkout" . PHP_EOL;
    echo "[Any] Exit" . PHP_EOL;

    $option = (int) readline('Select: ');

    switch ($option){
        case 1: //Purchase
            foreach($weapons as $index => $weapon){

                echo "[{$index}] $weapon->name $weapon->price $weapon->licence" . PHP_EOL ;

            }

            $selectedWeaponIndex = (int) readline('Select: ');

            $weapon = $weapons[$selectedWeaponIndex] ?? null;

            if($weapon === null){
                echo "Weapon not found." . PHP_EOL;
                exit;
            }

            if($weapon->licence !== null && !in_array($weapon->licence, $person->licence)){
                echo "Invalid licence." . PHP_EOL;
                break;
            }

            if($person->cash < $weapon->price){
                echo "Not enough cash" . PHP_EOL;
                break;

            }

            $basket[] = $weapon;

            echo "Added $weapon->name to basket" . PHP_EOL;
            break;

        case 2: //Checkout
            $totalSum = 0;

            foreach ($basket as $weapon){
                $totalSum += $weapon->price;
                echo "$weapon->name" . PHP_EOL;
            }

            echo "~~~~~~~~~~~~" . PHP_EOL;
            echo "Total: $totalSum";
            echo PHP_EOL;


            echo $person->cash >= $totalSum ? "Success!" : "Fail! Not enough cash.";


            echo PHP_EOL;
        default:
            exit;
            break;
    }

}

