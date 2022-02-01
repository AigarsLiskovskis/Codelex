<?php


class Deck
{
    private array $cards;
    private array $symbols = [      //'♦','♥' Red   '♣','♠' Black
        '♣',
        '♦',
        '♥',
        '♠'
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
        $colour = "";
        $this->cards = [];
        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if ($j == 0 || $j == 3) {
                    $colour = "black";
                }
                if ($j == 1 || $j == 2) {
                    $colour = "red";
                }
                switch ($i) {
                    case 11:
                        $this->cards[] = new Card($this->symbols[$j], 'J', $colour);
                        break;
                    case 12:
                        $this->cards[] = new Card($this->symbols[$j], 'Q', $colour);
                        break;
                    case 13:
                        $this->cards[] = new Card($this->symbols[$j], 'K', $colour);
                        break;
                    default:
                        $this->cards[] = new Card($this->symbols[$j], $i, $colour);
                        break;
                }
            }
        }
    }
}