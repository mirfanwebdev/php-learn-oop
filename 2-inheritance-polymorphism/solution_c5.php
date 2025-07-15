<?php

class Employee
{
    protected string $name;
    protected string $id;
    protected float $salary;

    public function __construct(string $name, string $id, float $salary)
    {
        $this->name = $name;
        $this->id = $id;
        $this->salary = $salary;
    }

    public function calculatePay(): float
    {
        return $this->salary;
    }

    public function displayInfo(): void
    {
        echo "Name: " . $this->name . PHP_EOL;
        echo "ID: " . $this->id . PHP_EOL;
        echo "Base Salary: $" . $this->salary . PHP_EOL;
        echo "Calculated Pay: $" . number_format($this->calculatePay(), 2) . PHP_EOL;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}

class Manager extends Employee
{
    private float $bonus;

    public function __construct(string $name, string $id, float $salary, float $bonus)
    {
        parent::__construct($name, $id, $salary);
        $this->bonus = $bonus;
    }

    public function calculatePay(): float
    {
        return parent::calculatePay() + $this->bonus;
    }

    public function displayInfo(): void
    {
        parent::displayInfo();
        echo "Bonus: $" . number_format($this->bonus, 2) . PHP_EOL;
    }

    public function getBonus(): float
    {
        return $this->bonus;
    }
}

class Developer extends Employee
{
    private string $progLang;
    private const HOURLY_RATE = 20.0;
    private const HOURS_PER_MONTH = 160.0;

    public function __construct(string $name, string $id, float $salary, string $progLang)
    {
        parent::__construct($name, $id, $salary);
        $this->progLang = $progLang;
    }

    public function calculatePay(): float
    {
        return self::HOURLY_RATE * self::HOURS_PER_MONTH;
    }

    public function displayInfo(): void
    {
        parent::displayInfo();
        echo "Programming Language: " . $this->progLang . PHP_EOL;
    }

    public function getLanguage(): string
    {
        return $this->progLang;
    }
}

echo "--- Employee Management System Example (Inheritance & Overriding) ---" . PHP_EOL;

// Create different employee types
$emp1 = new Employee("Alice Johnson", "E001", 3000.00);
$mgr1 = new Manager("Bob Williams", "M001", 5000.00, 1000.00); // Base + Bonus
$dev1 = new Developer("Charlie Brown", "D001", 4000.00, "PHP"); // Hourly based

echo "Individual Employee Details:" . PHP_EOL;
$emp1->displayInfo();
echo "---" . PHP_EOL;
$mgr1->displayInfo();
echo "---" . PHP_EOL;
$dev1->displayInfo();
echo "---" . PHP_EOL;

echo "--- Demonstrating Polymorphism with Employees ---" . PHP_EOL;

// Create an array of Employee objects (mixing different types)
$employees = [
    $emp1,
    $mgr1,
    $dev1,
    new Manager("Diana Prince", "M002", 6000.00, 1500.00),
    new Developer("Clark Kent", "D002", 4500.00, "JavaScript")
];

echo "Processing all employees in a loop:" . PHP_EOL;
foreach ($employees as $employee) {
    echo "Employee Type: " . get_class($employee) . PHP_EOL; // To see the actual class
    $employee->displayInfo(); // Polymorphism: The correct displayInfo() for each type is called
    echo "--------------------" . PHP_EOL;
}

echo PHP_EOL;
