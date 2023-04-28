<?php

interface Shape
{
    public function area(): float;
}

class Suare implements Shape
{
    public function __construct(
        public float $height,
        public float $width
    ) {

    }

    public function area(): float
    {
        return $this->height * $this->width;
    }
}

class Circle implements Shape
{

    public function __construct(
        public float $radius
    ) {

    }

    public function area(): float
    {
        return pi() * pow($this->radius, 2);
    }
}

// class Triangle implements Shape
// {
//     public function __construct(
//         public float $base,
//         public float $height
//     ) {

//     }

//     public function area(): float
//     {
//         return ($this->base * $this->height) / 2;
//     }
// }

class AreaCalculator
{
    private array $shapes = [];

    public function addShape(Shape $shape): void
    {
        array_push($this->shapes, $shape);
    }

    public function calculate(): float
    {
        return array_sum(array_map(fn($sh) => $sh->area(), $this->shapes));
    }
}

$square = new Suare(10, 20);
$circle = new Circle(15);
// $traingle = new Triangle(30, 5);

// add shape
$area = new AreaCalculator();
$area->addShape($square);
$area->addShape($circle);
// $area->addShape($traingle);

// result
echo $area->calculate();
