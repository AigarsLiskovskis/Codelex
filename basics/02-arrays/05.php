<?php

//Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.
//
//(...a game already in progress)
//
//	X   O
//	O X X
//	  X O
//
//'O', choose your location (row, column): 0 1
//
//	X O O
//	O X X
//	  X O
//
//'X', choose your location (row, column): 2 0
//
//	X O O
//	O X X
//	X X O
//
//The game is a tie.
//
//function display_board()
//{
//    echo "   |   |   \n";
//    echo "---+---+---\n";
//    echo "   |   |   \n";
//    echo "---+---+---\n";
//    echo "   |   |   \n";
//}
//
//display_board();


$gameField = [['','',''], ['','',''], ['','','']];
$player = 'X';
$fieldSelection = [];

function field(array $gameField): string
{
    $y = 0;
    $output = '';
    foreach ($gameField as $row){
        $x = 0;
        foreach ($row as $columnItem){
            switch($columnItem){
                case 'X':
                    $cell = ' X ';
                    break;
                case 'O':
                    $cell = ' O ';
                    break;
                default:
                    $cell = '   ';
            }
            $output .= $cell;
            if($x < 2){
                $output .= '|';
            }$x +=1;
        }
        if($y < 2){
            $output .= PHP_EOL . '---+---+---'. PHP_EOL;
        }$y +=1;
    }
    return $output. PHP_EOL;
}

function playerInput(array &$gameField, array &$fieldSelection, string &$player): array
{
    $fieldSelection =(array)
        explode(' ', readline("'$player ', choose your location (row (0-2), column (0-2)): " . PHP_EOL));
    if ($fieldSelection[0] > 2 || $fieldSelection[1] > 2 ||$fieldSelection[0] < 0 || $fieldSelection[1] < 0){
        echo "$player lost". PHP_EOL;
        die;
    }
    if ($gameField[$fieldSelection[0]][$fieldSelection[1]] == '') {
        $gameField[$fieldSelection[0]][$fieldSelection[1]] = $player;
        if ($player == 'X') {
            $player = 'O';
        } else {
            $player = 'X';
        }
    }
    return $gameField;
}

function winCheck(array $gameField, string $player)
{
    foreach ($gameField as $line) {
        if ($line[0] == $player && $line[1] == $player && $line[2] == $player) {
            die($player . ' wins' . PHP_EOL);
        }
        foreach ($line as $y => $item) {
            if ($gameField[0][$y] == $player && $gameField[1][$y] == $player && $gameField[2][$y] == $player) {
                die($player . ' wins' . PHP_EOL);
            }
        }
    }
    if ($gameField[0][0] == $player && $gameField[1][1] == $player && $gameField[2][2] == $player) {
        die($player . ' wins' . PHP_EOL);
    }
    if ($gameField[2][0] == $player && $gameField[1][1] == $player && $gameField[0][2] == $player) {
        die($player . ' wins' . PHP_EOL);
    }

    $emptyCell = 0;
    foreach ($gameField as $line){
        foreach ($line as $item) {
            if($item == ''){
                $emptyCell++;
            }
        }
    }
    if($emptyCell == 0)
        die('The game is a tie.'.PHP_EOL);
}

while (true){
    echo PHP_EOL;
    echo field($gameField);
    echo PHP_EOL;
    playerInput($gameField,$fieldSelection, $player);
    winCheck($gameField, $player);

}
