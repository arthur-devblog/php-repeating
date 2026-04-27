<?php
declare(strict_types=1);

date_default_timezone_set('Asia/Yerevan');

echo"date now is " . date("Y-m-d H:i:s") . "<br/>";

echo "date got " . date_default_timezone_get() . "<br/>"; //Asia/Yerevan

echo date("d.m.Y") . "<br />";
echo date("Y/m/d/F/j") . "<br />";

date_default_timezone_set("UTC");
$d = mktime(0, 0, 0, 12, 31, 2010);
echo "day in 2010/12/31 was: " . date("l", $d) . "<br/>";

echo "time now is: " . time() . "<br/>"; //1777279303 seconds since unix creation