<?php
declare(strict_types=1);

session_start();

include "_includes/database-connection.php";
include "_includes/global-functions.php";

// en variabel i php inleds med dollartecken
$title = "Template";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <?php
    include "_includes/header.php";
    ?>


    <h1><?= $title ?></h1>


    <?php
    include "_includes/footer.php";
    ?>

</body>
</html>