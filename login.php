<?php 
$title = "Login";
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