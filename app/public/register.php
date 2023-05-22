<?php
$title = "register";
include_once "_includes/database-connection.php";
setup_user($pdo);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
$form_username = $POST['username'];
    $form_hasshed_password = password_hash($POST['password'], PASSWORD_DEFAULT);
    $sql_statement = "INSERT INTO user (`username`, `password`) VALUES ('$form_username', '$form_hashed_password')";
    try {
        $result = $pdo->query($sql_statement);
        header("location: login.php");
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
    <h1>Register</h1>


    <?php
    include "_includes/header.php";

    ?>
    <form action="">
        <label for="username">username</label>
        <input type="text" name="username" id="username" placeholder="username"> required

        <label for="password">password</label>
        <input type="password" name="password" id="password" placeholder="password"> required

        <button type="submit">Register</button>

    </form>
    
</body>

</html>