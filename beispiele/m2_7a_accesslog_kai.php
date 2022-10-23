<?php
/**
 * Praktikum DBWT. Autoren:
 * Kai, Fedin, 3515541
 * Luke, Braun, 3541708
 */

$log = fopen('accesslog.txt', 'a');

$date = date("d.m.Y");
$time = date("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$information = "Datum: " . $date . " Uhrzeit: " .  $time . " IP: " . $ip . "\nBrowser: " . $browser . "\n\n";

echo '<h2>Folgende Informationen werden getrackt: </h2>';
echo $information;

fwrite($log, $information);

fclose($log);


