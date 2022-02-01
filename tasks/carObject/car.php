<?php

require_once 'Battery.php';
require_once 'Cars.php';
require_once 'FuelGauge.php';
require_once 'Lights.php';
require_once 'Odometer.php';
require_once 'Tyre.php';

$car = new Cars(' Your Car ');

while (true) {
    echo "********" . $car->getName() . "********" . PHP_EOL;
    echo "Car fuel level: " . $car->getFuelGauge() . "l" . PHP_EOL .
        "Mileage: " . $car->getOdometer() . "km" . PHP_EOL;
    echo "[1] to fill up fuel" . PHP_EOL;
    echo "[2] to drive" . PHP_EOL;
    echo "[3] change tyres and lights" . PHP_EOL;
    echo "[4] to go home" . PHP_EOL;
    $do = (int)readline("Select option: ");
    switch ($do) {
        case 1:
            $fuelAmount = (int)readline("Liters to add: ");
            $car->addFuel($fuelAmount);
            echo "Fuel level: " . $car->getFuelGauge() . "l" . PHP_EOL;
            break;
        case 2:
            $imoCode = (int)readline("Enter immobilizer code: ");
            if (!$car->startCar($imoCode)) {
                exit;
            }
            while (
                $car->getFuelGauge() > 0 &&
                $car->tyres() &&
                ($car->getLowBeam() > 50 && $car->getHighBeam() > 50)
            ) {

                $car->drive();
                echo "Car fuel level: " . $car->getFuelGauge() . "l" . PHP_EOL .
                    "Mileage: " . $car->getOdometer() . "km" . PHP_EOL;
                echo "Battery charge status: " . $car->getBattery() . PHP_EOL;
                echo "Low beam lights Intensity: " . $car->getLowBeam() . PHP_EOL;
                echo "High beam lights intensity: " . $car->getHighBeam() . PHP_EOL;
                echo "FL " . $car->getTyres(0)->getTreadDepth() . "----";
                echo $car->getTyres(1)->getTreadDepth() . " FR";
                echo PHP_EOL;
                echo "RL " . $car->getTyres(2)->getTreadDepth() . "----";
                echo $car->getTyres(3)->getTreadDepth() . " RR ";
                echo PHP_EOL;
                echo PHP_EOL;
                usleep(90000);
            }
            break;
        case 3:
            $car->resetTyres();
            $car->resetLights();
            break;
        case 4:
            echo "Till next time!" . PHP_EOL;
            exit;

    }
}

