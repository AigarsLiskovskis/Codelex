<?php

//Using PHP in-built functions create a program that accepts 1 argument - filename.
//Create a file with the filename of your choice and store information with comma separated (example. John, Doe, 10)
//Using PHP in-built functions read information from this file and create an object based on information from the file.
//Output the name, surname and age of the person in the output.
include "text.txt";
echo PHP_EOL;
[$name, $surname, $age] = explode(",", file_get_contents("text.txt"));

$person = new stdClass();
$person->mame = $name;
$person->surmame = $surname;
$person->age = $age;

foreach ($person as $item)
{
    echo $item . PHP_EOL;
}
//var_dump($person);
