<?php

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract function makeSound(): string;

    abstract function eat(): string;
}

class Dog extends Animal
{
    private string $breed;

    public function __construct(string $name, string $breed)
    {
        parent::__construct($name);
        $this->breed = $breed;
    }

    public function makeSound(): string
    {
        return $this->name . "a " . $this->breed . " says Woof! Woof!";
    }

    public function eat(): string
    {
        return "eating bones.";
    }

    public function getBreed(): string
    {
        return $this->breed;
    }
}

class Cat extends Animal
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
    public function makeSound(): string
    {
        return $this->name . " says " . "Meow! Meow!";
    }

    public function eat(): string
    {
        return "eating fish.";
    }
}

class Cow extends Animal
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
    public function makeSound(): string
    {
        return $this->name . " says " . "Moo! Moo!";
    }

    public function eat(): string
    {
        return "eating grass.";
    }
}

$dog = new Dog("Rex", "Golden Retriever");
$cat = new Cat("Whiskers");
$cow = new Cow("Bessie");

$array = [$dog, $cat, $cow];

foreach ($array as $animal) {
    echo $animal->makeSound() . PHP_EOL;
    echo $animal->eat() . PHP_EOL;
    echo "------" . PHP_EOL;
}
