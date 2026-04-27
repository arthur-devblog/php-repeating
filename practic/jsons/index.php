<?php
declare(strict_types = 1);

$user = [
    "name" => "Arthur",
    "lastName" => "Gishyan",
    "age" => 19,
    "university" => [
        "name" => "Asue",
        "faculty" => "informational Technology",
        "department" => "Informational Systems",
        "score" => 14.4
    ]
];

$jsonEnc = (json_encode($user,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
file_put_contents("users.json", $jsonEnc);

$jsonDec = json_decode(file_get_contents("users.json"), true);
echo "<pre>";
print_r($jsonDec);
echo "</pre>";

foreach ($jsonDec as $user => $prop) {
    echo "<pre>";
    echo $user . "\n" . "prop: " . $prop . "\n";
    echo "</pre>";
    foreach ($prop as $name => $value) {
        echo "<pre>";
        echo $name . ": " . $value . "\n";
        echo "</pre>";
    }
}