<?php

$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

if (!$link) {
    echo "Experienced error while trying to connect to database: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT DISTINCT A.code, A.name, A.typ FROM gericht_hat_allergen GCA INNER JOIN (SELECT id FROM gericht LIMIT 5) AS G ON G.id = GCA.gericht_id JOIN allergen A ON GCA.code = A.code ORDER BY A.code";

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


