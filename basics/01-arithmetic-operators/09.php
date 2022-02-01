<?php

//Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
// A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
// If the BMI is less than 18.5, the person is considered underweight.
// If the BMI value is greater than 25, the person is considered overweight.
//
//Your program must accept metric units.

$weight = readline('Enter your weight in kg: ');
$height = readline('Enter your height in meters: ');

function bmi(int $weight, int $height): string
{
    $bmi = $weight / $height**2;
    if($bmi<18.5){
        $message = "You are underweight!";
    }elseif($bmi>25){
        $message = "You are overweight!";
    } $message = "Your weight is optimal.";
return $message .' Your BMI is '. number_format((float)$bmi, 2).PHP_EOL;
}

echo bmi($weight, $height);