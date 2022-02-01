<?php

$fruitsWeights = [
    [
        'fruit' => 'apples',
        'weight' => 17
    ], [
        'fruit' => 'oranges',
        'weight' => 3
    ], [
        'fruit' => 'pears',
        'weight' => 15
    ]];

$priceForWeight = [
    'wightLess10' => 1,
    'weightMore10' => 2
];

function fruitWeightShipping(array $fruits, array $weight): string
{
    $info = '';
    foreach ($fruits as $fruit) {
        $info .= $fruit['fruit'] . ': ' . (($fruit['weight'] > 10) ?
                'more than 10kg;' . ' Shipping cost: ' . $weight['weightMore10'] . " EUR." :
                'less then 10kg;' . ' Shipping cost: ' . $weight['wightLess10'] . " EUR.") . "\n";
    }
    return $info;
}

echo fruitWeightShipping($fruitsWeights, $priceForWeight);