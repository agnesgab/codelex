<?php
$array = [2, 222, 22, 2.22, 'two'];

foreach ($array as $item){
    if(is_int($item)){
        echo doubleIntegers($item) . PHP_EOL;
    }
}

function doubleIntegers($int){

    return $int * 2;

}