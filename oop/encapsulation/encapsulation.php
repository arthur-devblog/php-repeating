<?php
declare(strict_types=1);

class Movie {
    private string $name;
    private int $rating;
    private array $reviews = [];

    public function __construct(string $name, int $rating)
    {
        $this->name = $name;
        $this->rating = $rating;
    }
    public function getInfo() : string {
        return $this->name . ' | rating: ' . $this->getAverageRating() . ' | reactions: ' . count($this->reviews);
    }
    public function addReview(int $score) {
        if($score < 1 || $score > 10) {
            return "score must be between 1 and 10";
        }
        $this->reviews[] = $score;
    }
    public function getAverageRating() : float {
        if (count($this->reviews) === 0) {
            return 0.0;
        }
        return array_sum($this->reviews) / count($this->reviews);
    }
}