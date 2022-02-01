<?php


echo "Slot Machine!" . PHP_EOL;
//calculation = $startMoney += ($gainFactor * $keyElements[$key]) * $count;
$keyElements = [
    "A" => 0.5,
    "B" => 1,
    "C" => 1.5,
    "D" => 2
];

$spinCost = 5;
echo "One spin costs $spinCost$" . PHP_EOL;
$startMoney = (int)readline("Enter amount of money to start: ");

$bet = (int)readline("Enter spin bet: ");
if ($bet > $startMoney) {
    echo "Bet is too big!" . PHP_EOL;
    exit;
}
$startMoney -= $bet;
$gainFactor = $bet * 2;

$wheel = [
    ['-', '-', '-', '-'],
    ['-', '-', '-', '-'],
    ['-', '-', '-', '-']
];

$combinations = [
    [
        [0, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    [
        [2, 0], [1, 1], [0, 2], [0, 3]
    ],
    [
        [0, 0], [1, 1], [2, 2], [2, 3]
    ]
];

while (true) {
    $case = (int)readline("Enter: 1(SPIN), 2(Quit) ");
    switch ($case) {
        case 1:
            if ($startMoney < 5) {
                echo "Not enough money" . PHP_EOL;
                exit;
            }

            foreach ($wheel as $key => $item) {
                foreach ($item as $keyValue => $value) {
                    $wheel[$key][$keyValue] = array_rand($keyElements);
                }
            }

            $output = "";
            foreach ($wheel as $row) {
                foreach ($row as $columnItem) {
                    $output .= " $columnItem ";
                }
                $output .= PHP_EOL;
            }
            echo $output;

            $winningLetters = [];

            foreach ($combinations as $combination) {
                $uniqElements = [];
                foreach ($combination as $item) {
                    [$row, $column] = $item;
                    $uniqElements[] = $wheel[$row][$column];
                }
                if (count(array_unique($uniqElements)) === 1) {
                    $winningLetters[] = $wheel[$row][$column];
                    echo "Yes!  ";
                }
            }
            echo implode($winningLetters) . PHP_EOL;

            $lettersCounted = array_count_values($winningLetters);

            foreach ($lettersCounted as $key => $count) {
                $startMoney += ($gainFactor * $keyElements[$key]) * $count;
            };

            $startMoney -= $spinCost;
            echo "Balance: $startMoney" . PHP_EOL . PHP_EOL;
            break;
        case 2:
            echo "Your balance is $startMoney" . PHP_EOL;
            exit;
    }
}
