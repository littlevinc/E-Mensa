<?php

const GET_NAME = "name";





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1> Ihr Name: <?php echo $_GET[GET_NAME] ?: "Eingeben bitte" ?></h1>
    <form  method="get">
        <input type="text" name="name">
        <input type="submit" name="submit">
    </form>
    
</body>
</html>