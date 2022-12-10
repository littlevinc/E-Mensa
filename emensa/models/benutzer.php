<?php

class Benutzer{

    protected ?mysqli $link;
    protected String $mail;
    protected String $password;
    protected int $id;

    function __construct(String $mail, String $password){
        $this->link = connectdb();
        $this->mail = $mail;
        $this->password = $password;
    }

    public function startTransaction(){
        $this->link->begin_transaction();
    }

    public function commit(){
        $this->link->commit();
    }

    public function login(){
        $sql = "SELECT COUNT(*) AS 'login' FROM benutzer WHERE email= '$this->mail' AND passwort = '$this->password'";
        $result = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        $loggedIn = (bool) $data[0]['login'];
        if($loggedIn){
            $sql = "SELECT id FROM benutzer WHERE email= '$this->mail' AND passwort = '$this->password'";
            $result = mysqli_query($this->link, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_BOTH);
            $this->id = $data[0]['id'];
        }
        return $loggedIn;
}

    public function getName(){
        $sql = "SELECT name FROM benutzer WHERE email = '$this->mail'";
        $result = mysqli_query($this->link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);
        return $data[0]['name'];
    }

    public function anzahlanmeldungen_update(){
        //$sql = "UPDATE benutzer SET anzahlanmeldungen=anzahlanmeldungen + 1 WHERE email = '$this->mail'";

        $sql = "CALL procedure_increment_logins($this->id)";
        $result = mysqli_query($this->link, $sql);

        //Keine fetch all des results da wir nix returnen
        if(!$result) {
            echo "Error while updating user: ", mysqli_error($this->link);
        }
    }

    public function letzteanmeldung_update(){
        $sql = "UPDATE benutzer SET letzteanmeldung=CURRENT_DATE() WHERE email = '$this->mail'";
        $result = mysqli_query($this->link, $sql);

        //Keine fetch all des results da wir nix returnen
        if(!$result) {
            echo "Error while updating user: ", mysqli_error($this->link);
        }
    }

    public function anzahlfehler_update(){
        $sql = "UPDATE benutzer SET anzahlfehler=anzahlfehler + 1 WHERE email = '$this->mail'";
        $result = mysqli_query($this->link, $sql);

        //Keine fetch all des results da wir nix returnen
        if(!$result) {
            echo "Error while updating user: ", mysqli_error($this->link);
        }
}

    public function letzterfehler_update(){
        $sql = "UPDATE benutzer SET letzterfehler=CURRENT_DATE() WHERE email = '$this->mail'";
        $result = mysqli_query($this->link, $sql);

        //Keine fetch all des results da wir nix returnen
        if(!$result) {
            echo "Error while updating user: ", mysqli_error($this->link);
        }
    }


    public function closeConnection(){
        mysqli_close($this->link);
}
}


/*
function db_benutzer_login(String $mail, String $password){


    $link = connectdb();

    $sql = "SELECT COUNT(*) AS 'login' FROM benutzer WHERE email= '$mail' AND passwort = '$password'";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data[0];
}
function db_benutzer_anzahlanmeldungen_update(String $mail){

    $link = connectdb();

    $sql = "UPDATE benutzer SET anzahlanmeldungen=anzahlanmeldungen + 1 WHERE email = '$mail'";
    $result = mysqli_query($link, $sql);

    //Keine fetch all des results da wir nix returnen
    if(!$result) {
        echo "Error while updating user: ", mysqli_error($link);
    }
    mysqli_close($link);
}
function db_benutzer_letzteanmeldung_update(String $mail){
    $link = connectdb();

    $sql = "UPDATE benutzer SET letzteanmeldung=CURRENT_DATE() WHERE email = '$mail'";
    $result = mysqli_query($link, $sql);

    //Keine fetch all des results da wir nix returnen
    if(!$result) {
        echo "Error while updating user: ", mysqli_error($link);
    }
    mysqli_close($link);
}
function db_benutzer_anzahlfehler_update(String $mail){
    $link = connectdb();

    $sql = "UPDATE benutzer SET anzahlfehler=anzahlfehler + 1 WHERE email = '$mail'";
    $result = mysqli_query($link, $sql);

    //Keine fetch all des results da wir nix returnen
    if(!$result) {
        echo "Error while updating user: ", mysqli_error($link);
    }
    mysqli_close($link);
}
function db_benutzer_letzterfehler_update(String $mail){
    $link = connectdb();

    $sql = "UPDATE benutzer SET letzterfehler=CURRENT_DATE() WHERE email = '$mail'";
    $result = mysqli_query($link, $sql);

    //Keine fetch all des results da wir nix returnen
    if(!$result) {
        echo "Error while updating user: ", mysqli_error($link);
    }
    mysqli_close($link);
}
function db_benutzer_name(String $mail){

    $link = connectdb();

    $sql = "SELECT name FROM benutzer WHERE email = '$mail'";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);


    return $data[0];
}
*/
