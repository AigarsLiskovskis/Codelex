<?php

class Products
{
    public string $name;
    public int $price;
    public int $count;

    public function __construct(string $name, int $price, int $count)
    {
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }
}

class Shop
{
    public array $productList;

    public function addProducts(Products $product): void
    {
        $this->productList[] = $product;
    }

    public function output(): int
    {
        $sum = 0;
        foreach ($this->productList as $product) {
            $sum += $product->price * $product->count;
        }
        return $sum;
    }
}

$first = new Products("Piens", 2.5, 20);
$second = new Products("Siers", 4.0, 15);
$third = new Products("Sviests", 2.0, 10);

$market = new Shop();
$market->addProducts($first);
$market->addProducts($second);
$market->addProducts($third);

echo "$first->name : $first->price$, $first->count" . PHP_EOL;
echo "$second->name : $second->price$, $second->count" . PHP_EOL;
echo "$third->name : $third->price$, $third->count" . PHP_EOL;
echo "-----------------" . PHP_EOL;
echo "Sum is:  " . $market->output() . "$" . PHP_EOL;

