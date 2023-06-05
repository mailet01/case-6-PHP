<?php 
$title = "logout";
// inkluderar global-functionfilen på logoutsidan
include "_includes/global-functions.php";
// inklude database-connection på logoutsidan.
include "_includes/database-connection.php";
// funktion för att logga ut
session_start();
// funktion för att logga ut
session_destroy();
$_SESSION = [];


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
<?php 
// inkluderar header på logoutsidan.
include "_includes/header.php";

?>    
<h1><?= $title?></h1>
<p>
you have now loged out.
<a href="login.php">click here to login again</a>

</p>
<?php 
// inkluderar footer på logoutsidan.
include "_includes/footer.php";

?>
</body>
</html>