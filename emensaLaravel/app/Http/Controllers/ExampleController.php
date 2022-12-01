<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function getName() {
        return "This is the getName method";
    }

    /**
     * Aufgabe 7 a) takes parameter and returns
     * @param Request $request
     * @return mixed;
     */
    public function taskA(Request $request) {
        $name = $request->input('name');
        return view('examples.m4_7a_queryparameter', ['name' => "$name"]);
    }

    public function  taskB() {

        $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

        if(!$link) {
            echo "Error during connection", mysqli_connect_error();
            exit();
        }

        $sql = "SELECT * FROM kategorie ORDER BY name DESC";

        $result = mysqli_query($link, $sql);

        if(!$result) {
            echo "Error!", mysqli_error($link);
        }



        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        mysqli_free_result($result);
        mysqli_close($link);

        return view('examples.m4_7b_kategorie', ['kategorien' => $categories]);
    }

    public function taskC() {

        $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

        if(!$link) {
            echo "Error during connection", mysqli_connect_error();
            exit();
        }

        $sql = "SELECT * FROM gericht WHERE preis_intern > 2";

        $result = mysqli_query($link, $sql);

        if(!$result) {
            echo "Error!", mysqli_error($link);
        }

        while($row = mysqli_fetch_assoc($result)) {
            $gericht[] = $row;
        }

        mysqli_free_result($result);
        mysqli_close($link);

        return view('examples.m4_7c_gerichte', ['gerichte' => $gericht]);

    }

    public function taskD(Request $request) {

        $no = $request->input('no');

        if($no == 1)
            return view('examples.pages.m4_7d_page_1');
        elseif ($no == 2)
            return view('examples.pages.m4_7d_page_2');
        else
            return view('examples.pages.m4_7d_page_1');

    }




}
