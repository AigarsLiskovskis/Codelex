<?php


class Card
{

    private array $cards = [
        '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8,
        '9' => 9, 'T' => 10, 'J' => 10, 'Q' => 10, 'K' => 10, 'A' => 11];
    private array $cardType = [
        "♣",
        "♦",
        "♥",
        "♠"
    ];
    private array $onTable;
    private int $cardPoints;

    private function randomCard(): string
    {
        $card = array_rand($this->cards);
        $this->cardPoints = $this->cards[$card];
        $card .= $this->cardType[rand(0,3)];
        $this->onTable[] = $card;
        return $card;
    }

    private function ifNotOnTable(): string
    {
        $card = $this->randomCard();
        if (in_array($card, $this->onTable)) {
            $card = $this->randomCard();
        }
        return  $card;
    }

    public function giveCard(): string
    {
        return $this->ifNotOnTable();
    }

    public function getCardPoints(): int
    {
        return $this->cardPoints;
    }
}

