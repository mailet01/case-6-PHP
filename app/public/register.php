<?php
$title = "register";
// inkluderar global-functionfilen på registrerasidan.
include "_includes/global-functions.php";
// inkluderar database-connectionfilen.
include "_includes/database-connection.php";

// funktion för att logga in
session_start();
setup_user($pdo);
// kontrollerar så att metoden post verkligen används.
if ($_SERVER['REQUEST_METHOD'] === "POST") {
// deklarerar en variabel för användarnamn.
    $form_username = $_POST['username'];
// deklarerar en variabel för lösenord.
    $form_hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// syntax för att registrera formulärfälten i databasen.
    $sql_statement = "INSERT INTO user (`username`, `password`) VALUES ('$form_username', '$form_hashed_password')";
    // print_r($sql_statement);
    try {
        $result = $pdo->query($sql_statement);
        // print_r($result);
// när registreringen är kla så länkas man vidare till loginsidan.
        header("Location: login.php?register=success");
// om inte registreringen har gått igenom
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
// inkluderar header på min registrerasida.
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
// inkluderar footer i på min registrerasida.
include "_includes/footer.php";

?>
</body>

</html>