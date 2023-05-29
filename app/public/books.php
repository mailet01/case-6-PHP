<?php

declare(strict_types=1);
include "_includes/global-functions.php";
include "_includes/database-connection.php";
$title = "";

$author = "";
$year_published = "";
$review = "";
$user_id = "";
session_start();


setup_book($pdo);
$title = "bookreview";
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $review = $_POST['review'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO book (title, author, year_published, review, user_id) VALUES ('$title', '$author', '$year_published', '$review', $user_id)";
    print_r($sql);

    $result = $pdo->exec($sql);

    print_r($result);
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sql = "SELECT * FROM book";
    $result = $pdo->prepare($sql);
    $result->execute();
    $rows = $result->fetchAll();
    
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
        <button type="submit">save</button>
        </p>
<?php 
echo "<ul>";
foreach ($rows as $row) {
echo '<li><a href="book_edit.php?book_id='. $row['book_id'] .'">';
echo $row['title'] . ", ". $row['author'];
echo "</a>";
echo "</li>";

}
echo "</ul>";


?>





</body>

</html>