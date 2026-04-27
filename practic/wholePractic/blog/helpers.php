<?php
declare(strict_types=1);
session_start();
date_default_timezone_set("Asia/Yerevan");

function formatTitle(string $title) : string {
    $formatedTitle = trim(ucfirst(mb_strtolower($title)));
    return str_replace('--', '-', $formatedTitle);

}

echo formatTitle('--HELLO--WORLD--' . "<br />");

function getExcerpt(string $text, int $length = 150) : string {
    if (mb_strlen($text) > $length) {
        $text = mb_substr($text, 0, $length) . '...';
        return $text;
    }
    return $text;
}

$myText = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
echo getExcerpt($myText, 50) . "<br / >";

//cookie
if (isset($_COOKIE["last_visit"])) {
    echo "welcome back" . PHP_EOL;
} else {
    setcookie("last_visit", date("Y-m-d H:i:s"), time() + 60 * 60 * 24 * 30);
    echo "welcome" . PHP_EOL;
}

//session
if(isset($_GET['reset'])) {
    unset($_SESSION['visits']);
    header('Location: helpers.php');
    exit();
}
if(!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits'] += 1;
}

echo "You entered to website " . $_SESSION['visits'] . " times" . "<br />";
echo "<a href='?reset=1'>Reset</a>";

$flash = null;
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

if (isset($_GET['reset'])) {
    unset($_SESSION['visits']);
    header('Location: helpers.php');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'save') {
    $_SESSION['flash'] = "Data saved successfully!";
    header('Location: helpers.php');
    exit();
}