<?php
function numberRange($num){
    if($num <= 10){
        return "$num - not enough" . PHP_EOL;
    } elseif($num < 30 ){
        return "$num - enough" . PHP_EOL;
    } else {
        return "$num - too much" . PHP_EOL;
    }
}

function whereFrom($name, $country){
    return "My name is $name and I am from $country" . PHP_EOL;
}

