<?php

$numbers = range(1, 7);
$strings = ['PHP', 'JS', 'C#', 'Java'];

$x = 0;
while ($x < count($numbers)){
    echo $x++ . PHP_EOL;
}

foreach ($strings as $string){
    echo "What is $string?" . PHP_EOL;
}