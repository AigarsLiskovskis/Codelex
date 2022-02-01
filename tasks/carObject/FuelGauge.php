<?php

class FuelGauge
{
    private float $fuelLevel;
    private int $tankSize;

    public function __construct(int $fuelLevel, $tankSize)
    {
        $this->fuelLevel = $fuelLevel;
        $this->tankSize = $tankSize;
    }

    public function increaseFuelLevel(): void
    {
        if ($this->fuelLevel < 70) {
            $this->fuelLevel += 1;
        }
    }

    public function decreaseFuelLevel($level): void
    {
        if ($this->fuelLevel > 0) {
            $this->fuelLevel += $level;
        }
    }

    public function getFuelLevel(): int
    {
        return $this->fuelLevel;
    }


    public function getTankSize(): int
    {
        return $this->tankSize;
    }
}