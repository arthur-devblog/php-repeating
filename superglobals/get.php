<?php
declare(strict_types=1);

$username = "Username not found";
$userage = "User Age Not Found";

if(isset($_GET["username"])) {
    $username = $_GET["username"];
}
if(isset($_GET["userage"])) {
    $userage = $_GET["userage"];
}
echo "Name: " . $username . "<br />" .  " Age: " . $userage;