<?php
declare(strict_types=1);

//todo1
if (isset($_GET['search'])) {
    echo "search: " . filter_var($_GET['search'], FILTER_SANITIZE_URL) . "<br/>";
} else {
    echo "nothing to search";
}

//todo2-todo3-todo4-todo5
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));
    $tags = $_POST['tags'];
    $errors = [];
    if (empty($title) || empty($content)) {
        $errors['title'] = "Title cannot be empty";
        $errors['content'] = "Content cannot be empty";
    }
    if (strlen($title) < 3 || strlen($title) > 100) {
        $errors['title'] = "Title must be between 3 and 100 characters";
    }
    if (strlen($content) < 10) {
        $errors['content'] = "Content must be at least 10 characters";
    }
    if(empty($tags)) {
        $errors['tags'] = "Tags cannot be empty";
    }
    if (empty($errors)) {
        header('Location: index.php');
    }
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="text">
    <textarea name="content"></textarea>
    <input type="checkbox" name="tags[]" value="php"> PHP
    <input type="checkbox" name="tags[]" value="web"> Web
    <input type="checkbox" name="tags[]" value="backend"> Backend
    <button type="submit">submit</button>
</form>