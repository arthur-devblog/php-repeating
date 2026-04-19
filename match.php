<?php
declare(strict_types=1);

$a = 3;

switch($a) {
    case 1:
        echo "a is 1";
        break;
    case 2:
        echo "a is 2";
        break;
    case 3:
        echo "a is 3";
        break;
    default:
        echo "there is no any case";
}

//we have new better analog for php it is match
$b = 4;
match($b) {
    1 => $case1 = "b is 1",
    2 => $case2 = "b is 2",
    3 => $case3 = "b is 3",
    4 => $case4 = "b is 4",
    default => $defCase = "there is no any case",
};

echo $case1 . "<br />";
echo $case2 . "<br />";
echo $case3 . "<br />";
echo $case4 . "<br />"; //b is 4

