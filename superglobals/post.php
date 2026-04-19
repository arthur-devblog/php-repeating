<?php
declare(strict_types=1);

$username = "Enter username";
$age = "Enter age";
$password = "Enter password";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars($_POST["age"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
}
echo "Name: " . $username . "<br />" .  " Age: " . $age;

?>

<form action="post.php" method="POST">
    <p>Name: <input type="text" name="username"> </p>
    <p>age: <input type="number" name="age"> </p>
    <p>password: <input type="password"> </p>
    <button type="submit">submit</button>
</form>
