<?php

$items = [
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 50,
        "birthday" => "02.02.2020."
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 41,
        "birthday" => "01.01.2021."
    ],
    [
        "name" => "Janet",
        "surname" => "Dona",
        "age" => 86,
        "birthday" => "03.03.2016."
    ]
];
foreach ($items as $item) {
    foreach ($item as $key => $data) {
        echo $key ." => " . $data. "\n";

    } echo PHP_EOL;
}