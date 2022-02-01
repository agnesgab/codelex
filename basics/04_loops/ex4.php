<?php


$arr = [3, 2, 6, 5, 9, 8];

foreach ($arr as $num){
    if($num % 3 === 0){
        echo $num . PHP_EOL;
    }
}
