<?php

declare(strict_types=1);
include "_includes/global-functions.php";
include "_includes/database-connection.php";
$title = "";

$author = "";
$year_published = "";
$review = "";

session_start();


setup_book($pdo);
$title = "bookreview";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
$book_id = "";
    $title = "";
    $author = "";
    $year_published = "";
    $review = "";
    $date_create = "";
    $user_id = "";
    $sql = "INSERT INTO book (book_id, title, author, yer_published, review, date_create) VALUES ('$book_id' '$title' '$author' '$year_published' '$review' '$date_create')";
    $result = $pdo->exec($sql);
    $sql = "SELECT * FROM bird";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <?php
    include "_includes/header.php";
    ?>
    <h1>Bookreview</h1>
    <p>
        Write your book review by fill in this form bellow:

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="titel" required>
        <label for="author">author</label>
        <input type="text" name="author" id="author" required>
        <label for="year_published">year_published</label>
        <input type="text" name="year_published" id="year_published" required>
        <label for="review">review</label>
        <textarea name="review" id="review" cols="30" rows="10" required></textarea>
        <label for="date_create">date_create</label> <input type="datetime" name="date_create" id="date_create">
        <button type="submit">save</button>
        </p>
    </form>
</body>

</html>