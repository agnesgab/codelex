<?php

$words = ['january', 'february', 'march', 'april'];
shuffle($words);
$word = $words[0];

$lettersArray = str_split($word);
$symbol = ' _ ';
$lettersToSymbolString = str_repeat($symbol, count($lettersArray));

$misses = [];


while (true) {

    echo 'Word:' . $lettersToSymbolString;
    echo PHP_EOL;
    echo 'Misses:' . implode(', ', $misses);
    echo PHP_EOL;
    $input = readline('Guess: ');
    echo PHP_EOL;
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
    echo PHP_EOL;


    if (in_array($input, $lettersArray)) {

        $keys = array_keys($lettersArray, $input);
        foreach ($keys as $matchIndex) {
            $lettersToSymbolString[$matchIndex] = $input;
        }

        if ($lettersToSymbolString == $word) {
            echo "YOU GOT IT!" . PHP_EOL;
            break;
        }


    } else {

        $misses[] = $input;
        if (count($misses) == 5) {
            echo 'YOU LOST!' . PHP_EOL;
            break;
        }

    }

}


