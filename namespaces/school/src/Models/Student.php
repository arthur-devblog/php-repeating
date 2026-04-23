<?php
declare(strict_types=1);

namespace School\Models;

class Student {
    public int $id;
    public string $firstName;
    public string $lastName;
    public int $age;
    public float $grade;

    public function __construct($id, $firstName, $lastName, $age, $grade)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->grade = $grade;
    }
}
