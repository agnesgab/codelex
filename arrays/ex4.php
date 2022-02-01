<?php

$array = [];
$arrayCopy = [];

for($i = 0 ; $i < 10; $i++){
    $array[$i] = rand(0,100);
}

$arrayCopy = $array;

array_pop($array);
$array[] = -7;

echo "Array 1: ";
foreach ($array as $item){
    echo "$item ";
}

echo PHP_EOL;

echo "Array 2: ";
foreach ($arrayCopy as $item){
    echo "$item ";
}

echo PHP_EOL;