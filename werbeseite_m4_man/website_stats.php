<?php


function getNumberGerichte() : string {
    $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

    if(!$link) {
        echo "Error while connecting to database: ", mysqli_connect_error();
        exit();
    }

    $sql = "SELECT COUNT(name) AS 'stats' FROM gericht";

    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo "Error during query from database: ", mysqli_error();
        exit();
    }

    while($row = mysqli_fetch_assoc($result)) {
        $stats[] = $row;
    }

    mysqli_free_result($result);
    mysqli_close($link);

    return $stats[0]['stats'];
}

function getNewsletterAnmeldungen(){
    $file = "newsletter_signup.txt";
    $linecount = 0;
    $handle = fopen($file, "r");
    while(!feof($handle)) {
        $line = fgets($handle);
        $linecount++;
    }

    fclose($handle);
    return $linecount-1;
}

function databaseUserCount() {

    $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

    if(!$link) {
        echo "Error while connecting to database: ", mysqli_connect_error();
        exit();
    }

    $sql = "SELECT COUNT(logID) AS 'logs' FROM access_log";

    $result = mysqli_query($link, $sql);


    //echo"result";
    //var_dump($result);

    if(!$result) {
        echo "Error during database query: ", mysqli_error();
        exit();
    }

    while($row = mysqli_fetch_assoc($result)) {
        $stats[] = $row;
    }




    mysqli_free_result($result);
    mysqli_close($link);

    echo  $stats[0]['logs'];
}
