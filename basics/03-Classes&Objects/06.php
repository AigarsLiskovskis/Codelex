<?php


class Costumer
{

    private int $count;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}

class EnergyDrinks
{

    private int $totalDrinks;
    private int $citrusDrinks;

    /**
     * @param float $totalDrinks
     * @param $count
     */
    public function setTotalDrinks(float $totalDrinks, $count): void
    {
        $this->totalDrinks = $count * $totalDrinks;
    }

    /**
     * @param float $citrusDrinks
     */
    public function setCitrusDrinks(float $citrusDrinks): void
    {
        $this->citrusDrinks = $this->totalDrinks * $citrusDrinks;
    }

    /**
     * @return int
     */
    public function getTotalDrinks(): int
    {
        return $this->totalDrinks;
    }

    /**
     * @return int
     */
    public function getCitrusDrinks(): int
    {
        return $this->citrusDrinks;
    }
}

$surveyed = new Costumer(12467);
$energyDrink = new EnergyDrinks();

$energyDrink->setTotalDrinks(0.14, $surveyed->getCount());
$energyDrink->setCitrusDrinks(0.64);

echo "Total number of people surveyed " . $surveyed->getCount();
echo PHP_EOL;
echo "Approximately " . $energyDrink->getTotalDrinks() . " bought at least one energy drink";
echo PHP_EOL;
echo $energyDrink->getCitrusDrinks() . " of those prefer citrus flavored energy drinks.";
echo PHP_EOL;

