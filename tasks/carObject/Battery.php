<?php

class Battery
{

    private int $charge;

    public function __construct(int $charge)
    {
        $this->charge = $charge;
    }

    public function getCharge(): int
    {
        return $this->charge;
    }

    public function setCharge($level): void
    {
        if ($this->charge < 100)
            $this->charge += $level;
    }
}