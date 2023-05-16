<?php 
$title = "bookreview";

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

<h1>Bookreview</h1>    
<p>
Write your book review by fill in this form bellow:

<form action="" method="post">
<label for="titel">titel</label>
<input type="text" name="titel" id="titel">
<label for="författare">författare</label>
<input type="text" name="författare" id="författare">
<label for="year published">year published</label>
<input type="text" name="year published" id="">
<label for="review">review</label>
<input type="text" name="review" id="review">
</p>
</form>
</body>
</html>