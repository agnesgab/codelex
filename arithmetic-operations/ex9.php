<?php

$kg = readline('Your weight(kg): ');
$cm = readline('Your height(cm): ');

function getBMI($kg, $cm){

    $lbs = $kg * 2.2;
    $in = $cm * 0.39370;
    $bmi = round(($lbs / $in ** 2 * 703), 1);


    if($bmi < 18.5){
        return "Your BMI is $bmi. You are underweight ";
    } elseif ($bmi > 25){
        return "Your BMI is $bmi. You are overweight";
    } else {
        return "Your BMI is $bmi. You have optimal weight";
    }

}

echo getBMI($kg, $cm);