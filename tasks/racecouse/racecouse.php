<?php

$fieldLine = "_";
$length = 15;
$playerSymbol = "*";
$winners = [];
$players = [[""], [""], [""], [""]];

echo "RaceCourse" . PHP_EOL;
$input = (int)readline("Enter player count (1-4): ");
$select = (int)readline("Select racer (1,2,3,4): ");
if ($select > $input || $select < 1) {
    echo "Wrong input, try again later!" . PHP_EOL;
    exit;
}
$bet = (int)readline("Enter your bet: ");

for ($racer = 0; $racer < $input; $racer++) {
    $players[$racer][] = $playerSymbol;
    for ($field = 0; $field < ($length - 1); $field++) {
        $players[$racer][] .= $fieldLine;
    }
}

for ($steps = 0; $steps < ($length - 1); $steps++) {
    usleep(200000);
    echo "Race in progress!" . PHP_EOL;
    foreach ($players as $player) {
        echo implode($player) . PHP_EOL;
    }
    if ($players[0] == $players[1] && $players[1] == $players[2] && $players[2] == $players[3]) {
        if ($playerSymbol == end($player)) {
            echo "Finish!" . PHP_EOL;
            break;
        }
    }
    for ($i = 0; $i < $input; $i++) {
        $speed = rand(1, 2);
        $player = $players[$i];
        $symbolIndex = array_search($playerSymbol, $players[$i]);
        if ($symbolIndex >= $length - 1) {
            $speed = 1;
        }
        if ($symbolIndex >= $length) {
            $winners[] = $i;
            continue;
        }
        $players[$i][$symbolIndex + $speed] = $playerSymbol;
        $players[$i][$symbolIndex] = $fieldLine;
    }
}

$values = array_count_values($winners);
$max = max($values);
$maxIndex = array_search($max, $values);
if (($select - 1) == $maxIndex) {
    $winning = $input * $select * $bet;
    echo "You got lucky!" . PHP_EOL;
    echo "Your winning is $winning$" . PHP_EOL;
} else {
    echo "Better luck next time." . PHP_EOL;
}
