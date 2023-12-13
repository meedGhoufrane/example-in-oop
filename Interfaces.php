<?php

// Define an interface
interface Shape {
    public function calculateArea();
    public function calculatePerimeter();
}

// Implement the interface in a class
class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }

    public function calculatePerimeter() {
        return 2 * pi() * $this->radius;
    }
}

// Implement the interface in another class
class Rectangle implements Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }

    public function calculatePerimeter() {
        return 2 * ($this->length + $this->width);
    }
}

// Use the classes implementing the interface
$circle = new Circle(5);
echo "Circle Area: " . $circle->calculateArea() . "\n";
echo "Circle Perimeter: " . $circle->calculatePerimeter() . "\n";

$rectangle = new Rectangle(4, 6);
echo "Rectangle Area: " . $rectangle->calculateArea() . "\n";
echo "Rectangle Perimeter: " . $rectangle->calculatePerimeter() . "\n";

?>
