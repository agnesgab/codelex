<?php

$open = fopen("data.csv", "r");
$data = fgetcsv($open, 1000, ";");

$board = [];
$combinations = [];

while (($data = fgetcsv($open, 1000, ";")) !== FALSE) {

    //get board size & all combos
    $gameBoard = explode(',', $data[0]);
    $gameCombinations = explode('|', $data[1]);


    $rowCount = (int)$gameBoard[0];
    $columnCount = (int)$gameBoard[1];

//make $board array
    for ($x = 1; $x <= $rowCount; $x++) {
        $b = array_fill(0, $columnCount, '-');
        $board[] = $b;
    }


//make all combo-packs as 3d array
    foreach ($gameCombinations as $combination) {
        $combo = (explode('/', $combination));

        foreach ($combo as $item) {
            $c = explode(',', $item);

//            foreach ($c as $i){
//                $i = (int) $i;
//            }
            $c[0] = (int)$c[0];
            $c[1] = (int)$c[1];

            $combos[] = $c;

        }

        $combinations[] = $combos;
    }

}

var_dump($combinations);

$player1 = readline('Player 1 choose your symbol: ');
$player2 = readline('Player 2 choose your symbol: ');
$activePlayer = $player1;

//$combinations = [
//    [
//        [0, 0], [0, 1], [0, 2],
//    ],
//    [
//        [1, 0], [1, 1], [1, 2]
//    ],
//    [
//        [2, 0], [2, 1], [2, 2]
//    ],
//    [
//        [0, 0], [1, 1], [2, 2]
//    ],
//    [
//        [2, 0], [1, 1], [0, 2]
//    ]
//];

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{

    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{

    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}
// X
// $board[0][0] = X

function drawBoard(array $board): void
{
    foreach ($board as $item){
        foreach ($item as $value){
            echo " $value ";
        }
        echo PHP_EOL;

    }
}

while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {

    drawBoard($board);

    if($activePlayer == $player1){
        echo "$player1's turn" . PHP_EOL;
    } else {
        echo "$player2's turn" . PHP_EOL;
    }

    $position = readline('Enter position: ');
    [$row, $column] = explode(',', $position);

    if (!isset($board[$row][$column]) || $board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
    {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;
