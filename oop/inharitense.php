<?php
declare(strict_types=1);

class Animal {
    public function __construct(protected string $type, protected string $name)
    {
        $this->type = $type;
        $this->name = $name;
    }
    public function makeNoise() : void {
        echo $this->type . ' with name: ' . $this->name . ' made noice' . PHP_EOL;
    }
}

class Dog extends Animal {
    public function __construct(string $type, string $name)
    {
        parent::__construct($type, $name);
    }

    public function makeNoise() : void {
        parent::makeNoise();
        echo "<br/> Haf!";
    }
}

$sharik = new Dog("pudel", "Sharik");
$sharik->makeNoise();

//using final we cant inharitense a variable or method
