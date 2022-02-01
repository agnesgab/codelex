<?php

$open = fopen("data.csv", "r");
$data = fgetcsv($open, 1000, ";");

$board = [];
$combinations = [];
$test = 'this is a test string';

while (($data = fgetcsv($open, 1000, ";")) !== FALSE) {
    //get board size & all combos
    $gameBoard = explode(',', $data[0]);
    $gameCombinations = explode('|', $data[1]);

}
    $rowCount = (int) $gameBoard[0];
    $columnCount = (int) $gameBoard[1];

    //make $board array
    for($x = 1; $x <= $rowCount; $x++){
        $b = array_fill(0, $columnCount, '-');
        $board[] = $b;
    }


    //make all winning combo-packs as 3d array
    foreach($gameCombinations as $combination){
        $combo = (explode('/', $combination));

        foreach ($combo as $item) {
            $c = explode(',' , $item);

            //string to int ???
            $c[0] = (int) $c[0];
            $c[1] = (int) $c[1];

            $combos[] = $c;
            }

        $combinations[] = $combos;
    }




