<?php

$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

if(!$link) {
    echo "Fehler beim Verbindungsaufbau: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT id, name, preis_intern, preis_extern, GROUP_CONCAT(code) AS 'allergene'  FROM gericht G LEFT JOIN gericht_hat_allergen K ON G.id = K.gericht_id GROUP BY name ORDER BY id LIMIT 5";

$result_query = mysqli_query($link, $sql);

if(!$result_query) {
    echo "Error during query: ", mysqli_error();
    exit();
}


while($row = mysqli_fetch_assoc($result_query)) {
    $results[] = $row;
}

mysqli_free_result($result_query);
mysqli_close($link);


/**
 * initial idea for a function to read allergens for every meal
 * -> was solved with a join query that immidately returns allergens with the other data
 * @param $id
 * @return void
 */
function returnAllergen($id) {
    $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

    if(!$link) {
        echo "Experience error while connecting to Database: ", mysqli_connect_error();
        exit();
    }

    $sql = "SELECT code FROM gericht_hat_allergen WHERE gericht_id = $id";

    $contains_allergens = mysqli_query($link, $sql);
    if(!$contains_allergens) {
        echo "Experienced error during query: ", mysqli_error();
        exit();
    }

    while($row = mysqli_fetch_assoc($contains_allergens)) {
        $allergens[] = $row;
    }

    mysqli_free_result($contains_allergens);
    mysqli_close($link);

    //var_dump($allergens);

    foreach($allergens as $allg) {
        echo $allg['code'] . " ";
    }

}


function showPrice( $price): string{
    $price = number_format((float)$price, 2, ',');
    return ($price . "€");
}


