<?php
declare(strict_types=1);

$dsn = "mysql:host=127.0.0.1;charset=utf8mb4";
$username= "root";
$password= "Root1234!";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

try {
    $sql = "CREATE DATABASE myDB";
    $pdo->exec($sql);
    echo "Database created!";
} catch (PDOException $e) {
    echo $e->getMessage();
}

$pdo = null;

$newDsn = "mysql:host=127.0.0.1;dbname=myDB;charset=utf8mb4";
try {
    $pdo = new PDO($newDsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ($e->getMessage());
}

try {
    $table = "CREATE TABLE STUDENTS (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
    $pdo->exec($table);
    echo "Table created!";
} catch (PDOException $e) {
    echo "Creation fail: " . $e->getMessage();
}
$pdo = null;