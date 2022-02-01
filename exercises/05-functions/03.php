<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = (int)readline('Enter persons age: ');

$ageLimit = (int)readline('Enter age limit: ');

function reachedAge(stdClass $person, int $ageLimit): bool
{
    return $person->age >= $ageLimit;
}

echo reachedAge($person);
echo PHP_EOL;