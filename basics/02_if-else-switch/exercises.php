<?php
//1
$int = 10;
$str = '10';

if($str === $int){
    echo 'they are the same' . PHP_EOL;
} else {
    echo 'they are not the same'. PHP_EOL;
}

//2
$num = 50;

if($num > 1 && $num <100){
    echo 'its in the range '. PHP_EOL;
} else {
    echo 'its not in the range'. PHP_EOL;
}

//3
$word = 'hello';

if($word = 'hello'){
    echo $word . ' world'. PHP_EOL;
}

//4
$my_num = 28;
$x = 18;
$y = 60;
if($my_num > $x && $my_num < $y && $my_num % 2 === 0){
    echo 'what a great number!'. PHP_EOL;
} else {
    'choose another num'. PHP_EOL;
}

//5
$the_num = 50;
$x = 18;
$y = 60;
if($the_num >= $x && $the_num <= $y){
    echo 'correct'. PHP_EOL;
} else {
    'wrong'. PHP_EOL;
}

//6
$plateNumber = 'MR6879';
switch ($plateNumber){
    case 'MR6879':
        echo 'this is your car'. PHP_EOL;
        break;
    case 'MR9999':
        echo 'this is not your car'. PHP_EOL;
        break;

}

//7
$my_int = 70;
switch ($my_int){
    case($my_int < 50):
        echo 'low'. PHP_EOL;
        break;
    case ($my_int > 50 && $my_int < 100):
        echo 'medium'. PHP_EOL;
        break;
    case($my_int > 100):
        echo 'high'. PHP_EOL;
        break;
}
