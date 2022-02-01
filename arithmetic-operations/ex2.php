<?php

$number = (int) readline('Enter number of your choice: ');

function CheckOddEven($number){
    if($number % 2 === 0){
        echo 'Even Number' . PHP_EOL;
    } else {
        echo 'Odd Number' . PHP_EOL;
    }

    exit('bye!' . PHP_EOL);
}

CheckOddEven($number);


