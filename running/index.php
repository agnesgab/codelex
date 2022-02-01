<?php

$length = 10;
$runners = ['A', 'B', 'C', 'D'];
$cash = 100;


function drawTrack($track)
{
    foreach ($track as $line) {
        echo implode("", $line) . PHP_EOL;
    }

}


echo "RUNNING GAME. DOUBLE YOUR BET!" . PHP_EOL;
while (true) {

    echo '[1] PLAY!' . PHP_EOL;
    echo '[2] Take money and exit' . PHP_EOL;
    echo '[3] Exit' . PHP_EOL;
    $option = (int)readline('Select: ');
    echo PHP_EOL;


    switch ($option) {
        case 1:

            echo "You have $cash$" . PHP_EOL;
            $bet = (int)readline('Place your bet: ');
            echo PHP_EOL;
            if ($cash < $bet) {
                echo "NOT ENOUGH MONEY" . PHP_EOL;
                exit;
            }
            echo "Chose your runner: ";
            foreach ($runners as $runner) {
                echo "$runner ";
            }
            echo PHP_EOL;
            $yourRunner = readline('Select: ');
            echo PHP_EOL;

            readline('Press ENTER to start!');

            //$cash -= $bet;
            $track = [];
            for ($i = 0; $i < count($runners); $i++) {
                for ($m = 0; $m < $length; $m++) {
                    $track[$i][0] = $runners[$i];
                    $track[$i][$m] = '-';
                }
            }
            $count = 0;
            $runnersFinished = 0;
            $results = [];
            $list = [];


            drawTrack($track);
            sleep(1);

            while (true) {

                $count++;

                foreach ($track as $key => $line) {
                    $currentPosition = array_search($runners[$key], $line);
                    $random = rand(1, 3);
                    $newPosition = $currentPosition + $random;
                    $track[$key][$currentPosition] = '-';
                    if ($newPosition < ($length - 1)) {
                        $track[$key][$newPosition] = $runners[$key];
                    } else {
                        $track[$key][$length - 1] = $runners[$key];
                        if ($currentPosition != $length - 1) {
                            $results[$count][] = $runners[$key];
                            $runnersFinished += 1;
                        }
                    }
                }

                drawTrack($track);
                if ($runnersFinished == count($runners)) {
                    echo 'All runners have finished!' . PHP_EOL;
                    getResultsTable($results, $runnersFinished, $yourRunner, $bet, $cash);
                    break;
                }
                echo PHP_EOL;
                sleep(1);
            }
            break;
        case 2:
            echo "You have $cash$" . PHP_EOL;
            exit;

        default:
            exit;

    }
}


function getResultsTable($results, $runnersFinished, $yourRunner, $bet, $cash)
{
    $list = [];
    $finalResults = array_values($results);
    for ($i = 1; $i <= $runnersFinished; $i++) {
        $list[$i] = $i;
    }
    foreach ($finalResults as $index => $value) {
        if (is_array($value))
            echo "Place {$list[$index + 1]}: " . implode(", ", $value) . PHP_EOL;
        else
            echo "Place {$list[$index + 1]}: {$value}" . PHP_EOL;
    }
    if (in_array($yourRunner, $finalResults[0])) {
        $money = $bet * 2;
        $cash += $money;
        echo "WIN $money$" . PHP_EOL;
        echo "You have $cash$" . PHP_EOL;

    } else {
        if ($cash < $bet) {
            echo "GAME OVER - not enough money";
            exit;
        } else {
            $cash -= $bet;
            echo "NO WIN" . PHP_EOL;
            echo "You have $cash$" . PHP_EOL;
        }
    }

}
//AR NAUDAM NAV OK