<?php

class FuelGauge
{
    protected int $fuelLevel;

    public function __construct($fuelLevel)
    {
        $this->fuelLevel = $fuelLevel;
    }

    public function increaseFuelLevel(): void
    {
        if ($this->fuelLevel < 70) {
            $this->fuelLevel += 1;
        }
    }

    public function decreaseFuelLevel(): void
    {
        if ($this->fuelLevel > 0) {
            $this->fuelLevel -= 1;
        }
    }

    public function getFuelLevel(): int
    {
        return $this->fuelLevel;
    }
}

class Odometer
{

    protected int $mileage;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }

    public function increaseMileage(FuelGauge $gauge): void
    {
        if ($this->mileage < 999999) {
            $this->mileage += 1;
            if ($this->mileage > 9 && $this->mileage % 10 == 0) {
                $gauge->decreaseFuelLevel();
            }

        } else {
            $this->mileage = 0;
        }
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }
}

$fuel = new FuelGauge(0);
$miles = new Odometer(0);

while (true) {
    echo PHP_EOL;
    echo "Road trip" . PHP_EOL;
    echo "Car fuel level: " . $fuel->getFuelLevel() . " liters Mileage: " . $miles->getMileage() . " kilometer" . PHP_EOL;
    echo "[1] to fill up fuel" . PHP_EOL;
    echo "[2] to drive" . PHP_EOL;
    echo "[3] to go home" . PHP_EOL;
    $do = (int)readline("Select option: ");
    switch ($do) {
        case 1:
            for ($i = 0; $i < 71; $i++) {
                $fuel->increaseFuelLevel();
                echo "Fuel level: " . $fuel->getFuelLevel() . " liters Mileage: " . $miles->getMileage() . " kilometer" . PHP_EOL;
                usleep(50000);
            }
            break;
        case 2:
            while ($fuel->getFuelLevel() > 0) {
                echo "Fuel level: " . $fuel->getFuelLevel() . " liters Mileage: " . $miles->getMileage() . " kilometer" . PHP_EOL;
                $miles->increaseMileage($fuel);
                usleep(10000);
            }
            break;
        case 3:
            echo "Till next time!" . PHP_EOL;
            exit;
    }
}



