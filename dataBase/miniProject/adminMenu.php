<?php
declare(strict_types=1);

$dsn = 'mysql:host=127.0.0.1;dbname=users;charset=utf8mb4';
$root_name = 'root';
$password = 'Root1234!';

try {
    $pdo = new PDO($dsn, $root_name, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$pdo->exec('CREATE DATABASE IF NOT EXISTS users') or die($pdo->errorInfo());

$pdo->exec('CREATE TABLE IF NOT EXISTS user_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    userage INT NOT NULL,
    userstatus VARCHAR(30) NOT NULL
)');
$roles = ['Admin', 'Moderator', 'Editor', 'Viewer'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $userage = (int)($_POST['userage'] ?? 0);
    $userstatus = $_POST['userstatus'] ?? '';

    if (empty($username)) {
        $errors[] = 'Username is required';
    }
    if ($userage < 1 || $userage > 120) {
        $errors[] = 'Age must be between 1 and 120';
    }
    if (!in_array($userstatus, $roles)) {
        $errors[] = 'select a valid role';
    }
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare('
                INSERT IGNORE INTO user_info (username, userage, userstatus)
                VALUES (:username, :userage, :userstatus)
            ');
            $stmt->execute([
                ':username'   => $username,
                ':userage'    => $userage,
                ':userstatus' => $userstatus
            ]);
            $success = true;
        } catch (PDOException $e) {
            $errors[] = 'An error occur: ' . $e->getMessage();
        }
    }
}

$users = $pdo->query('SELECT * FROM user_info ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin menu</title>
</head>
<body>

<h2>Add New User</h2>

<?php foreach ($errors as $error): ?>
    <p class="error"> <?= htmlspecialchars($error) ?></p>
<?php endforeach; ?>

<?php if ($success): ?>
    <p class="success"> User added successfully!</p>
<?php endif; ?>

<form action="" method="post">

    <input type="text"   name="username" placeholder="Enter username"
           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

    <input type="number" name="userage"  placeholder="Enter user age"
           value="<?= htmlspecialchars($_POST['userage'] ?? '') ?>">

    <select name="userstatus">
        <option value="" disabled selected>Select a role</option>
        <?php foreach ($roles as $role): ?>
            <option value="<?= $role ?>"
                <?= (($_POST['userstatus'] ?? '') === $role) ? 'selected' : '' ?>>
                <?= $role ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Add User</button>
</form>

<h2>All Users</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Age</th>
        <th>Role</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= $user['userage'] ?></td>
            <td><?= htmlspecialchars($user['userstatus']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>