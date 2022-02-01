<?php

//echo "Input the 1st number: ";

//echo "Input the 2nd number: ";

//echo "Input the 3rd number: ";

//todo print the largest number

echo "The largest number" . PHP_EOL;

$firstNumber = (int) readline("Enter the first number: ");
$secondNumber = (int) readline("Enter the second number: ");
$thirdNumber = (int) readline("Enter the third number: ");

if($firstNumber > $secondNumber && $firstNumber > $thirdNumber){
    echo "$firstNumber is the largest number". PHP_EOL;
}
if($firstNumber < $secondNumber && $secondNumber > $thirdNumber){
    echo "$secondNumber is the largest number". PHP_EOL;
}
if($thirdNumber > $secondNumber && $firstNumber < $thirdNumber){
    echo "$thirdNumber is the largest number". PHP_EOL;
}
