<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
    try {
        $link = connectdb();

        $sql = 'SELECT id, name, beschreibung FROM gericht ORDER BY name';
        $result = mysqli_query($link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }

}

function db_gericht_select_highprice(){

    $link = connectdb();

    $sql = 'SELECT name, preis_intern FROM gericht WHERE preis_intern > 2 ORDER BY name desc;';
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data;

}

function db_gericht_uebersicht(){

    $link = connectdb();

    $sql = "SELECT id, name, preis_intern, preis_extern,bildname, GROUP_CONCAT(code) AS 'allergene'  FROM gericht G LEFT JOIN gericht_hat_allergen K ON G.id = K.gericht_id GROUP BY name ORDER BY id LIMIT 5";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data;
}
