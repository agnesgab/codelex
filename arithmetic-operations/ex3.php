<?php

$array = [];
$first = (int) readline('Lower bound: ');
$last = (int) readline('Upper bound: ');

function getSumAndAverage($first, $last){

    $sum = 0;

    for ($i = $first; $i <= $last; $i++) {
        $array[] = $i;
        $sum = $sum + $i;
    }

    $length = count($array);
    $average = $sum / $length;

    echo "The sum of $first to $last is $sum" . PHP_EOL;
    echo "The average is $average" . PHP_EOL;

}

getSumAndAverage($first, $last);