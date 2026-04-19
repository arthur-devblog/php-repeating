<?php
declare(strict_types=1);

$tmppath = __DIR__ . "/uploads/temp/tiger.jpg";
$finalpath = __DIR__ . "/uploads/tiger.jpg";
var_dump(file_exists($tmppath));//true

$move = rename($tmppath, $finalpath);
if ($move) {
    echo "File successfully renamed to $finalpath <br />";
}
else {
    echo "Failed to rename $tmppath <br />";
}

$original = "config/app.php";
$backup = "config/app.php.bak";

$copy = copy($original, $backup);
if ($copy) {
    echo "File successfully copied to $backup <br />";
}
else {
    echo "Failed to copy $backup <br />";
}

$dirs = "filesCatalogs/";
$newDirs = ["unlink", "rmdir"];

foreach ($newDirs as $newDir) {
    $createDir = mkdir(__DIR__ . "/" . $newDir);
    if ($createDir) {
        echo "Dir successfully created to $dirs <br />";
    }
    else {
        echo "Failed to create dir $newDir <br />";
    }
}

//unlinlk
$cahceFile = "unlink/cache.php";
$olDir = __DIR__ . "/uploads";

$deleteFile = unlink($cahceFile);
$deleteDir = rmdir($olDir);

if ($deleteFile) {
    echo "File successfully deleted from $olDir <br />";
}
else {
    echo "Failed to delete file from $olDir <br />";
}

if ($deleteDir) {
    echo "Successfully deleted $olDir <br />";
}
else {
    echo "Failed to delete dir $olDir <br />";
}

$path = getcwd();
echo $path;//home/arthur/PhpstormProjects/PHP_Lessons/php-repeating/file_working/filesCatalogs

$dir = getcwd();

if (is_dir($dir)) {
    if (($open = opendir($dir)) !== false) {
        while(($file = readdir($open))) {
            if(is_dir($file)) {
                echo $file . "<br />";
            }
            else {
                echo "FILE: $file<br />";
            }
        }
    }
    closedir($open);
}