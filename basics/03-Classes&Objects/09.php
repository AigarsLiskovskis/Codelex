<?php

class BankAccount
{

    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    function getBalance(): float
    {
        return $this->balance;
    }
}

$ben = new BankAccount("Benson", 17.25);
$benson = new BankAccount("Benson", -17.50);

echo $ben->getName() . ", $" . number_format($ben->getBalance(),
        2, ".", ",") . PHP_EOL;
echo $benson->getName() . ", $" . number_format($benson->getBalance(),
        2, ".", ",") . PHP_EOL;

