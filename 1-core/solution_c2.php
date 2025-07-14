<?php
// Challenge 2: The Basic Car

class Car
{
    private string $make;
    private string $model;
    private int $year;
    private string $color;
    private float $speed;

    public function __construct(string $make, string $model, int $year, string $color)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->speed = 0;
    }

    public function getCurrentSpeed(): float
    {
        return $this->speed;
    }

    public function accel(int $amount): void
    {
        $this->speed += $amount;
    }

    public function brake(int $ammount): void
    {
        $this->speed -= $ammount;
    }

    public function displayInfo(): void
    {
        echo "Manufacture: " . $this->make . PHP_EOL;
        echo "Model: " . $this->model . PHP_EOL;
        echo "Year: " . $this->year . PHP_EOL;
        echo "Color: " . $this->color . PHP_EOL;
        echo "Current speed: " . $this->getCurrentSpeed() . " km/h" . PHP_EOL;
    }
}

$car = new Car("Toyota", "Corolla", 2022, "Blue");
echo "--- The Car ---" . PHP_EOL;
$car->displayInfo();
echo PHP_EOL;
$car->accel(50);
echo "Accelerating 50 km/h" . PHP_EOL;
echo "Current speed: " . $car->getCurrentSpeed() . " km/h" . PHP_EOL;
$car->brake(20);
echo "Braking 20 km/h" . PHP_EOL;
echo PHP_EOL;
$car->displayInfo();
