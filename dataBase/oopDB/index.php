<?php
declare(strict_types=1);

require_once('Connection.php');

$pdo = new Connection();

$pdo->exec('CREATE DATABASE IF NOT EXISTS testOOP');
$pdo->exec('CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    UNIQUE INDEX unique_email (email)
)');

$pdo->execute(
    'INSERT IGNORE INTO users (userName, email) VALUES(:userName, :email)',
    [':userName' => 'admin', ':email' => 'example@gmail.com']
);

$pdo->execute('INSERT IGNORE INTO users (userName, email) VALUES(:userName, :email)',
    [':userName' => 'Arthur', ':email' => 'arturgishyan2006@gmail.com']
);

$result = $pdo->query('SELECT * FROM users');

echo '<pre>';
print_r($result);
echo '</pre>';
echo '<br>';

//$pdo->exec('DROP TABLE IF EXISTS users');