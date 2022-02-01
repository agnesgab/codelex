<?php

function doMultiplication($first, $last){

    $array = [];

    for ($i = $first; $i <= $last; $i++) {
        $array[] = $i;
    }

    return array_product($array);

}

echo doMultiplication(1, 10);