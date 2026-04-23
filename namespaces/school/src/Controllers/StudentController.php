<?php
declare(strict_types=1);

namespace School\Controllers;

use School\Services\StudentService;

class StudentController {

    private StudentService $service;

    public function __construct() {
        $this->service = new StudentService();
    }

    public function index(): void {
        $students = $this->service->getAllStudents();

        echo "All Students <br />";
        foreach ($students as $student) {
            echo "[{$student->id}] {$student->firstName} {$student->lastName}"
                . " — age: {$student->age}"
                . " — grade: {$student->grade}\n";
        }
        echo "<br />";
    }

    public function show(int $id): void {
        echo "Student{$id} <br />";
        try {
            $student = $this->service->getStudent($id);
            echo "Name:  {$student->firstName} {$student->lastName}\n";
            echo "Age:   {$student->age}\n";
            echo "Grade: {$student->grade}\n";
        } catch (\Exception $err) {
            echo "Error: {$err->getMessage()}\n";
        }
        echo "\n";
    }

    public function top(): void {
        echo "=== Top Students ===\n";
        try {
            $students = $this->service->getTopStudents();
            foreach ($students as $student) {
                echo "[{$student->id}] {$student->firstName} {$student->lastName}"
                    . " — grade: {$student->grade}\n";
            }
        } catch (\Exception $err) {
            echo "Error: {$err->getMessage()}\n";
        }
        echo "\n";
    }
}