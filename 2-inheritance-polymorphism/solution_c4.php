<?php

abstract class Animal
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract function makeSound(): string;

    abstract function eat(): string;
}

class Dog extends Animal
{
    public string $breed;

    public function makeSound(): string
    {
        return "Woof! Woof!";
    }

    public function eat(): string
    {
        return "eating bones.";
    }
}

class Cat extends Animal
{
    public string $color;
    public function makeSound(): string
    {
        return "Meow! Meow!";
    }

    public function eat(): string
    {
        return "eating fish.";
    }
}

class Cow extends Animal
{
    public function makeSound(): string
    {
        return "Moo! Moo!";
    }

    public function eat(): string
    {
        return "eating grass.";
    }
}

$dog = new Dog("Rex");
$cat = new Cat("Whiskers");
$cow = new Cow("Bessie");

$array = [$dog, $cat, $cow];

foreach ($array as $animal) {
    echo $animal->name . " says " . $animal->makeSound() . PHP_EOL;
    echo $animal->name . " " . $animal->eat() . PHP_EOL;
}
