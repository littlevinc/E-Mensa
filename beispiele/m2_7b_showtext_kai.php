<?php
/**
 * Praktikum DBWT. Autoren:
 * Kai, Fedin, 3515541
 * Luke, Braun, 3541708
 */

const GET_PARAM_SUCHE = 'suche';

if(isset($_GET[GET_PARAM_SUCHE])){
    $searchKW = $_GET[GET_PARAM_SUCHE];

    $file = fopen("en.txt", 'r');

    $array = [];


    if(!$file){
        die("Öffnen fehlgeschlagen");
    }
    else{
        while(!feof($file)){
            $line = fgets($file);
            if($line){
                list($key, $val) = explode(";", $line);
                    $array[$key] = $val;
            }


        }
    }

    fclose($file);
    if(array_key_exists($searchKW, $array)){
        echo "Suchwort: $searchKW | Translation: $array[$searchKW]";
    }
    else{
        echo "Das gesuchte Wort $searchKW ist nicht enthalten";
    }

}
