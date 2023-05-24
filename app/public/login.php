<?php
$title = "Login";
include "_includes/database-connection.php";
session_start();
setup_user($pdo);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];
    $sql_statement = "SELECT * FROM  user WHERE `username` = '$form_username'";
    try {
        $result = $pdo->query($sql_statement);
        $user = $result->fetch();
        if (!$user) {
            echo "there is no user";
        } else {
            $isCorrectPassword = password_verify($form_password, $user['password']);
            if (!$isCorrectPassword) {
                echo "incorrect password";
            } else {
                $_SESSION["username"] = $user["username"];
                $_SESSION["user_id"] = $user["user_id"];
                // header("location: books.php");
            }
            
        }
        
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
<h1>Login</h1>
    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username" required>
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
</body>

</html>