<?php 
$title = "register";
include_once "_includes/database-connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
</head>
<body>
<h1>Register</h1>
<?php 
include "_includes/header.php";

?>
<form action=""method="post">

<input type="text" name="username" id="username" placeholder="username"> required

<input type="password" name="password" id="password" placeholder="password"> required
<button type="submit">Register</button>

</form>
<?php 
$form_username = $POST['username'];
$form_hasshed_password = password_hash($POST['password'], PASSWORD_DEFAULT);
$sql_statement = "INSERT TO user (`username, `password`) VALUES ('$form_username', '$form_hashed_password');
try [
$result = $pdo->query($sql_statement);
header("location: login.php");
?>
</body>
</html>