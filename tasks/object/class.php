<?php

class Weapon
{
    public string $name;
    public int $power;

    public function __construct(string $name, int $power)
    {
        $this->name = $name;
        $this->power = $power;
    }
}

class Inventory
{
    public array $weaponList;

    public function addWeapon(Weapon $weapon): void
    {
        $this->weaponList[] = $weapon;
    }

    public function output(): string
    {
        $x = "";
        foreach ($this->weaponList as $weapon) {
            $x .= $weapon->name . " : " . $weapon->power . PHP_EOL;
        }
        return $x;
    }
}

$first = new Weapon("AK47", 100);
$second = new Weapon("Glock", 70);
$third = new Weapon("Knife", 10);

$list = new Inventory;

$list->addWeapon($first);
$list->addWeapon($second);
$list->addWeapon($third);

echo $list->output();

//echo "$first->name : $first->power" . PHP_EOL;
//echo "$second->name : $second->power" . PHP_EOL;
//echo "$third->name : $third->power" . PHP_EOL;
