<?php
declare(strict_types=1);

namespace School\Repositories;
use School\Models\Student;
class StudentRepository{
    private array $students;

    public function __construct()
    {
        $this->students = [
            new Student(1, "Arthur", "Gishyan", 19, 20.0),
            new Student(2, "Gevorg", "Avetisyan", 19, 20.0),
            new Student(3, "Sevak", "Ghazaryan", 20, 10.7),
            new Student(4, "Liana", "Karapetyan", 19, 8.5),
            new Student(5, "Karen", "Kosyan", 19, 15.3)
        ];
    }
    public function findAll() : array {
        return $this->students;
    }

    public function findById(int $id) : ?Student {
        foreach ($this->students as $student) {
            if($student->id === $id) {
                return $student;
            }
        }
        return null;
    }

    public function findByGrade(int $grade) : array {
        $result = [];
        foreach ($this->students as $student) {
            if($student->grade === $grade) {
                $result[] = $student;
            }
        }
        return $result;
    }
}