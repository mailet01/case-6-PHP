<?php
$title = "Login";
// inkluderar global-functionfilen på min loginsida.
include "_includes/global-functions.php";
// inkluderar database-connection på min loginsida.
include "_includes/database-connection.php";
// funktion för att logga in
session_start();
setup_user($pdo);
// kontrollerar att metoden post verkligen används.
if ($_SERVER['REQUEST_METHOD'] === "POST") {
// deklarerar en variabel för användarnamn
    $form_username = $_POST['username'];
// deklarerar en variabel för lösenord.
    $form_password = $_POST['password'];
    $sql_statement = "SELECT * FROM  user WHERE `username` = '$form_username'";
    try {
        $result = $pdo->query($sql_statement);
        $user = $result->fetch();
// om det inte finns någon användare när man loggar in
        if (!$user) {
            echo "there is no user";
        } else {
            $isCorrectPassword = password_verify($form_password, $user['password']);
// om det inte lösenordet är korrekt när man loggar in.
            if (!$isCorrectPassword) {
                echo "incorrect password";
            } else {
                $_SESSION["username"] = $user["username"];
                $_SESSION["user_id"] = $user["user_id"];
// skickas vidare till bookrecensionssidan när man har loggat in.
                header("location: books.php?loggin successfully");
            }
            
        }
// om inte inloggningen har gått igenom
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
// inkluderar header på min loginsida.
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
<?php 
// inkluderar footer på min loginsida
include "_includes/footer.php";
?>
</body>

</html>