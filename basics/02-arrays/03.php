<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";

//todo check if an array contains a value user entered
$searchValue = (int)readline(' ');
$searching = array_search($searchValue, $numbers);

echo ($searching >= 0) ? 'Found at place '. $searching : 'Not found';
echo PHP_EOL;