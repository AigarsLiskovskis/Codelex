<?php

function createPerson(string $name, int $age):stdClass{
    $person = new stdClass();
    $person->name = $name;
    $person->age = $age;
    return $person;
}
$persons = [
    createPerson("John", 19),
    createPerson("Jane", 14),
    createPerson("Jonathan", 46)
];

$ageLimit = (int)readline('Enter age limit: ');

foreach ($persons as $person) {
    echo "$person->name ";
    if ((reachedAgeOf($person, $ageLimit))) {
        echo "is older than $ageLimit";
    } else {
        echo "is younger then $ageLimit";
    }
    echo PHP_EOL;
}

function reachedAgeOf(stdClass $person, int $ageLimit): bool
{
    return $person->age >= $ageLimit;
}
