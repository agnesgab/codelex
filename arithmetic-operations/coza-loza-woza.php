<?php

$numbers = range(1, 110);
$count = 0;

    foreach ($numbers as $num) {

        if ($num % 3 === 0) {
            echo 'Coza ';
            if ($num % 5 === 0) {
                echo 'CozaLoza ';
            }
        } elseif ($num % 5 === 0) {
            echo 'Loza ';
        } elseif ($num % 7 === 0) {
            echo 'Woza ';
        } else {
            echo $num . ' ';
        }

        $count++;
        if($count === 11){
            echo PHP_EOL;
            $count = 0;
        }

    }