<?php
declare(strict_types=1);

namespace Employee\Models;

abstract class Employee {
    protected string $name;
    protected float $baseSalary;
    protected int $experience;

    public function __construct(string $name, float $baseSalary, int $experience) {
        $this->name = $name;
        $this->baseSalary = $baseSalary;
        $this->experience = $experience;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getBaseSalary(): float {
        return $this->baseSalary;
    }
    public function getExperience(): int {
        return $this->experience;
    }
    abstract public function calculateBonus(): float;
}