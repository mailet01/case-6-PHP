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
<form action=""method="post">

<input type="text" name="username" id="username"> required

<input type="password" name="password" id="password"> required
<button type="submit">Register</button>

</form>
<?php 


?>
</body>
</html>