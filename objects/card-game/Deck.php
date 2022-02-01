<?php

class Deck
{
    private array $cards;
    private array $symbols = [
        '♣', '♦', '♥', '♠'
    ];

    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->shuffle();
    }

    public function draw(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        array_splice($this->cards, $randomCardIndex, 1);
        return $card;
    }

    private function shuffle(): void
    {
        $this->cards = [];
        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if($this->symbols[$j] == '♥' || $this->symbols[$j] == '♦' ){
                    $color = 'red';
                } else {
                    $color = 'black';
                }
                switch ($i) {
                    case 11:
                        //$this->cards[] = new Card($this->symbols[$j], 'J');
                        break;
                    case 12:
                        $this->cards[] = new Card($this->symbols[$j], 'Q', $color);
                        break;
                    case 13:
                        $this->cards[] = new Card($this->symbols[$j], 'K', $color);
                        break;
                    default:
                        $this->cards[] = new Card($this->symbols[$j], $i, $color);
                        break;
                }
            }
        }
        $this->cards[] = new Card('♠', 'J', $color);
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }



}