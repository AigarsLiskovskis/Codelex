<?php


class KeyElements
{
    private array $elements;

    public function setElements(array $elements): void
    {
        $this->elements = $elements;
    }

    public function getElements(): array
    {
        return $this->elements;
    }
}

$keyElements = [
    "A" => 0.5,
    "B" => 1,
    "C" => 1.5,
    "D" => 2
];
$elements = new KeyElements();
$elements->setElements($keyElements);

class Wheel
{
    private array $wheel;

    public function setWheel(array $wheel): void
    {
        $this->wheel = $wheel;
    }

    public function getWheel(): array
    {
        return $this->wheel;
    }

    public function spinWheels($elements): void
    {
        foreach ($this->wheel as $key => $item) {
            foreach ($item as $keyValue => $value) {
                $this->wheel[$key][$keyValue] = array_rand($elements->getElements());
            }
        }
    }

    public function wheelOutput(): string
    {
        $output = "";
        foreach ($this->wheel as $row) {
            foreach ($row as $columnItem) {
                $output .= " $columnItem ";
            }
            $output .= PHP_EOL;
        }
        return $output;
    }
}

$wheel = [
    ['-', '-', '-', '-'],
    ['-', '-', '-', '-'],
    ['-', '-', '-', '-']
];
$wheels = new Wheel();
$wheels->setWheel($wheel);

class Combinations
{
    private array $combinations;


    public function setCombinations(array $combinations): void
    {
        $this->combinations = $combinations;
    }

    public function getCombinations(): array
    {
        return $this->combinations;
    }
}

$combinations = [
    [
        [0, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    [
        [2, 0], [1, 1], [0, 2], [0, 3]
    ],
    [
        [0, 0], [1, 1], [2, 2], [2, 3]
    ]
];
$combination = new Combinations();
$combination->setCombinations($combinations);

class SlotMachine
{
    private int $spinCost = 5;
    private int $gainFactor = 2;
    private array $winningLetters = [];

    public function getSpinCost(): int
    {
        return $this->spinCost;
    }

    public function getGainFactor(): int
    {
        return $this->gainFactor;
    }

    public function getWinningLetters(): array
    {
        return $this->winningLetters;
    }

    public function setWinningLetters(array $winningLetters): void
    {
        $this->winningLetters = $winningLetters;
    }

    public function combinationCheck(Combinations $combination, Wheel $wheels): string
    {
        foreach ($combination->getCombinations() as $combination) {
            $uniqElements = [];
            foreach ($combination as $item) {
                [$row, $column] = $item;
                $uniqElements[] = $wheels->getWheel()[$row][$column];
            }
            if (count(array_unique($uniqElements)) === 1) {
                $this->winningLetters[] = $wheels->getWheel()[$row][$column];
                echo "Yes!  ";
            }
        }
        return implode($this->winningLetters) . PHP_EOL;
    }
}

$machine = new SlotMachine();


class Player
{
    private int $startMoney;
    private int $bet;

    public function setStartMoney(int $startMoney): void
    {
        $this->startMoney = $startMoney;
    }

    public function getStartMoney(): int
    {
        return $this->startMoney;
    }

    public function setBet(int $bet): void
    {
        $this->bet = $bet;
    }

    public function moneyRolled(SlotMachine $machine, KeyElements $elements)
    {
        $this->startMoney -= $machine->getSpinCost();

        $lettersCounted = array_count_values($machine->getWinningLetters());

        foreach ($lettersCounted as $key => $count) {
            $this->startMoney += ($this->bet * $machine->getGainFactor() * $elements->getElements()[$key]) * $count;
        }
    }
}

echo "Slot Machine!" . PHP_EOL;
echo "One spin costs " . $machine->getSpinCost() . "$" . PHP_EOL;
$player = new Player();
$startMoney = (int)readline("Enter amount of money to start: ");
$player->setStartMoney($startMoney);
$bet = (int)readline("Enter spin bet: ");
$player->setBet($bet);
if ($bet > $startMoney) {
    echo "Bet is too big!" . PHP_EOL;
    exit;
}
while (true) {
    $case = (int)readline("Enter: 1(SPIN), 2(Quit) ");
    switch ($case) {
        case 1:
            if ($player->getStartMoney() < 5) {
                echo "Not enough money" . PHP_EOL;
                exit;
            }
            $machine->setWinningLetters($winningLetters = []);
            $wheels->spinWheels($elements);
            echo $wheels->wheelOutput();

            $machine->combinationCheck($combination, $wheels);

            $player->moneyRolled($machine, $elements);

            echo "Balance: " . $player->getStartMoney() . PHP_EOL . PHP_EOL;
            break;
        case 2:
            echo "Your balance is " . $player->getStartMoney() . PHP_EOL;
            exit;
    }
}
