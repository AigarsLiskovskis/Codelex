<?php

//echo "Enter the number.";

//todo print if number is positive or negative

echo "Positive or Negative" . PHP_EOL;

$number = (int)readline("Enter the number: ");
if($number < 0){
    echo "$number is negative number". PHP_EOL;
}elseif ($number > 0){
    echo "$number is positive number". PHP_EOL;
}else {
    echo "It is zero". PHP_EOL;
}
