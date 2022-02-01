<?php

echo "Count digits" . PHP_EOL;

$positiveNumber = (int)readline("Enter positive number: ");
if ($positiveNumber > 0) {
    $res = str_split($positiveNumber);
    $result = count($res);
    echo $result . PHP_EOL;
} else {
    echo "Not a positive number!" . PHP_EOL;
}
