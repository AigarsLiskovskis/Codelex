<?php

abstract class Shapes
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Triangle extends Shapes
{
    protected int $base;
    protected int $height;

    public function __construct(string $name, int $base, int $height)
    {
        parent::__construct($name);
        $this->base = $base;
        $this->height = $height;
    }

    public function area(): int
    {
        return $this->base * $this->height * 0.5;
    }
}

class Rectangle extends Shapes
{
    protected int $length;
    protected int $width;

    public function __construct(string $name, int $length, int $width)
    {
        parent::__construct($name);
        $this->length = $length;
        $this->width = $width;
    }

    public function area(): int
    {
        return $this->length * $this->width;
    }
}

class Circle extends Shapes
{
    protected int $radius;

    public function __construct(string $name, int $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function area(): int
    {
        return M_PI * $this->radius ** 2;
    }
}

class AreaSum
{
    private array $shapes;

    public function addArea(object $shape): void
    {
        $this->shapes[] = $shape;
    }

    public function output(): string
    {
        $output = 0;
        foreach ($this->shapes as $shape) {
            $output += $shape->area();
        }
        return "Sum of all areas is: " . $output . PHP_EOL;
    }

}

$sum = new AreaSum();

while (1)
{
    echo "*************************************". PHP_EOL;
    echo "       Shape Calculator:" . PHP_EOL;
    echo "1. Calculate the Area of a Circle" . PHP_EOL;
    echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
    echo "3. Calculate the Area of a Triangle" . PHP_EOL;
    echo "4. Calculate the Area of all Shapes" . PHP_EOL;
    echo "5. Quit" . PHP_EOL;
    echo "*************************************". PHP_EOL;
    echo "Enter your choice (1-5) : ";

    $selectAction = (int)readline();
    switch ($selectAction) {
        case 1:
            $name = "Circle";
            $radius = (int)readline("Input radius: ");
            if ($radius <= 0) {
                echo "You used negative value!" . PHP_EOL;
                exit;
            }
            $circle = new Circle($name, $radius);
            $sum->addArea($circle);
            echo $circle->getName() . " area is " . $circle->area() . PHP_EOL;
            break;

        case 2:
            $name = "Rectangle";
            $length = (int)readline("Input length: ");
            $width = (int)readline("Input width: ");

            if ($length <= 0 || $width <= 0) {
                echo "You used negative value!" . PHP_EOL;
                exit;
            }
            $rectangle = new Rectangle($name, $length, $width);
            $sum->addArea($rectangle);
            echo $rectangle->getName() . " area is " . $rectangle->area() . PHP_EOL;
            break;

        case 3:
            $name = "Triangle";
            $base = (int)readline("Input base: ");
            $height = (int)readline("Input height: ");

            if ($base <= 0 || $height <= 0) {
                echo "You used negative value!" . PHP_EOL;
                exit;
            }
            $triangle = new Triangle($name, $base, $height);
            $sum->addArea($triangle);
            echo $triangle->getName() . " area is " . $triangle->area() . PHP_EOL;
            break;

        case 4:
            echo $sum->output();
            break;
        case 5:
            exit;
        default:
            exit;
    }
}