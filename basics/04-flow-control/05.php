<?php

echo "PhoneKeyPad" . PHP_EOL;

$text = str_split(strtoupper((string)readline("Enter text: ")));

$output = "";

foreach ($text as $item){
    switch ($item) {
        case "A":
        case "B":
        case "C":
            $output .= "2";
            break;
        case "D":
        case "E":
        case "F":
            $output .= "3";
            break;
        case "G":
        case "H":
        case "I":
            $output .= "4";
            break;
        case "J":
        case "K":
        case "L":
            $output .= "5";
            break;
        case "M":
        case "N":
        case "O":
            $output .= "6";
            break;
        case "P":
        case "Q":
        case "R":
        case "S":
            $output .= "7";
            break;
        case "T":
        case "U":
        case "V":
            $output .= "8";
            break;
        case "W":
        case "X":
        case "Y":
        case "Z":
            $output .= "9";
            break;
    }
}
echo $output . PHP_EOL;
