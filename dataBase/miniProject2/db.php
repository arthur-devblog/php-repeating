<?php
declare(strict_types=1);

function getConnection() {
    return new PDO('mysql:host=127.0.0.1;charset=utf8mb4;dbname=microloan_db', 'root', 'Root1234!');
}
