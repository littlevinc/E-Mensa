<?php

$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

if (!$link) {
    echo "Experienced error while trying to connect to database: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM allergen";

$result = mysqli_query($link, $sql);

if(!$result) {
    echo "Experienced error while running the database query: ", mysqli_error();
    exit();
}

while($row = mysqli_fetch_assoc($result)) {
    $allergensCon[] = $row;
}

mysqli_free_result($result);
mysqli_close($link);


