<?php

// Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
//  Take note that it is the same as factorial of N.

$number1 = (int)readline('Input first integer: ');
$number2 = (int)readline('Input second integer: ');
function computeIntegers(int $number1, int $number2): string
{
    $result = 1;
    for ($i = $number1; $i <= $number2; $i++) {
        $result *= $i;
    }
    return $result . PHP_EOL;
}

echo computeIntegers($number1, $number2);