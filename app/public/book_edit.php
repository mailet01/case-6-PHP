<?php

declare(strict_types=1);
// inkluderar global-functionfilen på min redigera sida.
include "_includes/global-functions.php";
// inkluderar database-connectionfilen på min redigera sida.
include "_includes/database-connection.php";
// funktion för att logga in
session_start();
// förbereder variabler som används vid formuläret.
$title = "";
$author = "";
$year_published = "";
$review = "";
$user_id = "";
$row = null;


setup_book($pdo);
$title = "bookreview - uppdate";
// kontrollerar så att metoden post verkligen används.
if ($_SERVER['REQUEST_METHOD'] === "POST") {
// talar om att variablerna i formuläret verkligen är post respektive session.
    $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : 0;

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $review = $_POST['review'];
    $user_id = $_SESSION['user_id'];

// syntax för att uppdatera.
    $sql = "UPDATE `book` SET `title`='$title',`author`='$author',`year_published`='$year_published',`review`='$review',`user_id`=$user_id WHERE book_id = $book_id";
    // print_r2($sql);
    $result = $pdo->exec($sql);
     print($result);
// om en post uppdateras
    if ($result) {
// skickas man tillbaka till bokrecensionssidan.
        header("Location: books.php?book update successfully");
        exit;
    }
}
// metod för att redigera en post
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $book_id = isset($_GET['book_id']) ? $_GET['book_id'] : 0;

    $sql = "SELECT * FROM book WHERE book_id = $book_id";
    $result = $pdo->prepare($sql);
    $result->execute();
    $row = $result->fetch();
    if ($row) {
        print($row);
        $title = $row['title'];
        $author = $row['author'];
        $year_published = $row['year_published'];
        $review = $row['review'];
    }
}
// funktion för att radera en post
$action_delete = isset($_POST['delete']) ? true : false;
if ($action_delete) {
// syntax för att radera en post
    $sql = "DELETE FROM book WHERE book_id=$book_id";
$result = $pdo->exec($sql);
// om en post raderas
if ($result) {
// skickas tillbaka till bokrecensionssidan.
    header("Location: books.php?=the book deleted successfully");
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
// inkluderar header i min redigera sida.
    include "_includes/header.php";
    ?>
    <h1>Bookreview</h1>
<?php 
// kontrollerar om det finns en post som ska redigeras
if ($row) {

?>
    <p>
        Write your book review by fill in this form bellow:
<?php 
// kontrollerar så att man är inloggad för att kunna skriva och redigera en post
if ($_SESSION['user_id']) {
?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        

        <input type="hidden" name="book_id" value="<?= $row['book_id'] ?>">


        <p> title
        
        <input type="text" name="title" id="title" required value="<?=$title; ?>">
        </p>
        <p> author
        <input type="text" name="author" id="author" required value="<?=$author; ?>">
        </p>
        <p> year_published 
        <input type="text" name="year_published" id="year_published" required value="<?=$year_published; ?>">
        </p>
        <p> review 
        <input type="text" name="review" id="review" required value="<?=$review; ?>">
        </p>

        <input type="hidden" name="user_id" value="">
        <button name="Update" type="submit">Update</button>
        <button name="Delete" type="submit">Delete</button>
        </p>
    </form>
<?php
}
?>
<?php
}
?>
<?php 
// inkluderar footer i min redigera sida.
include "_includes/footer.php";

?>
<?php 
include "_includes/footer.php";
?>



</body>

</html>