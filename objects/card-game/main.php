<?php
require_once 'Card.php';
require_once 'Deck.php';
require_once 'BlackPeter.php';
require_once 'Player.php';

$game = new BlackPeter();
$player = new Player();
$npc = new Player();



for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCard($game->deal());
}


foreach ($player->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}
$player->disband();
echo PHP_EOL;

foreach ($player->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}


echo PHP_EOL;
echo '===============';
echo PHP_EOL;

foreach ($npc->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}

echo PHP_EOL;

$npc->disband();
foreach ($npc->getCards() as $card) {
    echo '[' . $card->getDisplayValue() . ']';
}



while($player->checkCardsOnHand() || $npc->checkCardsOnHand()) {
    sleep(1);
    echo PHP_EOL;
    echo 'PLAYER' . PHP_EOL;
    $player->addCard($npc->giveCard());
    $player->disband();
    foreach ($player->getCards() as $card) {
        echo '[' . $card->getDisplayValue() . ']';
    }

    sleep(1);
    echo PHP_EOL;
    echo 'NPC' . PHP_EOL;
    $npc->addCard($player->giveCard());
    $npc->disband();
    foreach ($npc->getCards() as $card) {
        echo '[' . $card->getDisplayValue() . ']';
    }
    echo PHP_EOL;

}

$player->getWinner();
$npc->getWinner();

echo PHP_EOL;


