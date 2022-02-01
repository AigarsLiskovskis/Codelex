<?php

//Rock, Paper, Scissors, Lizard, Spock
$rockPaperScissors = ["rock", "paper", "scissors", "lizard", "spock"];
$gameBoard = [];
$pcSelected = $rockPaperScissors[array_rand($rockPaperScissors)];
$gameBoard[] = $pcSelected;
//echo "Pc goes with " . $pcSelected . PHP_EOL;

$winCombinations = [
    "rock" => ["scissors", "lizard"],
    "paper" => ["rock", "spock"],
    "scissors" => ["paper", "lizard"],
    "lizard" => ["spock", "paper"],
    "spock" => ["scissors", "rock"],
];

$playerSelection = (string)readline("Enter your choice (rock, paper, scissors, lizard, spock): ");
$gameBoard[] = $playerSelection;

if ($pcSelected === $playerSelection) {
    $gameBoard[] = "Tie!";
    echo "Tie!" . PHP_EOL;
    $fp = fopen('data.csv', 'a');
    fputcsv($fp, $gameBoard);
    fclose($fp);
    exit;
}

$win = (in_array($pcSelected, $winCombinations[$playerSelection])) ? "You won!": "You lost!";
echo $win;
echo PHP_EOL;
$gameBoard[] = $win;

$fp = fopen('data.csv', 'a');
fputcsv($fp, $gameBoard);
fclose($fp);

//if ($pcSelected === $playerSelection) {
//    echo "Tie!" . PHP_EOL;
//    exit;
//} elseif ($pcSelected === $firstItem) {
//    if ($playerSelection === $secondItem) {
//        echo "You won!" . PHP_EOL;
//    } else {
//        echo "Pc wins!" . PHP_EOL;
//    }
//    exit;
//} elseif ($pcSelected === $secondItem) {
//    if ($playerSelection === $thirdItem) {
//        echo "You won!" . PHP_EOL;
//    } else {
//        echo "Pc wins!" . PHP_EOL;
//    }
//    exit;
//} elseif ($pcSelected === $thirdItem) {
//    if ($playerSelection === $firstItem) {
//        echo "You won!" . PHP_EOL;
//    } else {
//        echo "Pc wins!" . PHP_EOL;
//    }
//    exit;
//} else {
//    echo "Wrong input!";
//    exit;
//}
