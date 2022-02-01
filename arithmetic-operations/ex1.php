<?php

echo "Enter 2 numbers of your choice! ". PHP_EOL;
$inputOne = (int) readline('First number: ');
$inputTwo = (int )readline('Second number: ');

function findFifteen($inputOne, $inputTwo){
    if($inputOne === 15 || $inputTwo === 15) {
        echo "15 found!" . PHP_EOL;

    } elseif ($inputOne + $inputTwo === 15 || $inputOne - $inputTwo === 15) {
        echo "15 found!" . PHP_EOL;

    } else {
        echo "15 not found!" . PHP_EOL;
        return false;
    }
};

echo findFifteen($inputOne, $inputTwo);

