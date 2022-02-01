<?php

$symbols = ['X', 'O', '*'];

$symbolValues = [
    'X' => 10,
    'O' => 15,
    '*' => 20

];

$spinRate = 5;

$rows = 3;
$columns = 3;
$board = array_fill(0, $rows, array_fill(0, $columns, '-'));


$combinations = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],

];


function drawBoard($board)
{
    foreach ($board as $item) {
        foreach ($item as $value) {
            echo " $value ";
        }
        echo PHP_EOL;
    }
}


function findWin($combinations, $board)
{

    $symbolBoard = [];

    foreach ($combinations as $index => $combination) {
        foreach ($combination as $i => $item) {
            [$row, $column] = $item;
            $symbolBoard[$index][$i] = $board[$row][$column];

        }
    }

    $winnerOptions = []; //???
    foreach ($symbolBoard as $symbol) {
        if ((count(array_unique($symbol)) === 1)) {
            $winnerOptions[] = $symbol[0];
        }
    }
    return $winnerOptions;
}


function calculateMoney(array $lines, array $symbolValues, int $spinRate)
{
    $moneyWon = 0;
    foreach ($lines as $line) {
        switch ($line) {
            case 'X':
                $moneyWon += $symbolValues['X'] * $spinRate;
                break;
            case 'O':
                $moneyWon += $symbolValues['O'] * $spinRate;
                break;
            case '*':
                $moneyWon += $symbolValues['*'] * $spinRate;
                break;
            default:
                break;
        }
    }
    return $moneyWon;

}


$cash = readline('Enter the amount of cash: ');
echo PHP_EOL;
echo "Spin rate is $spinRate";
echo PHP_EOL;

while (true) {

    echo "[1] Play!" . PHP_EOL;
    echo "[2] Change the spin rate" . PHP_EOL;
    echo "[Any] Exit" . PHP_EOL;

    $input = readline('Select: ');

    switch ($input) {
        case 1:
            if ($cash >= $spinRate) {
                foreach ($board as $row => $item) {
                    foreach ($item as $column => $value) {
                        $board[$row][$column] = $symbols[array_rand($symbols)];
                    }
                }

                drawBoard($board);
                $cash -= $spinRate;
                $lines = findWin($combinations, $board);

                if (sizeof($lines) > 0) {
                    $moneyWon = calculateMoney($lines, $symbolValues, $spinRate);
                    $cash += $moneyWon;
                    echo "You won $moneyWon" . PHP_EOL;
                    echo "CASH: $cash" . PHP_EOL;

                } else {
                    echo "NOP, NOTHING" . PHP_EOL;
                    echo "CASH: $cash" . PHP_EOL;
                }

            } else {
                echo "Not enough money" . PHP_EOL;
            }
            break;
        case 2:
            $newSpinRate = readline('Enter your spin rate: ');
            echo PHP_EOL;
            if ($newSpinRate >= $cash) {
                echo "Not enough money" . PHP_EOL;
            } else {
                $spinRate = $newSpinRate;
                echo "Spin rate is $spinRate" . PHP_EOL;
            }
            break;
        default:
            echo "Bye" . PHP_EOL;
            exit;
    }


}