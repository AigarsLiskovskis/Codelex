<?php

class Tyre
{

    private float $treadDepth;

    public function __construct(int $treadDepth)
    {
        if ($treadDepth > 0 && $treadDepth < 20) {
            $this->treadDepth = $treadDepth;
        }
    }

    public function decreaseTreadDepth(): void
    {
        if ($this->treadDepth > 0) {
            $this->treadDepth -= rand(1, 5) / 10;
        }
    }

    public function getTreadDepth(): float
    {
        return $this->treadDepth;
    }

    public function changeTyres()
    {
        $this->treadDepth = 10;
    }
}
