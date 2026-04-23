<?php
declare(strict_types=1);

require 'src/Models/Student.php';
require 'src/Repositories/StudentRepository.php';
require 'src/Services/StudentService.php';
require 'src/Controllers/StudentController.php';

use School\Controllers\StudentController;

$controller = new StudentController();

$controller->index();
$controller->show(2);
$controller->show(99);
$controller->top();