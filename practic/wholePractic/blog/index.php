<?php
declare(strict_types=1);

//todo1

$str = "string";
$int = 15;
$bool = true;
$bool1 = false;
$float = 1.5;
$null = null;
$array = [1, 2, 3];

echo gettype($int) . "<br />";
echo gettype($str) . "<br />";
echo gettype($bool) . "<br />";
echo gettype($bool1) . "<br />";
echo gettype($float) . "<br />";
echo gettype($null) . "<br />";
echo gettype($array) . "<br />";

//todo2

$config = [
    "title" => "my title",
    "max_posts" => 5,
    "active" => true
];

//todo3

$posts = [
    ["id" => 1, "title" => "post1 ",  "content" => "content1", "views" => 5, "tags" => ["php", "web"]],
    ["id" => 2, "title" => "post2 ",  "content" => "content2",  "views" => 4, "tags" => ["backend"]],
    ["id" => 3, "title" => "post3 ",  "content" => "content3",  "views" => 1, "tags" => ["php"]],
];

//todo4

foreach ($posts as $post) {
    $tags = implode(", ", $post["tags"]);
    echo "{$post['id']} | {$post['title']} | {$post['views']} views | tags: {$tags} <br>";
}

//todo5

foreach ($posts as $post) {
    echo "<pre>";
    print_r($post);
    echo "</pre>";
}

//todo6
foreach ($posts as $post) {
    $rating = match(true) {
        $post["views"] < 2  => "new",
        $post["views"] < 5  => "popular",
        default => "hit"
    };
    echo "{$post['title']} -> {$rating} <br>";
}
