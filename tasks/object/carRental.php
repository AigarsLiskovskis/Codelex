<?php

class Car
{
    public string $make;
    public string $model;

    public function __construct(string $make, string $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

}

class CarRental
{
    public array $available;
    public array $reserved;


    public function addAvailable(Car $car): void
    {
        $this->available[] = $car;
    }

    public function outputCars(): string
    {
        $availableList = "";
        foreach ($this->available as $carAvailable) {
            $availableList .= $carAvailable->make . " : " . $carAvailable->model . PHP_EOL;
        }
        return $availableList;
    }

    public function reserve(): string
    {
        $select = (string)readline("Enter car make to rent: ");
        $message = "";
        foreach ($this->available as $carToRent) {
            if ($select == $carToRent->make) {
                $this->reserved[] = $carToRent;
                $message = "Reserved: $carToRent->make $carToRent->model." . PHP_EOL;
                $key = array_search($carToRent, $this->available);
                if ($key !== false) {
                    unset($this->available[$key]);
                }
            }
        }
        return $message;
    }

    public function outputReserved(): string
    {
        $reservedList = "";
        if (!empty($this->reserved)) {
            foreach ($this->reserved as $carReserved) {
                $reservedList .= $carReserved->make . " : " . $carReserved->model . PHP_EOL;
            }
        }
        return $reservedList;
    }

    public function getAvailable(): array
    {
        return $this->available;
    }
}

$toyota = new Car("Toyota", "Corolla");
$nissan = new Car("Nissan", "Leaf");
$lexus = new Car("Lexus", "RX350");

$rental = new CarRental();
$rental->addAvailable($toyota);
$rental->addAvailable($nissan);
$rental->addAvailable($lexus);

while (true) {

    echo "*********************" . PHP_EOL;
    echo "AVAILABLE CARS:" . PHP_EOL;
    echo $rental->outputCars();
    echo "---------------------" . PHP_EOL;
    echo $rental->reserve();
    echo "---------------------" . PHP_EOL;
    echo "RENTED CARS: " . PHP_EOL;
    echo $rental->outputReserved();
    echo "*********************" . PHP_EOL . PHP_EOL;
    if (empty($rental->getAvailable())) {
        echo "No more cars to rent!" . PHP_EOL;
        exit;
    }
}
