<?php

class Square
{
    public function __construct(
        public float $height,
        public float $width
    ) {

    }
}

class Circle
{

    public function __construct(
        public float $radius
    ) {

    }
}

// class Triangle
// {
//     public function __construct(
//         public float $base,
//         public float $height
//     ) {

//     }
// }

class AreaCalculator
{
    private array $shapes = [];

    public function addShape(object $shape): void
    {
        array_push($this->shapes, $shape);
    }

    public function calculate(): float
    {
        $area = [];

        foreach ($this->shapes as $shape) {
            if (is_a($shape, "Square")) {
                $area[] = $shape->width * $shape->height;
            } else if (is_a($shape, "Circle")) {
                $area[] = pi() * pow($shape->radius, 2);
            }
            // else if (is_a($shape, "Triangle")) {
            //     $area[] = ($shape->base * $shape->height) / 2;
            // }
        }

        return array_sum($area);
    }
}

$square = new Square(10, 20);
$circle = new Circle(15);
// $traingle = new Triangle(30, 5);

// add shape
$area = new AreaCalculator();
$area->addShape($square);
$area->addShape($circle);
// $area->addShape($traingle);

// result
echo $area->calculate();
