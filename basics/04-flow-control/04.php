<?php

echo "Day of week". PHP_EOL;

$dayNumber = (int)readline("Enter number of day(0-6): ");

if ($dayNumber >= 0 && $dayNumber <= 6) {
    switch ($dayNumber) {
        case 0:
            echo "Sunday" . PHP_EOL;
            break;
        case 1:
            echo "Monday" . PHP_EOL;
            break;
        case 2:
            echo "Tuesday" . PHP_EOL;
            break;
        case 3:
            echo "Wednesday" . PHP_EOL;
            break;
        case 4:
            echo "Thursday" . PHP_EOL;
            break;
        case 5:
            echo "Friday" . PHP_EOL;
            break;
        case 6:
            echo "Saturday" . PHP_EOL;
            break;
        default:
            exit;
    }
} else {
    echo "Not a valid day" . PHP_EOL;
}
