<?php

class SavingsAccount
{

    private float $balance;
    private int $interestRate;
    private float $monthlyInterest = 0;


    public function __construct(string $balance)
    {
        $this->balance = $balance;
    }

    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setInterestRate(float $interestRate): void
    {
        $this->interestRate = $interestRate;
    }

    public function getMonthlyInterest(): float
    {
        return $this->monthlyInterest;
    }

    public function withdrawal(float $withdrawal): int
    {
        return $this->balance -= $withdrawal;
    }

    public function addDeposit(float $deposit): void
    {
        $this->balance += $deposit;

    }

    public function monthlyInterest(): void
    {
        $this->monthlyInterest += $this->interestRate / 12 * $this->balance;
        $this->balance += $this->interestRate / 12 * $this->balance;
    }


}

$account = new SavingsAccount(0);

$moneyInAccount = (int)readline("How much money is in the account?: ");
$rate = (int)readline("Enter the annual interest rate: ");
$months = (int)readline("How long has the account been opened? ");
$counter = 1;
$mDeposit = 0.00;
$mWithdrawn = 0.00;

$account->setBalance($moneyInAccount);
$account->setInterestRate($rate);

while ($months >= $counter) {
    $monthsDeposit = (float)readline("Enter amount deposited for month: $counter: ");
    $account->addDeposit($monthsDeposit);
    $mDeposit += $monthsDeposit;
    $monthsWithdrawn = (float)readline("Enter amount withdrawn for $counter: ");
    $account->withdrawal($monthsWithdrawn);
    $mWithdrawn += $monthsWithdrawn;
    $account->monthlyInterest();
    $counter++;
}

echo "Total deposited: $" . number_format($mDeposit, 2,
        ".", ",") . PHP_EOL;
echo "Total withdrawn: $" . number_format($mWithdrawn, 2,
        ".", ",") . PHP_EOL;
echo "Interest earned: $" . number_format($account->getMonthlyInterest(),
        2, ".", ",") . PHP_EOL;
echo "Ending balance: $" . number_format($account->getBalance(), 2,
        ".", ",") . PHP_EOL;