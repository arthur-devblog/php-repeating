<?php
declare(strict_types=1);

namespace Employee\Models;

class Developer extends Employee {
    public function calculateBonus(): float {
        if ($this->experience > 3) {
            return $this->baseSalary * 0.20;
        } else {
            return $this->baseSalary * 0.05;
        }
    }
}