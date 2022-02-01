<?php

class Player {
    private int $cash;
    private int $spinRate;


    public function __construct(int $cash, int $spinRate)
    {
        $this->cash = $cash;
        $this->spinRate = $spinRate;
    }

    public function getCash():int{
        return $this->cash;
    }

    public function getSpinRate():int{
        return $this->spinRate;
    }

    public function cashMinusSpinRate(){
        $this->cash -= $this->spinRate;
    }

    public function cashPlusWin(int $value){
        $this->cash += $value;
    }


}

class Symbol {

    private string $symbol;
    private int $value;


    public function __construct(string $symbol, int $value)
    {
        $this->symbol = $symbol;
        $this->value = $value;
    }


    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getValue(): int{
        return $this->value;
    }


}

class Board {

    private int $rows;
    private int $columns;
    private array $board;
    private Player $player;
    private array $combinations;
    private array $symbols;
    private array $a;

    public function __construct(int $rows, int $columns, int $cash, int $spinRate){

        $this->rows = $rows;
        $this->columns = $columns;

        $this->board = array_fill(0, $this->rows, array_fill(0, $this->columns, '-'));

        $this->player = new Player($cash, $spinRate);

        $this->symbols = [
            new Symbol('X', 5),
            new Symbol('O', 2),
            new Symbol('*', 10)
        ];

        $this->combinations = [
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
    }


    public function drawBoard()
    {
        $this->replaceWithSymbols();

        foreach ($this->board as $item) {
            foreach ($item as $value) {
                echo " $value ";
            }
            echo PHP_EOL;
        }

    }

    public function getOnlySymbols():array{

        foreach ($this->symbols as $symbol){
            $this->a[] = $symbol->getSymbol();
        }
        return $this->a;
    }

    public function replaceWithSymbols(): array
    {
        $this->getOnlySymbols();
        foreach ($this->board as $row => $item) {
            foreach ($item as $column => $value) {
                $this->board[$row][$column] = $this->a[array_rand($this->a)];
            }
        }
        return $this->board;
    }

    function getBoardCombinations():array {

        $someArray = [];

        foreach ($this->combinations as $index => $combination){
            foreach ($combination as $i => $combo){
                [$row, $column] = $combo;
                $someArray[$index][$i] = $this->board[$row][$column];
            }
        }

        return $someArray;
    }

    public function getWinningSymbol(): array
    {

        $winSymbol = [];
        foreach ($this->getBoardCombinations() as $combo) {
            if (count(array_unique($combo)) === 1) {
                $winSymbol[] = $combo[0];
            }
        }

        return $winSymbol;

    }

    public function getMoneyForSymbol(){

        foreach ($this->getWinningSymbol() as $symbol){
            foreach ($this->symbols as $s){
                if($symbol == $s->getSymbol()){
                    $win = $s->getValue() * $this->player->getSpinRate();
                    $this->player->cashPlusWin($win);
                    echo "You won " . $win . "EUR!" . PHP_EOL;
                    return "Cash: " . $this->player->getCash() . "EUR" . PHP_EOL;
                } else {
                    $this->player->cashMinusSpinRate();
                    return "Cash: " . $this->player->getCash() . "EUR" . PHP_EOL;
                }
            }
        }

    }

    public function validateCash():bool{
        if($this->player->getCash() < $this->player->getSpinRate()){
            return false;
        }

        return true;
    }

}

$cash = (int) readline('Money amount: ');
$spinRate = (int) readline('Spin rate: ');
$game = new Board(3, 3, $cash, $spinRate);
$player = new Player($cash, $spinRate);

while($game->validateCash()) {
    readline('ENTER to spin');
    $game->drawBoard();
    echo $game->getMoneyForSymbol();
}
