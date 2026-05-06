<?php
declare(strict_types=1);
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['admin_name'] !== 'admin' || $_POST['admin_password'] !== '123') {
        $errors[] = 'incorrect username or password';
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }
    if (empty($errors)) {
        $_POST['admin_name'] = $_SESSION['admin_name'];
        $_POST['admin_password'] = $_SESSION['admin_password'];
        header('Location: adminMenu.php');
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="admin_name" placeholder="Enter admin name">
    <input type="password" name="admin_password" placeholder="enter password">
    <button type="submit">submit</button>
</form>
</body>
</html>
