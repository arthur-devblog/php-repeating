<?php
declare(strict_types=1);

class Book {
    protected string $title;
    protected int $pages;
    protected int $price;
    private string $author;


    public function __construct(string $title, int $pages, int $price, string $author) {
        $this->title = $title;
        $this->pages = $pages;
        $this->price = $price;
        $this->author = $author;
    }
    public function expensiveCheck() : string {
        if ($this->price > 10000) {
            return "expensive ";
        }
        return "non-expensive ";
    }
    public function getInfo() : string {
        return "Title: " . $this->title . " By: " . $this->author . " Pages: " . $this->pages . " Price: " . $this->price . PHP_EOL;
    }
}
$book1 = new Book("War and Peace", 300, 20000, "Dostoyevski");
print $book1->expensiveCheck() . PHP_EOL;
print $book1->getInfo() . PHP_EOL;
