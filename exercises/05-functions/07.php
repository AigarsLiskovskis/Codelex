<?php

//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object) Person object has a name,
// valid licenses (multiple) & cash. Guns are objects stored within an array.
// Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name = "John";
$person->licenses = ['A', 'C'];  //= explode(',', readline('Enter licenses: '));
$person->cash = 2050;

function createWeapons(string $name, int $price, string $license = null): stdClass
{
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->licenses = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapons('AK47', 1000, 'C'),
    createWeapons('Deagle', 500, 'A'),
    createWeapons('Knife', 100),
    createWeapons('Glock', 250),
];

$basket = [];

echo "$person->name has $person->cash$" . PHP_EOL . PHP_EOL;

while (true) {
    echo ' [1]  Purchase' . PHP_EOL;
    echo ' [2]  Checkout' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;
    $continue = (int)readline('Select an option: ') . PHP_EOL;

    switch ($continue) {
        case 1:

            foreach ($weapons as $index => $weapon) {
                echo "[$index] $weapon->name ($weapon->licenses) $weapon->price$" . PHP_EOL;
            }

            $selectedWeaponIndex = (int)readline('Select weapon: ');
            $weapon = $weapons[$selectedWeaponIndex] ?? null;

            if ($weapon === null) {
                echo "Weapon not found." . PHP_EOL;
                exit;
            }

            if ($weapon->licenses !== null && !in_array($weapon->licenses, $person->licenses)) {
                echo "Invalid license." . PHP_EOL;
                exit;
            }

            if ($person->cash < $weapon->price) {
                echo "Not enough cash." . PHP_EOL;
                exit;
            }

            $basket[] = $weapon;
            echo "Added $weapon->name to basket" . PHP_EOL . PHP_EOL;

            break;
        case 2:

            $totalSum = 0;
            foreach ($basket as $weapon) {
                $totalSum += $weapon->price;
                echo $weapon->name . PHP_EOL;
            }
            echo "-----------------------" . PHP_EOL;
            echo "Total: $totalSum$" . PHP_EOL;
            echo $person->cash >= $totalSum ? "Successful payment" : "Not enough money";
            echo PHP_EOL;
            exit;
        default:
            exit;
    }
}
