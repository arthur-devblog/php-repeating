<?php
declare(strict_types=1);
//
//const PI = 3.14159;
//$username = "Arthur";
//$age = 19;
//$height = 173.0;
//$hasLicense = false;
//
//echo "number pi: " . PI . " username: $username\n userage: $age\n height: $height\n hasLicense: $hasLicense\n";
//
////ex2
//$n = 18;
//if ($n % 2 === 0) {
//    echo "number $n is even <br />";
//}
//if ($n % 2 === 1) {
//    echo "number $n is odd<br />";
//}
//if ($n % 3 === 0) {
//    echo "number $n is divisible by 3 <br />";
//}
//if ($n) {
//    echo "$n divided to 7 is: " . $n % 7 . "<br />";
//}
//
////ex3
//$str = " Hello! ";
//$newStr = trim(strtoupper($str));
//echo strpos($newStr, "ell");
//$completeStr = str_replace("!", " World!", $newStr);
//echo $completeStr;
//
////ex4
//$email = "user@exaple.com";
//$symbol = "@";
//if (str_contains($email, $symbol)) {
//    echo "email has @";
//}
//
////ex5
//$input = "The world is mine!";
//$subinput1 = substr($input, 2);
//$subinput2 = substr($input, 2, 4);
//echo $subinput1;
//echo "<br>";
//echo $subinput2;
//
//function generateNumbers() {
//    yield from [1,2,3,4,5];
//}
//foreach (generateNumbers() as $number) {
//    echo "number $number <br />";
//}
//
//var_dump(is_float(1.5)); //true
//
//echo "<br />";
//
//$myArr = [1,2,3,4,5];
//arsort($myArr, SORT_NUMERIC);
//print_r($myArr);
//
//echo "<br />";
//
//$asArr = ["A" => "1", "B" => "2", "C" => "3", "D" => "4", "E" => "5"];
//krsort($asArr, SORT_STRING);
//print_r($asArr); //Array ( [E] => 5 [D] => 4 [C] => 3 [B] => 2 [A] => 1 )
//
//echo "<br />";
//
//$mixArr = [0 => "Hello", "two" => "something", true => "natural sort"];
//natcasesort($mixArr);
//print_r($mixArr); //Array ( [0] => Hello [1] => natural sort [two] => something )  true is 1
//
//echo "<br />";
//$name = "Arthur";
//$age = 19;
//$height = 173.0;
//
//$newArr = compact("name", "age", "height");
//print_r($newArr);//Array ( [name] => Arthur [age] => 19 [height] => 173 )
//
//echo "<br />";
//
//$number = 10;
//
//$anonime = function () use ($number) {
//    return $number + 1;
//};
//echo $anonime();//11
//echo "<br />";
//echo $number;//10
//echo "<br />";
//
//echo gettype($number);
//echo "<br />";
//var_dump(isset($number)); //true
//echo "<br />";
//var_dump(empty($number)); //false
//echo "<br />";
//echo settype($number, "double");
//echo "<br />";
//echo gettype($number);
//
//echo "<br />";
//
//shuffle($mixArr);
//print_r($mixArr);
//
//echo "<br />";
//
//$myString = " something that typed ";
//echo strpos($myString, "something");
//trim($myString);
//echo "<br />";
//echo strlen($myString);
//$typed = substr($myString, 13, 4);
//echo $typed;

class A {
    public static function m1() {
        echo "Static A";
    }
}

class B extends A {
    public static function m1() {
        echo "Static B";
    }
}

$a = new A();
$b = new B();

$a->m1();
$b->m1();
$b::m1();
echo B::m1();

echo "<br/>";
$a_str = "hello";
echo get_debug_type($a_str);
$defined = get_defined_vars();
print_r ($defined);

