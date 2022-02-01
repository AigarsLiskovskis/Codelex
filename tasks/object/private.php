<?php

class Person
{

    private string $name;
    private string $surname;
    private int $personsCode;

    public function __construct(string $name, string $surname, int $personsCode)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personsCode = $personsCode;
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
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return int
     */
    public function getPersonsCode(): int
    {
        return $this->personsCode;
    }
}

class Register
{
    private array $personRegister;

    public function addPerson(Person $person): void
    {
        $this->personRegister[] = $person;
    }

    public function output(): string
    {
        $output = "";
        foreach ($this->personRegister as $person) {
            $output .= $person->getName() . " " . $person->getSurname() . " " . $person->getPersonsCode() . PHP_EOL;
        }
        return $output;
    }

}

$register = new Register();


while (1) {
    echo "[1] to enter new Person." . PHP_EOL;
    echo "[2] to show persons." . PHP_EOL;
    echo "[3] to exit." . PHP_EOL;
    $case = (int)readline("Select option: ");
    switch ($case) {
        case 1:
            $name = (string)readline("Enter name: ");
            $surname = (string)readline("Enter surname: ");
            $personsCode = (string)readline("Enter persons code: ");
            $register->addPerson(new Person($name, $surname, $personsCode));
            break;
        case 2:
            echo PHP_EOL;
            echo $register->output();
            echo PHP_EOL;
            break;
        case 3:
            exit;
    }
}
