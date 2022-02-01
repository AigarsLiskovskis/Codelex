<?php


class Player
{

    private array $cards;
    private int $points = 0;

    public function setCards($card)
    {
        $this->cards[] = $card;
    }

    public function getCards(): string
    {
        return implode(' ', $this->cards);
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points): void
    {
        $this->points += $points;
    }
}

