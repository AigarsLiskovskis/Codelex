<?php

function plusCodelex(string $str): string
{
    return $str . "codelex" . PHP_EOL;

}

$string = "123";
echo plusCodelex($string);