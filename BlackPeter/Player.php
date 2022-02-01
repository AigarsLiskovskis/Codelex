<?php


class Player
{

    private array $cards = [];
    private array $doubles = [];

    public function setCards($card)
    {
        $this->cards[] = $card;
    }

    public function unsetCard(int $key)
    {
        unset($this->cards[$key]);
        $this->cards = array_values($this->cards);
    }

    public function getCards(): string
    {
        $s = "";
        foreach ($this->cards as $card) {
            $s .= $card->getDisplayValue() . " ";
        }
        return $s . " ";
    }

    public function getCardCount(): array
    {
        return $this->cards;
    }

    public function getCard(int $key)
    {
        return $this->cards[$key];
    }


    public function equalCards(Card $first, Card $second): bool
    {
        return $first->getSymbol() == $second->getSymbol();
    }

    public function equalColors(Card $first, Card $second): bool
    {
        return $first->getColour() == $second->getColour();
    }

    public function compareCards()
    {
        foreach ($this->cards as $card) {
            for ($i = 0; $i < count($this->cards) - 1; $i++) {
                if ($card !== $this->cards[$i]) {
                    if ($this->equalCards($card, $this->cards[$i]) && $this->equalColors($card, $this->cards[$i])) {
                        $this->doubles[] = $card;
                        $this->doubles[] = $this->cards[$i];
                    }
                }
            }
        }
        $this->cards = array_udiff($this->cards, $this->doubles, 'compare');
        $this->cards = array_values($this->cards);
    }
}

function compare(Card $objA, Card $objB): int
{
    return $objA <=> $objB;
}

