<?php
//
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: ";
foreach ($numbers as $number){
    echo $number. ' ';
}echo PHP_EOL;

//todo
sort($numbers);
echo "Sorted numeric array: ";
foreach ($numbers as $number) {
    echo $number . ' ';
}echo PHP_EOL;
$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: ";
foreach ($words as $word){
    echo $word. ' ';
}    echo PHP_EOL;

//todo
sort($words);
echo "Sorted string array: ";
foreach ($words as $word){
    echo $word. ' ';
}echo PHP_EOL;