<?php

$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

if(!$link) {
    echo "Error while connecting to database: ", mysqli_connect_error();
    exit();
}

date_default_timezone_set('Europe/Berlin');
$log_time = date('H:i:s');
$sql_query = "INSERT INTO access_log (access_time, log_type) VALUES ('$log_time', 'Website Access')";

$result = mysqli_query($link, $sql_query);

if(!$result) {
    echo "Error while writing website access log: ", mysqli_error($link);
}

// FRAGE: was macht free_result -> Zeigt fehler wenn uncommented
//mysqli_free_result($result);
mysqli_close($link);




