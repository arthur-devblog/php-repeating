<?php
declare(strict_types = 1);

$data = [["Anna", "Berlin"], ["Carlos", "Madrid"], ["Li", "Beijing"]];

echo $data[1][0] . " " . $data[2][1] . "<br />";

$scores = [[5, 4, 3], [4, 4, 5], [3, 5, 4]];

foreach ($scores as $score) {
    echo "<tr>";
    foreach ($score as $item) {
        echo "<td>" . $item . "</td>";
    }
    echo "</tr>";
}

echo "<br />";

$catalog = [
    "fruits"  => ["apple", "banana", "cherry"],
    "veggies" => ["carrot", "potato"]
];

echo $catalog["fruits"][1] . " " . $catalog["veggies"][0] . "<br />";

$team = [
    "backend"  => ["Alex", "Maria"],
    "frontend" => ["Ivan", "Olga"],
];

foreach ($team as $teamItem => $member) {
    echo "$teamItem";
    foreach ($member as $memberItem) {
        echo "<br />";
        echo $memberItem;
    }
    echo "<br />";
}

$gadgets = [
    "phones"  => ["apple" => "iPhone 12", "nokia" => "Nokia 8.3"],
    "tablets" => ["apple" => "iPad Pro",  "lenovo" => "Yoga Tab"]
];

echo $gadgets["phones"][1] = "Nokia 9";

$library = [
    "fiction"=> ["Dune" => "Herbert",   "1984" => "Orwell"],
    "science"=> ["Cosmos" => "Sagan",   "Brief History" => "Hawking"],
];

foreach ($library as $libraryItem => $author) {
    foreach ($author as $title => $authorItem) {
        echo "$libraryItem: $title-----$authorItem";
    }
}

$numbers = [1,2,3,4,5,6,7,8,9];
echo sizeof($numbers);
echo "<br />";
echo count($numbers);
echo "<br />";

shuffle($numbers);
print_r($numbers);

echo "<br />";

$age = 19;
$height = 172;

$data = compact("age", "height");
print_r($data);