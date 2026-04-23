<?php
declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/src/Data/Storage.php';
require_once __DIR__ . '/src/Models/Employee.php';
require_once __DIR__ . '/src/Models/Manager.php';
require_once __DIR__ . '/src/Models/Developer.php';
require_once __DIR__ . '/src/Services/Calculator.php';

use Employee\Data\Storage;
use Employee\Models\Manager;
use Employee\Models\Developer;
use Employee\Services\Calculator;

$calculator = new Calculator();
$rawEmployees = Storage::getRawData();

$totalEmployees = count($rawEmployees);
$totalPayroll = 0;
$employeesObjects = [];

foreach ($rawEmployees as $data) {
    if ($data['role'] === 'Manager') {
        $employeesObjects[] = new Manager($data['name'], $data['salary'], $data['experience']);
    } elseif ($data['role'] === 'Developer') {
        $employeesObjects[] = new Developer($data['name'], $data['salary'], $data['experience']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Employee Report</title>
</head>
<body>

<h1>Salary Report</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Experience (Years)</th>
        <th>Base Salary</th>
        <th>Calculated Bonus</th>
        <th>Net Salary (After Taxes)</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($employeesObjects as $employee): ?>
        <?php
        $name = htmlspecialchars($employee->getName());
        $role = (new ReflectionClass($employee))->getShortName();
        $experience = $employee->getExperience();
        $baseSalary = $employee->getBaseSalary();
        $bonus = $employee->calculateBonus();
        $netSalary = $calculator->calculateNetSalary($employee);
        $totalPayroll += $netSalary;
        ?>
        <tr>
            <td><?= $name ?></td>
            <td><?= $role ?></td>
            <td><?= $experience ?></td>
            <td>֏<?= number_format($baseSalary, 2, '.', ',') ?></td>
            <td>֏<?= number_format($bonus, 2, '.', ',') ?></td>
            <td class="money">֏<?= number_format($netSalary, 2, '.', ',') ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="statistics">
    <h2>Overall Company Statistics</h2>
    <p>Total employees: <strong><?= $totalEmployees ?></strong></p>
    <p>Total payroll (net payout): <span class="money">֏<?= number_format($totalPayroll, 2, '.', ',') ?></span></p>
</div>

</body>
</html>