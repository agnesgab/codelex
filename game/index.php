<?php

$selections = ['rock', 'paper', 'scissors', 'lizard', 'spock'];
$player = 'rock';
$pc = $selections[array_rand($selections)];

echo "$player VS $pc" . PHP_EOL;

$combinations = [

    'rock' => ['scissors', 'lizard'],
    'scissor' => ['paper', 'lizard'],
    'paper' => ['rock', 'spock'],
    'lizard' => ['spock', 'paper'],
    'spock' => ['scissors', 'rock']
];

if($player === $pc){

    echo 'TIE!' .PHP_EOL;
    exit;
}

echo in_array($pc, $combinations[$player]) ? 'I WON!' : 'I LOST';
