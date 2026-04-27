<?php
declare(strict_types=1);

namespace Employee\Models;

abstract class Employee {
    protected string $name;
    protected string $lastName;
    protected float $baseSalary;
    protected int $experience;

    public function __construct(string $name, float $baseSalary, int $experience, string $lastName) {
        $this->name = $name;
        $this->baseSalary = $baseSalary;
        $this->experience = $experience;
        $this->lastName = $lastName;
    }
    public function getName(): string {
        return $this->name;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getBaseSalary(): float {
        return $this->baseSalary;
    }
    public function getExperience(): int {
        return $this->experience;
    }
    abstract public function calculateBonus(): float;
}