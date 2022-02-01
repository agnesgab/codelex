<?php

//4x 2-10, 4x3 10, 4x 11
// 2, 3, 4, 5, 6, 7, 8, 9, 10, kalps, dāma, kungs, dūzis


class Game
{
    public array $cards;
    public int $playerSum;
    public int $computerSum;
    public array $myCards;
    public int $sum;

    public function __construct()
    {
        $this->cards = [
            2, 3, 4, 5, 6, 7, 8, 9, 10, 10,  10, 10, 11
        ];

    }

    public function shuffleCards()
    {
        return shuffle($this->cards);
    }

    public function getTwoCards()
    {
        $this->myCards = [$this->cards[0], $this->cards[1]];

    }

    public function showCards()
    {
        foreach ($this->myCards as $card) {
            echo $card . ' | ';
        }
    }

    public function pick()
    {
        $this->myCards[] = $this->cards[rand(0, (count($this->cards)) - 1)];
    }


    public function getSumOfCards()
    {
        return $this->sum = array_sum($this->myCards);
    }

    public function getWinner()
    {
        if ($this->playerSum == 21 || $this->playerSum < 21 && $this->playerSum > $this->computerSum || $this->computerSum > 21) {
            echo "You won!" . PHP_EOL;
        } else {
            echo 'Computer won!' . PHP_EOL;
        }
    }

}


echo "Your turn: " . PHP_EOL;
$game = new Game();
$game->shuffleCards();
$game->getTwoCards();
$game->showCards() . PHP_EOL;
echo "Sum of cards: " . $game->getSumOfCards() . PHP_EOL;
echo PHP_EOL;


while (true) {
    echo "[1] PICK  [2] HOLD" . PHP_EOL;
    $input = (int)readline('Select: ');
    switch ($input) {
        case 1:
            $game->pick();
            $game->showCards();
            if ($game->getSumOfCards() > 21) {
                echo "You lost! Sum of cards is over 21 ({$game->getSumOfCards()})" . PHP_EOL;
                return false;
            } elseif ($game->getSumOfCards() === 21) {
                echo "You won!";
                return false;
            }
            echo "Sum of cards: " . $game->getSumOfCards() . PHP_EOL;
            break;

        case 2:
            $game->showCards();
            $game->playerSum = $game->getSumOfCards();
            echo "Your sum of cards: " . $game->getSumOfCards() . PHP_EOL;
            echo PHP_EOL;

            echo "Computers turn: " . PHP_EOL;
            $game->shuffleCards();
            $game->getTwoCards();
            $game->showCards() . PHP_EOL;
            while ($game->getSumOfCards() <= 16) {
                echo PHP_EOL;
                $game->pick();
                $game->showCards() . PHP_EOL;
                sleep(1);
                $game->computerSum = $game->getSumOfCards();
                echo "Sum of cards: " . $game->getSumOfCards() . PHP_EOL;
            }
            $game->getWinner();

            echo PHP_EOL;
            return true;
    }

}

