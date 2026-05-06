<?php
declare(strict_types=1);

require_once ('db.php');

$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $prepare = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
    $prepare->execute([':email' => $email]);

    $client = $prepare->fetch();
    if ($client) {
        echo "Found: " . $client['name'] . $client['last_name'] . PHP_EOL;
        echo "Email: " . $client['email'] . PHP_EOL;
        echo "Phone: " . $client['phone_number'] . PHP_EOL;
    }
}