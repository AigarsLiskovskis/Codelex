<?php

class Geometry
{

    static function circleArea(int $radius): int
    {
        return M_PI * $radius ** 2;
    }

    static function rectangleArea(int $length, int $width): int
    {
        return $length * $width;
    }

    static function triangleArea(int $base, int $height): int
    {
        return $base * $height * 0.5;
    }

}

echo "Geometry Calculator:". PHP_EOL . PHP_EOL;
echo "1. Calculate the Area of a Circle". PHP_EOL;
echo "2. Calculate the Area of a Rectangle". PHP_EOL;
echo "3. Calculate the Area of a Triangle". PHP_EOL;
echo "4. Quit". PHP_EOL;
echo "Enter your choice (1-4) : ";

$selectAction = (int) readline();
switch ($selectAction){
    case 1:
        $radius = (int)readline("Input radius: ");
        if($radius <=0){
            echo "You used negative value!" . PHP_EOL;
            exit;
        }
        $result = Geometry::circleArea($radius);
        echo "Area is $result" . PHP_EOL;
        break;

    case 2:
        $length = (int)readline("Input length: ");
        $width = (int)readline("Input width: ");

        if($length <=0 || $width <=0){
            echo "You used negative value!" . PHP_EOL;
            exit;
        }
        $result = Geometry::rectangleArea($length, $width);
        echo "Area is $result" . PHP_EOL;
        break;

    case 3:
        $base = (int)readline("Input base: ");
        $height = (int)readline("Input height: ");

        if($base <=0 || $height <=0){
            echo "You used negative value!" . PHP_EOL;
            exit;
        }
        $result = Geometry::triangleArea($base, $height);
        echo "Area is $result" . PHP_EOL;
        break;
    case 4:
        exit;
    default:
        exit;
}

