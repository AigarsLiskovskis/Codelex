<?php


class Cars
{

    private string $name;
    private Battery $battery;
    private Lights $lights;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private array $tyres;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->battery = new Battery(70);
        $this->lights = new Lights(100, 100);
        $this->fuelGauge = new FuelGauge(5, 70);
        $this->odometer = new Odometer(100);
        $this->tyres = [
            new Tyre(10),
            new Tyre(10),
            new Tyre(10),
            new Tyre(10)
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBattery(): int
    {
        return $this->battery->getCharge();
    }


    public function getFuelGauge(): int
    {
        return $this->fuelGauge->getFuelLevel();
    }

    public function getLowBeam(): int
    {
        return $this->lights->getLowBeams();
    }


    public function getHighBeam(): int
    {
        return $this->lights->getHighBeams();
    }

    public function getOdometer(): int
    {
        return $this->odometer->getMileage();
    }

    public function getTyres($tyre): Tyre
    {
        return $this->tyres[$tyre];
    }

    public function addFuel($liters): void
    {
        for ($i = 0; $i < $liters; $i++) {
            $this->fuelGauge->increaseFuelLevel();
        }
    }

    public function startCar($code): bool
    {
        if ($code !== 1234 && $this->fuelGauge->getFuelLevel() == 0 && $this->battery->getCharge() < 50) {
            return false;
        }
        return true;
    }

    public function tyres(): bool
    {
        foreach ($this->tyres as $tyre) {
            if ($tyre->getTreadDepth() < 1.6) {
                return false;
            }
        }
        return true;
    }

    public function drive()
    {
        $this->odometer->increaseMileage();
        $this->fuelGauge->decreaseFuelLevel(-0.1);
        $this->lights->decreaseLowBeamIntensity(0.08);
        $this->lights->decreaseHighBeamIntensity(0.03);
        $this->battery->setCharge(+1);
        if ($this->getOdometer() > 9 && $this->getOdometer() % 10 == 0) {
            $this->tyres[0]->decreaseTreadDepth();
            $this->tyres[1]->decreaseTreadDepth();
            $this->tyres[2]->decreaseTreadDepth();
            $this->tyres[3]->decreaseTreadDepth();
        }
    }

    public function resetLights()
    {
        $this->lights->resetLights(100);
    }

    public function resetTyres(): void
    {
        foreach ($this->tyres as $tyre) {
            $tyre->changeTyres();
        }
    }


}