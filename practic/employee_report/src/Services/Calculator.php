<?php
declare(strict_types=1);

namespace Employee\Services;
use Employee\Models\Employee;

class Calculator {
    private const TAX_RATE = 0.13;
    public function calculateNetSalary(Employee $employee): int|float {
       $baseSalary = $employee->getBaseSalary();
       $bonus = $employee->calculateBonus();
       $noTaxSalary = $baseSalary + $bonus;
       $taxSalary = $noTaxSalary * (self::TAX_RATE);
       return $noTaxSalary - $taxSalary;
    }
}