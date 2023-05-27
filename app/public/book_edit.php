<?php

declare(strict_types=1);
include "_includes/global-functions.php";
include "_includes/database-connection.php";
session_start();
$title = "";

$author = "";
$year_published = "";
$review = "";
$user_id = "";
$row = null;


setup_book($pdo);
$title = "bookreview - uppdate";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $review = $_POST['review'];
    $user_id = $_SESSION['user-id'];

    $sql = "UPDATE `book` SET `book_id`='[value-1]',`title`='[value-2]',`author`='[value-3]',`year_published`='[value-4]',`review`='[value-5]',`date_create`='[value-6]',`user_id`='[value-7]";
    print_r2($sql);
    $result = $pdo->exec($sql);
    print_r2($result);

    if ($result) {
        header("Location: books.php");
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    $sql = "SELECT * FROM book";
    $result = $pdo->prepare($sql);
    $result->execute();
    $row = $result->fetch();
    if ($row) {
        print_r2($row);
        $title = $row['title'];
        $author = $row['author'];
        $year_published = $row['year_published'];
        $review = $row['review'];
    }
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
        <input type="hidden" name="user_id" value="">
        <button type="submit">update</button>
        <button type="reset">delete</button>
        </p>
    </form>






</body>

</html>