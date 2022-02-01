<?php

// Write a program to produce the sum of 1, 2, 3, ..., to 100. Store 1 and 100 in variables lower bound and upper bound,
//  so that we can change their values easily. Also compute and display the average. The output shall look like:
//
// The sum of 1 to 100 is 5050
// The average is 50.5

$lowerBound = (int)readline('Input first integer: ');
$upperBound = (int)readline('Input second integer: ');
function sumAndAverageOfIntRange(int $lowNumber, int $highNumber): string
{
    $result = 0;
    $average = ($lowNumber + $highNumber) / 2;
    for ($i = $lowNumber; $i <= $highNumber; $i++) {
        $result += $i;
    }
    return "The sum of $lowNumber to $highNumber is $result" .
        PHP_EOL . "The average is $average" . PHP_EOL;
}

echo sumAndAverageOfIntRange($lowerBound, $upperBound);