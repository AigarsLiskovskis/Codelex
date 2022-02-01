<?php

//Foo Corporation needs a program to calculate how much to pay their hourly employees.
// The US Department of Labor requires that employees get paid time and a half for any hours over
// 40 that they work in a single week. For example, if an employee works 45 hours,
// they get 5 hours of overtime, at 1.5 times their base pay.
// The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
// Foo Corp requires that an employee not work more than 60 hours in a week.
//
//Summary
//
//An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
//For every hour over 40, they get overtime = (base pay) × 1.5.
//The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
//If the number of hours is greater than 60, print an error message.
//
//Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
// Write a main method that calls this method for each of these employees:
//
//Employee	Base Pay	Hours Worked
//Employee 1	$7.50	35
//Employee 2	$8.20	47
//Employee 3	$10.00	73

$employee1 = new stdClass();
$employee1->basePay = 7.50;
$employee1->hoursWorked = 35;

$employee2 = new stdClass();
$employee2->basePay = 8.20;
$employee2->hoursWorked = 47;

$employee3 = new stdClass();
$employee3->basePay = 30.00;
$employee3->hoursWorked = 73;

$employees = [$employee1, $employee2, $employee3];

function totalPay(int $basePay, int $hoursWorked): string
{
    $overPay = 0;
    if ($basePay < 8.00) {
        return "To low base pay!" . PHP_EOL;
    }
    if ($hoursWorked > 60) {
        return "Too many hours worked!" . PHP_EOL;
    }
    if ($hoursWorked > 40) {
        $overTime = $hoursWorked - 40;
        $overPay = $overTime * ($basePay * 1.5);
        $hoursWorked -= $overTime;

    }
    return $hoursWorked * $basePay + $overPay . PHP_EOL;
}

function countSalary(array $array): string
{
    $result = '';
    foreach ($array as $employee) {
        $result .= totalPay($employee->basePay, $employee->hoursWorked);
    }
    return $result;
}

echo countSalary($employees);