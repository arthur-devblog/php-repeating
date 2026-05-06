<?php
declare(strict_types=1);

$dsn      = "mysql:host=127.0.0.1;charset=utf8mb4";
$username = "root";
$password = "Root1234!";

//CREATE TABLE IF NOT EXISTS loans;
//CREATE TABLE IF NOT EXISTS payments;

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS online_shop");

} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

$pdo->exec("USE online_shop");

$pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id       INT AUTO_INCREMENT PRIMARY KEY,
        name     VARCHAR(255) NOT NULL,
        category VARCHAR(100) NOT NULL,
        price    DECIMAL(10,2) NOT NULL,
        quantity INT NOT NULL DEFAULT 0
    )");

$stmt = $pdo->prepare("
        INSERT IGNORE INTO products (name, category, price, quantity)
        VALUES (:name, :category, :price, :quantity)
    ");

$stmt->execute([':name' => 'iPhone 15',         ':category' => 'SmartPhone', ':price' => 95000,  ':quantity' => 4]);
$stmt->execute([':name' => 'Asus Vivobook x16', ':category' => 'Laptop',     ':price' => 178000, ':quantity' => 2]);
$stmt->execute([':name' => 'Samsung Galaxy S24',':category' => 'SmartPhone', ':price' => 80000,  ':quantity' => 7]);
$stmt->execute([':name' => 'MacBook Air',        ':category' => 'Laptop',    ':price' => 120000, ':quantity' => 1]);
$stmt->execute([':name' => 'iPad Pro',           ':category' => 'Tablet',    ':price' => 110000, ':quantity' => 2]);
$stmt->execute([':name' => 'Xiaomi Pad 6',       ':category' => 'Tablet',    ':price' => 35000,  ':quantity' => 10]);

$result   = $pdo->query("SELECT * FROM products ORDER BY id ASC");
$products = $result->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['category']) ?></td>
            <td><?= $product['price'] ?> AMD.</td>
            <td><?= $product['quantity'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>