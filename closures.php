<?php
declare(strict_types=1);

$var = 15;

$closure = function() use($var) {
    echo $var += 5;
};
$closure();//20
