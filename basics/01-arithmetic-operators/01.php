<?php
//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15

$number1 = (int)readline('Input first integer: ');
$number2 = (int)readline('Input second integer: ');
function twoIntegers(int $number1, int $number2): string
{
    if (($number1 == 15 || $number2 == 15) || ($number1 + $number2 == 15 || $number1 - $number2 == 15)) {
        $answer = 'TRUE' . PHP_EOL;
    } else $answer = 'FALSE' . PHP_EOL;
    return $answer;
}

echo twoIntegers($number1, $number2);
