<?php


require_once "Card.php";
require_once "Player.php";

$card = new Card();
$player = new Player();
$pc = new Player();


$player->setCards($card->giveCard());
$player->setPoints($card->getCardPoints());
$player->setCards($card->giveCard());
$player->setPoints($card->getCardPoints());


$pc->setCards($card->giveCard());
$pc->setPoints($card->getCardPoints());

echo "Blackjack" . PHP_EOL;
echo "Your cards: " . $player->getCards() . PHP_EOL;
echo "Your points: " . $player->getPoints() . PHP_EOL;

while (1) {
    $select = (int)readline("Enter [1] to hold, [2] to pick card: ");
    switch ($select) {
        case 1:
            echo "PC cards: " . $pc->getCards() . PHP_EOL;
            echo "PC points: " . $pc->getPoints() . PHP_EOL;
            while ($pc->getPoints() < 17) {
                $pc->setCards($card->giveCard());
                $pc->setPoints($card->getCardPoints());
                echo "PC cards: " . $pc->getCards() . PHP_EOL;
                echo "PC points: " . $pc->getPoints() . PHP_EOL;
                sleep(1);
            }
            if ($pc->getPoints() > 21) {
                echo "You are WINNER" . PHP_EOL;
                exit;
            }
            if ($pc->getPoints() == $player->getPoints()) {
                echo "Tie!" . PHP_EOL;
                exit;
            }
            if ($pc->getPoints() > $player->getPoints()) {
                echo "Better luck next time!" . PHP_EOL;
            } else {
                echo "You are WINNER" . PHP_EOL;
            }
            exit;
        case 2:
            $player->setCards($card->giveCard());
            $player->setPoints($card->getCardPoints());
            echo "Your cards: " . $player->getCards() . PHP_EOL;
            echo "Your points: " . $player->getPoints() . PHP_EOL;
            if ($player->getPoints() > 21) {
                echo "Better luck next time!" . PHP_EOL;
                exit;
            }
            break;
    }
}


