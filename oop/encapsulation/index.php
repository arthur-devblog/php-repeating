<?php
declare(strict_types=1);
require_once __DIR__ . '/encapsulation.php';

$movie = new Movie("Avengers", 9);
$movie->addReview(2);
$movie->addReview(8);
$movie->addReview(10);
$movie->addReview(9);
print $movie->getAverageRating();
print $movie->getInfo();
?>

<body style="background-color: black" text="#f0ffff"></body>
