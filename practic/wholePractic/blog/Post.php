<?php
declare(strict_types=1);

interface Publishable {
    public function publish() : void;
    public function getStatus() : string;
}

abstract class BaseContent {
    protected int $id;
    protected string $title;
    protected $createdAt;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->createdAt = date('Y-m-d H:i:s');
    }
    public function getSummary($content) : string {
        return strlen($content) > 100 ? substr($content, 0, 100) . " " : $content;
    }
    abstract public function getType() : string;
}

class Post extends BaseContent implements Publishable {
    private string $content;
    private int $views = 0;
    private string $status = "draft";
    private array $tags = [];

    public function __construct(string $title, string $content) {
        parent::__construct($title);
        $this->content = $content;
    }

    public function addTag(string $tag) : void {
        $this->tags[] = $tag;
    }
    public function incrementViews(int $views) : void {
        $this->views += $views;
    }
    public function publish() : void {
        $this->status = "published";
    }
    public function getStatus() : string {
        return $this->status;
    }
    public function getType() : string {
        return "post";
    }
    public function toArray() : array {
       return [
         "title" => $this->title,
         "content" => $this->content,
         "views" => $this->views,
         "status" => $this->status,
         "tags" => $this->tags,
         "type" => $this->getType()
       ];
    }
}

class FeaturedPost extends Post {
    public bool $featured = true;

    public function getType() : string {
        return "featured_post";
    }
    public function markAsFeatured() : void {
        $this->featured = true;
    }
}

$post1 = new Post("Post", "something entered");
$post1->addTag("Featured");
$post1->publish();
$post1->incrementViews(1);
echo $post1->getSummary("something as content") . "<br />";
echo $post1->getStatus() . "<br />";
$jsonPost = json_encode($post1->toArray());
file_put_contents("post.json", $jsonPost, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);