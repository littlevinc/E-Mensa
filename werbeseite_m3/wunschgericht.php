<?php
const POST_GERICHT_NAME = 'name';
const POST_GERICHT_BESCHREIBUNG = 'beschreibung';
const POST_GERICHT_ERSTELLER = 'ersteller';
const POST_GERICHT_EMAIL = 'email';

if(isset($_POST['submit'])) {

    /**
     * Connect to database
     */
    $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

    if(!$link) {
        echo "Error during connection establishment:", mysqli_connect_error();
        exit();
    }

    /**
     * controll values and store date
     */
    if(empty($_POST[POST_GERICHT_ERSTELLER]))
        $_POST[POST_GERICHT_ERSTELLER] = "Anonym";

    $datestamp = date("Y-m-d");

    /**
     * Security Measures
     * mysqli_real_escape_string() escapes all strings that are passed
     */
    $name = mysqli_real_escape_string($link, $_POST[POST_GERICHT_NAME]);
    $beschreibung = mysqli_real_escape_string($link, $_POST[POST_GERICHT_BESCHREIBUNG]);
    $creator = mysqli_real_escape_string($link, $_POST[POST_GERICHT_ERSTELLER]);
    $email = mysqli_real_escape_string($link, $_POST[POST_GERICHT_EMAIL]);


    /**
     * Functions that handel database operations
     */




    function getPKersteller($ersteller_name) {

        $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

        if(!$link) {
            echo "Error during connection establishment:", mysqli_connect_error();
            exit();
        }

        $sql = "SELECT id_ersteller AS 'id' FROM ersteller WHERE name = '$ersteller_name'";

        $result = mysqli_query($link, $sql);

        if(!$result) {
            echo "Error druing query!", mysqli_error($link);
        }

        while($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }

        mysqli_close($link);

        return $results['0']['id'];


    }

    function createErsteller() {

        global $creator, $email;

        $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

        if(!$link) {
            echo "Error during connection establishment:", mysqli_connect_error();
            exit();
        }

        $sql = "INSERT INTO ersteller (name, email) VALUES
                 ('$creator', '$email')";

        $result = mysqli_query($link, $sql);



        if(!$result) {
            echo "Error druing query!", mysqli_error($link);
        }

        mysqli_close($link);
    }

    function insertGericht() {

        global $name, $beschreibung, $datestamp, $creator;

        $id = getPKersteller($creator);

        $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

        if(!$link) {
            echo "Error during connection establishment:", mysqli_connect_error();
            exit();
        }

        /**
         * Send data to database
         * 1. Insert
         * 2. store return to check if insertion was successfull
         * 3. echo any occouring errors
         * 4. close connection
         */
        $sql = "INSERT INTO wunschgerichte (gericht_name, beschreibung, erstelldatum, ersteller) 
                VALUES ('$name', '$beschreibung', '$datestamp', '$id')";

        $result = mysqli_query($link, $sql);

        if(!$result) {
            echo "Error druing query!", mysqli_error($link);
        }

        mysqli_close($link);

    }



    if(!getPKersteller($creator) > 1)
        createErsteller();

    insertGericht();
}

?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wunschgericht erstellen</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .set-width {
            min-width: 450px;
        }
    </style>

</head>
<body>
        <section>
            <h2>Wunschgericht</h2>
        </section>

        <section>
            <div class="col-3">

                <form  action="wunschgericht.php" method="POST" class="set-width">
                    <fieldset>
                        <div class="formfield">
                            <input type="text" name="name" placeholder="Gericht" required>
                        </div>
                        <div class="formfield">
                            <input type="text" name="beschreibung" placeholder="Beschreibung" required>
                        </div>
                        <div class="formfield">
                            <input type="text" name="ersteller" placeholder="Name" >
                        </div>
                        <div class="formfield">
                            <input type="email" name="email" placeholder="Email Adresse">
                        </div>

                        <input type="submit" name="submit" value="Wunsch Abschicken" class="custom-button">
                    </fieldset>
                </form>


            </div>
        </section>

</body>
</html>