<?php

echo "I'm thinking of a number between 1-100.  Try to guess it." . PHP_EOL;
$input = readline('Enter number: ');
$randomNumber = rand(1, 100);


function guessNumber($input, $randomNumber){

    if($randomNumber > $input){
        return 'Sorry, you are too low. I was thinking of ' . $randomNumber . PHP_EOL;
    } elseif ($randomNumber < $input){
        return 'Sorry, you are too high. I was thinking of ' . $randomNumber . PHP_EOL;
    } else {
        return 'You guessed it! What are the odds?!? ' . PHP_EOL;
    }

}

echo guessNumber($input, $randomNumber);


