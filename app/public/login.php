<?php
$title = "Login";
include_once "_includes/database-connection.php";
session_start();
setup_user($pdo);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $form_username = $POST['username'];
    $form_hasshed_password = password_hash($POST['password'], PASSWORD_DEFAULT);
    $sql_statement = "SELECT * FROM  user WHERE `username` = '$form_username'";
    try {
        $result = $pdo->query($sql_statement);
        $user = $result->fetch();
        if ($user) {
            echo "there is no user";
        }
        $isCorrectPassword = password_verify($form_password, $user['password']);
        if ($isCorrectPassword) {
            echo "incorrect password";
        }
        $_SESSION["username"] = $user["username"];
        $_SESSION["user_id"] = $user["id"];
        header("location: bird.php");
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
    <h1>Login</h1>
    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>
</body>

</html>