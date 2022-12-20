<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Gerichte extends Controller
{


    /**
     * index function that return site with data for gerichte
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function getGerichte() {
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

        return view('werbeseite', ['results' => $results]);
    }

    public function showPrice( $price): string{
        $price = number_format((float)$price, 2, ',');
        return ($price . "€");
    }

}
