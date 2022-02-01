<?php
$suits = ['spade', 'club', 'heart', 'diamond'];
$values = [2,3,4,5,6,7,8,9,10,10,10,10,11];
$fullDeck = [];

$allValues = array_fill(0, count($suits), $values);

foreach ($allValues as $value){
    $valuesWithSuits = (array_combine($suits, $allValues));
    foreach ($valuesWithSuits as $suit => $val){
        foreach ($val as $v){
            echo "$v $suit" . PHP_EOL;
        }
    }
}

//var_dump($fullDeck);
