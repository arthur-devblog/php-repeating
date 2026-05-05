<?php
declare(strict_types=1);

class Temperature {
    private float $celsius;
    public function __construct(float $celsius)
    {
        $this->celsius = $celsius;
    }
    public function getCelsius(): float {
        return $this->celsius;
    }
    public function getFahrenheit(): float {
        return ($this->celsius * 9/5) + 32;
    }
    public function getKelvin(): float {
        return $this->celsius + 273.15;
    }
    public function setCelsius(): void {
        if ($this->celsius < -273.15) {
            throw new Exception("celsius is less than 273.15");
        }
    }
    public function description() : string {
        if ($this->celsius < 0) {
            return "cold" . PHP_EOL;
        }
        elseif ($this->celsius > 0 && $this->celsius < 10) {
            return "freeze" . PHP_EOL;
        }
        elseif ($this->celsius >15) {
            return "warm" . PHP_EOL;
        }
        return "normal" . PHP_EOL;
    }
}
$temperature = new Temperature(15.5);
try {
    $temperature->setCelsius();
} catch (Exception $e) {
    $e->getMessage();
}
print "Celsius " . $temperature->getCelsius() . PHP_EOL;
print "Fahrenheit " . $temperature->getFahrenheit() . PHP_EOL;
print "Kelvin " . $temperature->getKelvin() . PHP_EOL;
print "Description " . $temperature->description() . PHP_EOL;