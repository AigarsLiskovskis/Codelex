<?php

// Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd,
//  or “Even Number” otherwise. The program shall always print “bye!” before exiting.

$number = (int)readline('Input integer: ');
function CheckOddEven(int $number): string
{
    return ($number % 2 != 0) ?
        'Odd Number ' . PHP_EOL . 'bye!' . PHP_EOL :
        'Even Number ' . PHP_EOL . 'bye!' . PHP_EOL;
}
echo CheckOddEven($number);