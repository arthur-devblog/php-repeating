<?php
declare(strict_types=1);

namespace School\Services;

use School\Models\Student;
use School\Repositories\StudentRepository;

class StudentService {

    private StudentRepository $repository;

    public function __construct() {
        $this->repository = new StudentRepository();
    }

    public function getAllStudents(): array {
        return $this->repository->findAll();
    }

    public function getStudent(int $id): ?Student {
        $student = $this->repository->findById($id);

        if (empty($student)) {
            throw new \Exception("Student with ID {$id} not found");
        }

        return $student;
    }

    public function getTopStudents(): array {
        $all = $this->repository->findAll();
        $result = [];

        foreach ($all as $student) {
            if ($student->grade >= 18.0) {
                $result[] = $student;
            }
        }

        if (empty($result)) {
            throw new \Exception("No top students found");
        }

        return $result;
    }
}