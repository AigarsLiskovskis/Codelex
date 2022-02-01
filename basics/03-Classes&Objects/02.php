<?php

class Point
{
    protected int $x;
    protected int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setX($newX)
    {
        $this->x = $newX;
    }


    public function setY($newY)
    {
        $this->y = $newY;
    }
}

function swapPoints($p1, $p2): void
{
    $a = $p1->getX();
    $b = $p1->getY();

    $p1->setX($p2->getX());
    $p1->setY($p2->getY());

    $p2->setX($a);
    $p2->setY($b);
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")" . PHP_EOL;
echo "(" . $p2->getX() . ", " . $p2->getY() . ")" . PHP_EOL;

