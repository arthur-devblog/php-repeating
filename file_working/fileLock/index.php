<?php
declare(strict_types=1);

$text = fopen(__DIR__ . "/textFiles/hello.txt", "a");

fwrite($text, "Hello World!\n How are you?\n Its good");
fclose($text);

$change = fopen(__DIR__ . "/textFiles/hello.txt", "r+");

$lock = flock($change, LOCK_EX);
if ($lock !== false) {
    $read = fgets($change);
    fseek($change, SEEK_SET);
    fwrite($change, "Greeting");
    fseek($change, SEEK_END);
    fwrite($change, "Goodbye");
    flock($change, LOCK_UN);
}
fclose($change);

$fd = fopen(__DIR__ . "/textFiles/chat.txt", "r+") or die("Unable to open file!");
$newContent = "Arthur---> Hello Guys!";

if(flock($fd, LOCK_EX)){
    ftruncate($fd, 0);
    fseek($fd, 0);
    fwrite($fd, $newContent);
    flock($fd, LOCK_UN);
}
fclose($fd);

$input = "The world is mine!";
$subinput1 = substr($input, 2);
echo $subinput1;