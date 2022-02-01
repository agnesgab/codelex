<?php

$hours = (int) readline("Hours worked: ");
$baseRate = (int) readline("Base rate: ");

function getSalary($hours, $baseRate){

    $overtimeRate = $baseRate * 1.5;
    $basePay = $hours * $baseRate;
    $overtimePay = (($hours - 40) * $overtimeRate) + (40 * $baseRate);

    if($baseRate < 8.00 || $hours > 60){
        return 'ERROR';
    } else {
        if($hours <= 40){
            return $basePay . "$";
        } else {
            return $overtimePay . "$";
        }
    }
}

echo getSalary($hours, $baseRate);


