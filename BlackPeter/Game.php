<?php


require_once "Cards.php";
require_once "Deck.php";
require "Player.php";

$deck = new Deck();
$player = new Player();
$pc = new Player();
$secretCard = new Player();

$secretCard->setCards($deck->draw());

for ($i = 0; $i < 26; $i++) {
    $player->setCards($deck->draw());
    if ($i == 25) {
        continue;
    }
    $pc->setCards($deck->draw());
}

echo "BlackPeter" . PHP_EOL;
echo "Secret card: " . $secretCard->getCards() . PHP_EOL;
echo "Your Cards: " . $player->getCards() . PHP_EOL;
echo "PC cards  : " . $pc->getCards() . PHP_EOL;

while (1) {

    $player->compareCards();
    $pc->compareCards();
    echo "Your Cards: " . $player->getCards() . PHP_EOL;
    echo "PC cards  : " . $pc->getCards() . PHP_EOL;

    if ($player->getCardCount() < $pc->getCardCount()) {
        $pickCard = rand(0, count($pc->getCardCount()) - 1);
        $player->setCards($pc->getCard($pickCard));
        $pc->unsetCard($pickCard);

    } else {
        $pickCard = rand(0, count($player->getCardCount()) - 1);
        $pc->setCards($player->getCard($pickCard));
        $player->unsetCard($pickCard);

    }
    echo PHP_EOL;
    if (empty($player->getCardCount())) {
        echo "You are winner!!!" . PHP_EOL;
        exit;
    }
    if (empty($pc->getCardCount())) {
        echo "Pc is winner!!!" . PHP_EOL;
        exit;
    }

    usleep(40000);//exit
}

