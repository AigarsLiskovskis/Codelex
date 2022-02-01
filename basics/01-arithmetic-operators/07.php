<?php

//Modify the example program to compute the position of an object after falling for 10 seconds,
// outputting the position in meters.
//Note: The correct value is -490.5m.

$acceleration = -9.81;
$time = (int)readline('Enter time of falling, in seconds: ');
$Vi = 0;
$Xi = 0;

$x = 0.5 * $acceleration * $time ** 2 + $Vi * $time + $Xi;
echo 'Falling distance ' . $x . 'm' . PHP_EOL;
