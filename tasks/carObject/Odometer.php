<?php

class Odometer
{

    private int $mileage;

    public function __construct(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function increaseMileage(): void
    {
        if ($this->mileage < 999999) {
            $this->mileage += 1;
        } else {
            $this->mileage = 0;
        }
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }
}