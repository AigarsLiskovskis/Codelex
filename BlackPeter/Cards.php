<?php


class Card
{
    private string $suit;
    private string $symbol;
    private string $colour;

    public function __construct(string $suit, string $symbol, string $colour)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
        $this->colour = $colour;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return string
     */
    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }
}

