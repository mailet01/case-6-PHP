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
    $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : 0;

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $review = $_POST['review'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE `book` SET `title`='$title',`author`='$author',`year_published`='$year_published',`review`='$review',`user_id`=$user_id WHERE book_id = $book_id";
    // print_r2($sql);
    $result = $pdo->exec($sql);
    // print_r2($result);

    if ($result) {
        header("Location: books.php");
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $book_id = isset($_GET['book_id']) ? $_GET['book_id'] : 0;

    $sql = "SELECT * FROM book WHERE book_id = $book_id";
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
$action_delete = isset($_POST['delete']) ? true : false;
if ($action_delete) {
$sql = "DELETE FROM book WHERE book_id=$book_id";
$result = $pdo->exec($sql);
if ($result) {
header("Location: books.php");
exit;
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
<?php 
if ($row) {

?>
    <p>
        Write your book review by fill in this form bellow:
<?php 
if ($_SESSION['user_id']) {
?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        

        <input type="hidden" name="book_id" value="<?= $row['book_id'] ?>">


        <label for="title">title</label>
        <input type="text" name="title" id="title" required value="<?=$title; ?>">
        <label for="author">author</label>
        <input type="text" name="author" id="author" required value="<?=$author; ?>">
        <label for="year_published">year_published</label>
        <input type="text" name="year_published" id="year_published" required value="<?=$year_published; ?>">
        <label for="review">review</label>
        <input type="text" name="review" id="review" required value="<?=$review; ?>">


        <input type="hidden" name="user_id" value="">
        <button type="submit">update</button>
        <button name="delete" type="submit">delete</button>
        </p>
    </form>
<?php
}
?>
<?php
}
?>
<?php 
include "_includes/footer.php";

?>
<?php 
include "_includes/footer.php";
?>



</body>

</html>