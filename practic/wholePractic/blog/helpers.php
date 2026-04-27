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
