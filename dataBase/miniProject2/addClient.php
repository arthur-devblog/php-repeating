<?php
declare(strict_types=1);

require_once 'db.php';

$pdo = getConnection();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $insert = $pdo->prepare('INSERT INTO clients (name, last_name, email, phone_number) VALUES (:name, :last_name, :email, :phone_number)');

    $insert->execute([
        ':name' => $name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':phone_number' => $phone_number
    ]);

    echo "Client added";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="last_name" placeholder="Last name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone_number" placeholder="Phone number">
    <button type="submit">submit</button>
</form>
</body>
</html>