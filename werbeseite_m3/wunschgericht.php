<?php



const POST_GERICHT_NAME = 'name';
const POST_GERICHT_BESCHREIBUNG = 'description';
const POST_GERICHT_ERSTELLER = 'creator';



/*
 * Database modell
 * wunschgerichte(idWunsch, name, beschreibung, erstelldatum, ersteller(name, email))
 *
 * ersteller gibt keinen namen an >> 'anonym' eintragen
 *
 *
 * */

echo $_POST[POST_GERICHT_ERSTELLER];

function insertWunsch() {

    $link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

    if(!$link) {
        echo "Error during connection establishment:", mysqli_connect_error();
        exit();
    }

    // check if creator exists
    if(empty($_POST[POST_GERICHT_ERSTELLER]))


    $sql = "INSERT INTO wunschgerichte (name, beschreibung, $date, creator, email) 
            VALUE ($_POST(POST_GERICHT_NAME), $_POST[POST_GERICHT_BESCHREIBUNG])";



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
</head>
<body>



    <section>
        <div>
            <form action="" method="POST">
                <fieldset>
                    <div class="formfield">
                        <input type="text" name="name" placeholder="Gericht Name" required>
                    </div>
                    <div class="formfield">
                        <input type="text" name="description" placeholder="Gericht Beschreibung" required>
                    </div>
                    <div class="formfield">
                        <input type="text" name="creator" value="Anonym" placeholder="Name" >
                    </div>
                    <div class="formfield">
                        <input type="email" name="email" placeholder="Email Adresse">
                    </div>

                    <input type="submit" name="anmeldung" value="Wunsch Abschicken" class="custom-button">

                </fieldset>
            </form>
        </div>
    </section>







</body>
</html>