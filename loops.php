<?php
declare(strict_types=1);

for ($i = 2; $i <= 20; $i+=2) {
    echo $i . "<br>";
}

$num = 10;
while ($num > 0) {
    echo $num . "<br />";
    $num--;
}

for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br />";
}