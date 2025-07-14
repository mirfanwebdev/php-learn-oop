<?php
// challenge 1: The Simple Calculator
class Calculator
{
    private float $num1;
    private float $num2;

    public function getNum1(): float
    {
        return $this->num1;
    }

    public function getNum2(): float
    {
        return $this->num2;
    }

    public function setNum1(int $value): void
    {
        $this->num1 = $value;
    }

    public function setNum2(int $value): void
    {
        $this->num2 = $value;
    }

    public function add(): float
    {
        return $this->num1 + $this->num2;
    }

    public function substract(): float
    {
        return $this->num1 - $this->num2;
    }

    public function multiply(): float
    {
        return $this->num1 * $this->num2;
    }

    public function divide(): float
    {
        if ($this->num2 == 0) {
            throw new Exception("Cannot divide by zero");
        }
        return $this->num1 / $this->num2;
    }
}

echo "--- Calculator ---" . PHP_EOL;
$calc = new Calculator();
$calc->setNum1(4);
$calc->setNum2(5);

echo "Add: " . $calc->add() . PHP_EOL;
echo "Substract: " . $calc->substract() . PHP_EOL;
echo "Multiply: " . $calc->multiply() . PHP_EOL;
try {
    echo "Divide: " . $calc->divide() . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
