<?php

function sumWithTen($num){
    return $num + 10 . PHP_EOL;
}

function numberRange($num){
    if($num <= 10){
        return "$num - not enough" . PHP_EOL;
    } elseif($num < 30 ){
        return "$num - enough" . PHP_EOL;
    } else {
        return "$num - too much" . PHP_EOL;
    }
}


