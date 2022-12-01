<?php
const POST_GERICHT_NAME = 'name';
const POST_GERICHT_BESCHREIBUNG = 'description';
const POST_GERICHT_ERSTELLER = 'creator';
const POST_GERICHT_EMAIL = 'email';



/*
 * Database modell
 * wunschgerichte(idWunsch, name, beschreibung, erstelldatum, ersteller(name, email))
 *
 * ersteller gibt keinen namen an >> 'anonym' eintragen
 *
 *
 *
 * */


function createGericht() {

    if(empty($_POST[POST_GERICHT_ERSTELLER]))
        $_POST[POST_GERICHT_ERSTELLER] = "Anonym";

    $datestamp = date("Y-m-d");




    $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

    if(!$link) {
        echo "Error during connection establishment:", mysqli_connect_error();
        exit();
    }

    // TODO: disable SQL injection possibility
    $sql = "INSERT INTO wunschgerichte (name, beschreibung, erstelldatum, ersteller, email) 
        VALUE ('$_POST[POST_GERICHT_NAME]', '$_POST[POST_GERICHT_BESCHREIBUNG]', '$datestamp', '$_POST[POST_GERICHT_ERSTELLER]', '$_POST[POST_GERICHT_EMAIL]')";

    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo "Error druing query!", mysqli_error($link);
    }

    //mysqli_free_result($result);
    mysqli_close($link);

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

                <form method="POST" class="set-width">
                    <fieldset>
                        <div class="formfield">
                            <input type="text" name="name" placeholder="Gericht" required>
                        </div>
                        <div class="formfield">
                            <input type="text" name="description" placeholder="Beschreibung" required>
                        </div>
                        <div class="formfield">
                            <input type="text" name="creator" placeholder="Name" >
                        </div>
                        <div class="formfield">
                            <input type="email" name="email" placeholder="Email Adresse">
                        </div>

                        <input type="submit" name="anmeldung" value="Wunsch Abschicken" class="custom-button">
                    </fieldset>
                </form>

                <?php
                if(isset($_POST[POST_GERICHT_NAME]))
                    createGericht();
                ?>

            </div>
        </section>

</body>
</html>