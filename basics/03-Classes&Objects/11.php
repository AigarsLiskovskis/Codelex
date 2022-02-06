<?php


class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    public function withdrawal(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }
}


$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartosAccount->getName() . " " . $bartosAccount->getBalance() . PHP_EOL;
echo $bartosSwissAccount->getName() . " " . $bartosSwissAccount->getBalance() . PHP_EOL;

$bartosAccount->withdrawal(20);
echo "Barto's account balance is now: " . $bartosAccount->getBalance() . PHP_EOL;
$bartosSwissAccount->deposit(200);
echo "Barto's Swiss account balance is now: " . $bartosSwissAccount->getBalance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartosAccount->getName() . " " . $bartosAccount->getBalance() . PHP_EOL;
echo $bartosSwissAccount->getName() . " " . $bartosSwissAccount->getBalance() . PHP_EOL;

class FirstAccount
{
    private array $accounts;

    public function createAccounts()
    {
        $this->accounts = [
            new Account("First", 100),
        ];
    }

    public function transfer($to, int $howMuch)
    {
        foreach ($this->accounts as $account) {
            if ($to == $account->getName()) {
                $account->deposit($howMuch);
            }
        }
    }

    /**
     * @return string
     */
    public function getAccounts(): string
    {
        $output = "";
        foreach ($this->accounts as $account) {
                $output .= $account->getName() . " ". $account->getBalance() . PHP_EOL;
        }
        return $output;
    }
}

class FirstMoneyTransfer
{
    private array $accounts;

    public function createAccounts()
    {
        $this->accounts = [
            new Account("Matt's account", 1000),
            new Account("My account", 0)
        ];
    }

    public function transfer($from, $to, int $howMuch)
    {
        foreach ($this->accounts as $account) {
            if ($from == $account->getName()) {
                $account->withdrawal($howMuch);
            }
        }
        foreach ($this->accounts as $account) {
            if ($to == $account->getName()) {
                $account->deposit($howMuch);
            }
        }
    }

    /**
     * @return string
     */
    public function getAccounts(): string
    {
        $output = "";
        foreach ($this->accounts as $account) {
            $output .= $account->getName() . " ". $account->getBalance() . PHP_EOL;
        }
        return $output;
    }

}

$firstMoneyTransfer = new FirstMoneyTransfer();
$firstMoneyTransfer->createAccounts();
$firstMoneyTransfer->transfer("Matt's account","My account", 100);
echo $firstMoneyTransfer->getAccounts();


class MoneyTransfers
{
    private array $accounts;

    public function createAccounts()
    {
        $this->accounts = [
            new Account("A", 100),
            new Account("B", 0.0),
            new Account("C", 0.0)
        ];
    }

    public function transfer($from, $to, int $howMuch)
    {
        foreach ($this->accounts as $account) {
            if ($from == $account->getName()) {
                $account->withdrawal($howMuch);
            }
        }
        foreach ($this->accounts as $account) {
            if ($to == $account->getName()) {
                $account->deposit($howMuch);
            }
        }
    }

    /**
     * @return string
     */
    public function getAccounts(): string
    {
        $output = "";
        foreach ($this->accounts as $account) {
            $output .= $account->getName() . " ". $account->getBalance() . PHP_EOL;
        }
        return $output;
    }
}

$firstAccount = new FirstAccount();
$firstAccount->createAccounts();
$firstAccount->transfer("First",20);
echo $firstAccount->getAccounts();


$firstMoneyTransfer = new FirstMoneyTransfer();
$firstMoneyTransfer->createAccounts();
$firstMoneyTransfer->transfer("Matt's account","My account", 100);
echo $firstMoneyTransfer->getAccounts();


$transfers = new MoneyTransfers();
$transfers->createAccounts();
$transfers->transfer("A", "B", 50.0);
$transfers->transfer("B", "C", 25.0);
echo $transfers->getAccounts();

