<?php
$title = "register";
include "_includes/global-functions.php";
include "_includes/database-connection.php";

session_start();
setup_user($pdo);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
$form_username = $_POST['username'];
    $form_hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql_statement = "INSERT INTO user (`username`, `password`) VALUES ('$form_username', '$form_hashed_password')";
    // print_r($sql_statement);
    try {
        $result = $pdo->query($sql_statement);
        // print_r($result);
        header("Location: login.php?register=success");
    } catch (PDOException $err) {
        echo "there was a problem during the registration:" . $err->getMessage();
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
        
<h1>Register</h1>


    <form action="register.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username" placeholder="username" required> 

        <label for="password">password</label>
        <input type="password" name="password" id="password" placeholder="password" required> 

        <button type="submit">Register</button>

    </form>
    <?php 
    $sql = "SELECT * FROM book";
    ?>
<?php 
include "_includes/footer.php";

?>
</body>

</html>