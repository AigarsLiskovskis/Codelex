<?php

class Dog
{
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @return string
     */
    public function getMother(): string
    {
        return $this->mother;
    }

    /**
     * @return string
     */
    public function getFather(): string
    {

        return $this->father ?? "Unknown";
    }

    /**
     * @param string $father
     * @return void
     */
    public function setFather(string $father): void
    {
        $this->father = $father;
    }

    /**
     * @param string $mother
     * @return void
     */
    public function setMother(string $mother): void
    {
        $this->mother = $mother;
    }
}

class DogTest
{
    private array $dogs;

    public function setDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function addMotherFather($dogName, $mother, $father)
    {
        foreach ($this->dogs as $dog) {
            if ($dog->getName() === $dogName) {
                $dog->setMother($mother);
                $dog->setFather($father);
            }
        }
    }

    public function findFather($dogName): string
    {
        $x = "";
        foreach ($this->dogs as $dog) {
            if ($dog->getName() === $dogName) {
                $x = $dog->getFather();
            }
        }
        return $x;
    }

    public function hasSameMother($name1, $name2): bool
    {
        $m1 = "";
        $m2 = "";
        foreach ($this->dogs as $dog) {
            if ($dog->getName() === $name2) {
                $m2 = $dog->getMother();
            }
            if ($dog->getName() === $name1) {
                $m1 = $dog->getMother();
            }
        }
        return ($m1 === $m2);
    }
}


$d = new DogTest();

$d->setDog(new Dog("Max", 'male'));
$d->setDog(new Dog('Rocky', 'male'));
$d->setDog(new Dog('Sparky', 'male'));
$d->setDog(new Dog('Buster', 'male'));
$d->setDog(new Dog('Sam', 'male'));
$d->setDog(new Dog('Lady', 'female'));
$d->setDog(new Dog('Molly', 'female'));
$d->setDog(new Dog('Coco', 'female'));

$d->addMotherFather("Max", 'Lady', 'Rocky');
$d->addMotherFather('Rocky', 'Molly', 'Sam');
$d->addMotherFather('Buster', 'Lady', 'Sparky');
$d->addMotherFather('Coco', 'Molly', 'Buster');

echo $d->findFather("Coco",) . PHP_EOL;
echo $d->findFather("Sparky") . PHP_EOL;

echo $d->hasSameMother("Coco", "Rocky") . PHP_EOL;
