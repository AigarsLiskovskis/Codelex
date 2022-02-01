<?php

//Write a program to play a word-guessing game like Hangman.
//
//It must randomly choose a word from a list of words.
//It must stop when all the letters are guessed.
//It must give them limited tries and stop after they run out.
//It must display letters they have already guessed (either only the incorrect guesses or all guesses).
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ _ _ _ _ _ _ _ _
//
//Misses:
//
//Guess:	e
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ _ _ _ _ _ _
//
//Misses:
//
//Guess:	i
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i _ _ _ _ _
//
//Misses:
//
//Guess:	a
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:
//
//Guess:	r
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:	r
//
//Guess:	s
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:	rs
//
//Guess:	t
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a _
//
//Misses:	rs
//
//Guess:	n
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a n
//
//Misses:	rs
//
//Guess:	o
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a n
//
//Misses:	rso
//
//Guess:	l
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e _ i a t _ a n
//
//Misses:	rso
//
//Guess:	v
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e v i a t _ a n
//
//Misses:	rso
//
//Guess:	h
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e v i a t h a n
//
//Misses:	rso
//
//YOU GOT IT!
//
//Play "again" or "quit"? qui

$wordFile = file_get_contents("words.txt");

$wordList = explode(PHP_EOL, $wordFile);

foreach ($wordList as $word) {
    $word = explode(PHP_EOL, $wordFile);
}

function game(array $wordList): void
{
    $randomWord = array_rand($wordList);
    $selected_word = $wordList[$randomWord];
    $wordToGuess = str_split($selected_word);
    $misses = '';
    $line = [];
    $exitCount = count($wordToGuess) + 3;
    $masked = str_replace($wordToGuess, "_" . ' ', $wordToGuess);

    foreach ($masked as $item) {
        $line[] = $item;
    }

    while (true) {
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
        echo "Word:   " . implode($line) . PHP_EOL;
        echo "Misses: $misses" . PHP_EOL;
        if ($wordToGuess == $line) {
            echo "YOU GOT IT!" . PHP_EOL;
            $do = readline('Play "again" or "quit"? ');
            switch ($do) {
                case "again":
                    game($wordList);
                    break;
                case "quit":
                    exit("GAME OVER!" . PHP_EOL);
            }
        }
        $guess = (string)readline("Guess:  ");
        foreach ($wordToGuess as $key => $letter) {
            if ($letter == $guess) {
                $line[$key] = $letter;
            }
        }
        $misses .= in_array($guess, $line) ? '' : $guess;
        if ($exitCount == 0) exit("GAME OVER!" . PHP_EOL);
        $exitCount--;
    }
}

echo game($wordList);
