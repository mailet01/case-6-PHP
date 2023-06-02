<header>
emils bookrecensionsapp
<?php 
if (isset($_SESSION['user_id'])) {
$username = $_SESSION['username'];
echo "inloggad: $username";
}

?>
<?php 

?>




</header>

<nav>
    <a href="logout.php">logout</a> | <a href="login.php">login</a> | <a href="register.php">register</a> | <a href="books.php">bookreview</a> | <a href="book_edit.php">edit</a>
</nav>
<hr>