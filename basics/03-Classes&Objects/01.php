<?php

class Product
{

    protected string $name;
    protected float $price;
    protected int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return $this->name . ", " . $this->price . " EUR, " . $this->amount . " units" . PHP_EOL;
    }

    public function changePrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function changeAmount($newAmount)
    {
        $this->amount = $newAmount;
    }
}

class ProductList
{
    protected array $list;

    public function addProduct(Product $product)
    {
        $this->list[] = $product;
    }

    public function listProducts(): string
    {
        $output = "";
        $i = 1;
        foreach ($this->list as $item) {
            $output .= "[$i] ". $item->printProduct();
            $i++;
        }
        return $output;
    }

    public function selectProduct($selectProduct){
        return $this->list[$selectProduct-1];
    }
}

$firstProduct = new Product("Logitech mouse", 70.00, 14);
$secondProduct = new Product("iPhone 5s", 999.99, 3);
$thirdProduct = new Product("Epson EB-U05", 440.46, 1);

$items = new ProductList();
$items->addProduct($firstProduct);
$items->addProduct($secondProduct);
$items->addProduct($thirdProduct);


while (1){
    echo $items->listProducts();
    $selectProduct = (int)readline("Enter product number to change values: ");
    $newPrice = (int)readline("Enter new price: ");
    $newAmount = (int)readline("Enter new amount: ");
    $items->selectProduct($selectProduct)->changePrice($newPrice);
    $items->selectProduct($selectProduct)->changeAmount($newAmount);
    echo $items->listProducts();
    exit;
}



