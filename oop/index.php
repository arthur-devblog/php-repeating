<?php
declare(strict_types=1);

class  Person {
    public $name, $age, $height, $weight, $onOff;

    public function __construct($name = 'undefined', $age = 21, $height = 100.0, $weight = 10.0, $onOff = false) {
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
        $this->onOff = $onOff;
    }
    public function info() : void{
        echo "Name: $this->name<br />Age: $this->age<br />Height: $this->height<br />Weight: $this->weight";
    }
    public function switchLight() : void {
        if ($this->onOff) {
            echo "<br /> $this->name turned on the lamp";
        }
        else {
            echo "<br /> $this->name turned off the lamp";
        }
    }
    public function __destruct() {
        echo "<br />$this->name Merav";
    }
}

$anshevan = new Person('Anshevan', 18, 187.5, 82, true);
$anshevan->info();
$anshevan->switchLight();

