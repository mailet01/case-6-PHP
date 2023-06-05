<?php

declare(strict_types=1);
// inkluderar filen global-functions på min bokrecensionssida.
include "_includes/global-functions.php";
// inkluderar database-connection på min bokrecensionssida.
include "_includes/database-connection.php";
// förbereder variabler för bokrecensionsformuläret.
$title = "";

$author = "";
$year_published = "";
$review = "";
$user_id = "";
// funktion för att logga in
session_start();


setup_book($pdo);
$title = "bookreview";
// kontrollerar så att metoden post används.
if ($_SERVER['REQUEST_METHOD'] === "POST") {

// talar om att variabler verkligen är post respektive session.
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];
    $review = $_POST['review'];
    $user_id = $_SESSION['user_id'];

    // syntax för att lägga till böcker i tabellen.
    $sql = "INSERT INTO book (title, author, year_published, review, user_id) VALUES ('$title', '$author', '$year_published', '$review', $user_id)";
// skriver ut resultatet i en array.
    print_r($sql);

    $result = $pdo->exec($sql);

    print_r($result);
}
// kör själva sql satsen.
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
// inkluderar header i min bokrecensionssida.
    include "_includes/header.php";
    ?>
    <h1>Bookreview</h1>
    <p>
        Write your book review by fill in this form bellow:

        <?php
// kontrollerar så att en användare är inloggad för att kunna skriva en recension.
        if (isset($_SESSION['user_id'])) {

        ?>
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
    </form>
<?php
        }
?>

<?php
echo "<ul>";
foreach ($rows as $row) {
    echo '<li><a href="book_edit.php?book_id=' . $row['book_id'] . '">';
    echo $row['title'] . ", " . $row['author'];
    echo "</a>";
    echo "</li>";
}
echo "</ul>";


?>
<table>
<tr>
<th>boktitel</th>
<th>författare</th>
<th>utgivningsår</th>
<th>recension</th>
<th>redigera</th>
</tr>
<?php 
// itteration av resultatet från formuläret.
foreach ($rows as $row) {
    $book_id = $row['book_id'];
    $title=$row['title'];
    $author=$row['author'];
    $year_published=$row['year_published'];
    $review=$row['review'];

?>

<!-- resultat från databas -->
<tr>
<td><?= $title ?></td>
<td><?= $author ?></td>
<td><?= $year_published ?></td>
<td><?= $review ?></td>
<td>
<?php 
// kontrollerar så att inloggad användare stämmer överens med hen som har skrivit recensionen.
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']) {

?>
<a href="book_edit.php?book_id=<?= $book_id ?>">redigera</a>
<?php 
}
?>
</td>
</tr>
<?php 
}
?>
</table>




<?php 
// inkluderar footer i min bookrecensionssida.
include "_includes/footer.php";
?>
</body>

</html>