<?php

$fruits = [

    ['name' => 'apple', 'weight' => 10],
    ['name' => 'pineapple', 'weight' => 8],
    ['name' => 'mango', 'weight' => 30]

];

$prices = [
    '10+' => 2,
    '<10' => 1
];


function getPrice(array $fruits, array $prices){

        $bigPrice = $prices['10+'];
        $smallPrice = $prices['<10'];

        foreach ($fruits as $fruit) {
            $weight = $fruit['weight'];

            echo $weight >= 10 ? "{$fruit['name']}: " . $weight * $bigPrice . PHP_EOL : "{$fruit['name']}: " . $weight * $smallPrice . PHP_EOL;

        }

}

getPrice($fruits, $prices);

