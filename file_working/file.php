<?php
declare(strict_types=1);

$opfile = fopen("errors.log", "a") or die("Unable to open file!");
$errText = "Error occured while uploading file!";
fwrite($opfile, $errText);
fclose($opfile);

$opfile = fopen("errors.log", "r") or die("Unable to open file!");

while (!feof($opfile)) {
    $line = htmlentities(fgets($opfile));
    echo $line . PHP_EOL;
}
fclose($opfile);

$cacheFile = fopen("cache/index.html", 'r') or die("Unable to open file!");
if (file_exists("cache/index.html")) {
    $content = file_get_contents("cache/index.html");
    echo $content;
}
fclose($cacheFile);

$data = fopen("data/data.csv", 'a');
$newContent = "user5";
fwrite($data, $newContent);
fseek($data, 0);
fclose($data);

$file = fopen("cache/index.html", "r");
$chunkSize = 1024 * 1024;
while (!feof($file)) {
    echo fread($file, $chunkSize);
}