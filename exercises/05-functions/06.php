<?php

$mixed = [4, 6, 8, 3.17, 'string'];
function doubleInt(array $mix): string
{

    $result = '';
    for ($i = 0; $i < count($mix); $i++) {
        $element = $mix[$i];
        if (is_int($element)) {
            $element *= 2;
        }
        $result .= $element . ' ';
    }
    return $result . PHP_EOL;
}

echo doubleInt($mixed);