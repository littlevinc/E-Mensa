<?php



function db_insert_bewertung(&$review) {

    /*
     * Store Data one last time before executing query
     */
    $gericht = $review['gericht_id'];
    $bemerkung = $review['bemerkung'];
    $sterne = $review['sterne'];
    $benutzer = (int)db_user_to_id($review['benutzer']);


    $link = connectdb();

    $sql = "INSERT INTO bewertung (gericht_id,benutzer_id,bemerkung, sterne, bewertungszeitpunkt, hervorgehoben) VALUES ($gericht, $benutzer, '$bemerkung', $sterne,NOW(),FALSE)";
    $result = mysqli_query($link, $sql);

    mysqli_close($link);
}

function db_list_bewertungen() {

    $link = connectdb();

    $sql = "SELECT B.idBewertung, G.name, B.bemerkung, B.sterne, B.bewertungszeitpunkt, B.hervorgehoben FROM bewertung B JOIN gericht G ON (B.gericht_id = G.id) ORDER BY B.bewertungszeitpunkt LIMIT 30";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data;

}

function db_list_bewertungen_user($user) {

    $link = connectdb();
    $id_user = db_user_to_id($user);

    $sql = "SELECT B.idBewertung, G.name, B.bemerkung, B.sterne, B.bewertungszeitpunkt FROM bewertung B JOIN gericht G ON (B.gericht_id = G.id) WHERE B.benutzer_id = $id_user ORDER BY B.bewertungszeitpunkt";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data;

}

function db_user_to_id($user) {

    $link = connectdb();

    $sql = "SELECT id FROM benutzer WHERE name = '$user'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);

    return $data[0]['id'];

}

function db_delete_review($id) {

    $link = connectdb();

    $sql = "DELETE FROM bewertung WHERE idBewertung = $id";
    $result = mysqli_query($link, $sql);

    mysqli_close($link);




}

function db_change_visibility($id) {

    $link = connectdb();
    $myid = (int)$id;

    // TODO: Query ändert die gesammte Spalte und nicht nur ein Feld
    $sql = "UPDATE bewertung SET hervorgehoben = NOT hervorgehoben WHERE idBewertung = $myid";
    $result = mysqli_query($link, $sql);

    mysqli_close($link);

}

function db_show_hervorgehoben() {
    $link = connectdb();

    $sql = "SELECT * FROM bewertung B JOIN gericht G ON (B.gericht_id = G.id) WHERE hervorgehoben = TRUE";
    $querry = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($querry, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;

}

function db_is_user_admin() {
    $link = connectdb();


}

