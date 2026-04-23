<?php
declare(strict_types=1);

namespace Employee\Models;

class Manager extends Employee {
    public function calculateBonus(): float
    {
        return $this->baseSalary * 0.15;
    }
}