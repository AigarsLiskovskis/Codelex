<?php

//TicTacToe

$gameFile = file_get_contents("default.txt");
[$board, $combinations] = explode(PHP_EOL, $gameFile);

$board = explode(':', $board);
$board = explode('x', $board[1]);

$columnDelimiter = 0;
$rowDelimiter = 0;

$gameBoard = [];

for ($i = 0; $i < $board[0]; $i++) {
    $gameBoard[$i] = [];
    $columnDelimiter += 1;
    $rowDelimiter += 1;
    for ($j = 0; $j < $board[1]; $j++) {
        $gameBoard[$i][] = "-";
    }
}

$board = $gameBoard;

$player1 = 'X';
$player2 = '0';

$activePlayer = $player1;

$combinations = explode(':', $combinations);
$combinations = explode('|', $combinations[1]);

foreach ($combinations as $key => $combination) {
    $combinations[$key] = explode(';', $combination);
}

foreach ($combinations as $key => $combination) {
    foreach ($combination as $y => $item)
        $combinations[$key][$y] = explode(',', $item);
}

function winner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($activePlayer !== $board[$row][$column]) {
                break;
            }
            if (end($combination) === $item) {
                return true;
            }
        }
    }
    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

function field(array $board, string $player1, string $player2, int $columnDelimiter, int $rowDelimiter): string
{
    $y = 1;
    $output = '';
    foreach ($board as $row) {
        $x = 1;
        foreach ($row as $columnItem) {
            switch ($columnItem) {
                case $player1:
                    $cell = " $player1 ";
                    break;
                case $player2:
                    $cell = " $player2 ";
                    break;
                default:
                    $cell = '   ';
            }
            $output .= $cell;
            if ($x < $columnDelimiter) {
                $output .= '|';
            }
            $x += 1;
        }
        if ($y < $rowDelimiter) {
            $output .= PHP_EOL . str_repeat('--- ', $rowDelimiter) . PHP_EOL;
        }
        $y += 1;
    }
    return $output . PHP_EOL;
}

$firstPlayerSymbol = readline("Enter first player symbol: ");
$secondPlayerSymbol = readline("Enter second player symbol: ");
$player1 = $firstPlayerSymbol;
$player2 = $secondPlayerSymbol;
$playerToStart = readline("Witch player will start this game? $player1 or $player2 ");
$activePlayer = $playerToStart;

while (!isBoardFull($board) && !winner($combinations, $board, $activePlayer)) {
    echo PHP_EOL;
    echo field($board, $player1, $player2, $columnDelimiter, $rowDelimiter);
    echo PHP_EOL;
    $position = readline("$activePlayer enter position: ");
    [$row, $column] = explode(',', $position);

    if ($board[$row] [$column] !== '-') {
        echo "Invalid position. It's taken" . PHP_EOL;
        continue;
    }

    $board[$row] [$column] = $activePlayer;

    if (winner($combinations, $board, $activePlayer)) {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;

}
echo 'The game was tie!';
echo PHP_EOL;