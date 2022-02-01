<?php

[$name, $cash] = explode(',', file_get_contents('text.txt'));

$person = new stdClass();
$person->name = $name;
$person->cash = $cash;

function createProduct(string $name, int $price): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    return $product;
}

$products = [];

if (($handle = fopen("product.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000)) !== false) {
        [$name, $price] = $data;
        $products[] = createProduct($name, $price);
    }
    fclose($handle);
}

$basket = [];

if (file_exists('basket.txt')) {
    $basket = explode(',', file_get_contents('basket.txt'));
}


echo "$person->name has $person->cash$" . PHP_EOL . PHP_EOL;

while (true) {
    echo ' [1]  Purchase' . PHP_EOL;
    echo ' [2]  Checkout' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;

    $continue = (int)readline('Select an option: ') . PHP_EOL;

    switch ($continue) {
        case 1:
            foreach ($products as $index => $product) {
                echo "[$index] $product->name $product->price$" . PHP_EOL;
            }

            $selectedProductIndex = (int)readline('Select product: ');

            $product = $products[$selectedProductIndex] ?? null;

            if ($product === null) {
                echo "Product not found." . PHP_EOL;
                exit;
            }

            $basket[] = $selectedProductIndex;

            echo "Added $product->name to basket" . PHP_EOL . PHP_EOL;

            break;
        case 2:
            $totalSum = 0;
            foreach ($basket as $productIndex) {
                $product = $products[$productIndex];
                $totalSum += $product->price;
                echo $product->name . PHP_EOL;
            }
            echo "-----------------------" . PHP_EOL;
            echo "Total: $totalSum$" . PHP_EOL;
            echo $person->cash >= $totalSum ? "Successful payment" : "Not enough money";
            echo PHP_EOL;

            if (file_exists('basket.txt')) {
                unlink('basket.txt');
            }
            exit;
        default:
            $productsIndexes = implode(',', $basket);
            file_put_contents('basket.txt', $productsIndexes);
            exit;
    }
}
