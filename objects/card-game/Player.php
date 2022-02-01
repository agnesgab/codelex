<?php

class Player {
    private array $cards;


    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }


    public function disband(){
        $symbols = [];
        foreach ($this->cards as $card){
            $symbols[] = $card->getSymbol();
            //$symbols[] = [$card->getSymbol(), $card->getColor()];
        }
        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count){
            if($count === 1) continue;
            if($count ===2 || $count ===4){
                foreach ($this->cards as $index => $card){
                    if($card->getSymbol() === (string) $symbol && $card->getColor()){
                        unset($this->cards[$index]);

                    }
                }
            }
            if($count === 3){
                for($i = 0; $i < 2; $i++){
                    foreach ($this->cards as $index => $card){
                        if($card->getSymbol() === (string) $symbol) {
                            unset($this->cards[$index]);
                            break;
                        }

                    }
                }
            }
        }
    }

    public function giveCard(): Card{

            shuffle($this->cards);
            return array_pop($this->cards);

    }

    public function getWinner(){
        foreach ($this->cards as $card){
            if(in_array($card->getSymbol() == 'J', $this->cards)){
                echo 'lost';
                return false;
            }
        }
    }


}