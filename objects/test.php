<?php
//dažādi variatni kāršu kavai
$suits = ['♣', '♦', '♥', '♠'];
$values = [2,3,4,5,6,7,8,9,10,'J','Q','K','A'];
$fullDeck = [];

$allValues = array_fill(0, count($suits), $values);

foreach ($allValues as $value){
    $valuesWithSuits = (array_combine($suits, $allValues));
    foreach ($valuesWithSuits as $suit => $v){
        foreach ($v as $val){
            echo "[$val$suit]";
        }
    }
}


