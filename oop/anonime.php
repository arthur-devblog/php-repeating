<?php
declare(strict_types = 1);

$person = new class('Gvidon', 41) {
    public function __construct(public string $name, public int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function birthday() : void{
        echo "Birthday of $this->name! he is $this->age years old!";
    }
};

$person->birthday();