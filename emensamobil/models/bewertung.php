<?php



function db_insert_bewertung(&$review) {

    /*
     * Store Data one last time before executing query
     */
    $gericht = $review['gericht_id'];
    $bemerkung = $review['bemerkung'];
    $sterne = $review['sterne'];
    $benutzer = $review['benutzer'];


    $link = connectdb();

    $sql = "INSERT INTO bewertung (gericht_id,bemerkung, sterne, bewertungszeitpunkt, hervorgehoben) VALUES ($gericht, '$bemerkung', $sterne,NOW(),FALSE)";
    $result = mysqli_query($link, $sql);

    mysqli_close($link);
}

function db_list_bewertungen() {

    $link = connectdb();

    $sql = "SELECT G.name, B.bemerkung, B.sterne, B.bewertungszeitpunkt FROM bewertung B JOIN gericht G ON (B.gericht_id = G.id)";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data;

}

