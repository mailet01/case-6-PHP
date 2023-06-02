<?php 
$title = "logout";
include "_includes/global-functions.php";
include "_includes/database-connection.php";
session_start();
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
include "_includes/header.php";

?>    
<h1><?= $title?></h1>
<p>
you have now loged out.
<a href="login.php">click here to login again</a>

</p>
<?php 
include "_includes/footer.php";

?>
</body>
</html>