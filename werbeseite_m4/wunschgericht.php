<?php

//TODO Default = anonym scheint noch nicht zu funktionieren

function valWunschgericht() : array{

    $wunschgerichtVal = [
        'values' => [
            'gerichtName' => '',
            'gerichtBeschreibung' => '',
            'erstellerName' => '',
            'erstellerMail' => ''],
        'errors' => [
            'gerichtName' => '',
            'gerichtBeschreibung' => '',
            'erstellerName' => '',
            'erstellerMail' => '',
            'submit' => '']
        ];

    $gerichtName = $_POST['gerichtName'] ?? NULL;
    $gerichtBeschreibung = $_POST['gerichtBeschreibung'] ?? NULL;
    $erstellerName = $_POST['erstellerName'] ?? NULL;
    $erstellerMail = $_POST['erstellerMail'] ?? NULL;

    if(isset($_POST['submit'])){
        $gerichtNameOut  = valGerichtName($gerichtName);
        $gerichtBeschreibungOut  = valGerichtBeschreibung($gerichtBeschreibung);
        $erstellerNameOut = valErstellerName($erstellerName);
        $erstellerMailOut = valErstellerMail($erstellerMail);

        $wunschgerichtVal['values']['gerichtName'] = $gerichtNameOut['value'];
        $wunschgerichtVal['errors']['gerichtName'] = $gerichtNameOut['error'];

        $wunschgerichtVal['values']['gerichtBeschreibung'] = $gerichtBeschreibungOut['value'];
        $wunschgerichtVal['errors']['gerichtBeschreibung'] = $gerichtBeschreibungOut['error'];

        $wunschgerichtVal['values']['erstellerName'] = $erstellerNameOut['value'];
        $wunschgerichtVal['errors']['erstellerName'] = $erstellerNameOut['error'];

        $wunschgerichtVal['values']['erstellerMail'] = $erstellerMailOut['value'];
        $wunschgerichtVal['errors']['erstellerMail'] = $erstellerMailOut['error'];
    }
    else{
        $wunschgerichtVal['errors']['erstellerMail'] = 'Nicht submittet';
    }

    return $wunschgerichtVal;
}

function valGerichtName($name) : array{

    $fehlerName = null;

    if(empty($name)){
        $fehlerName = "Feld Name muss ausgefüllt sein.";
    }
    /*
    else if (ctype_alpha(str_replace(' ', '', $name)) === false){
        $fehlerName = "Name darf nur Buchstaben enthalten.";
    }
    */
    return ['value' => trim($name), 'error' => $fehlerName];
}

function valGerichtBeschreibung($beschreibung) : array{

    $fehlerBeschreibung = null;

    if(empty($beschreibung)){
        $fehlerBeschreibung = "Feld Beschreibung muss ausgefüllt sein.";
    }
    /*
    else if (ctype_alpha(str_replace(' ', '', $beschreibung)) === false){
        $fehlerBeschreibung = "Beschreibung darf nur Buchstaben enthalten.";
    }
    */
    return ['value' => trim($beschreibung), 'error' => $fehlerBeschreibung];

}

function valErstellerName($erstellerName) : array{

    $fehlerName = null;

    if (!empty($erstellerName) &&ctype_alpha(str_replace(' ', '', $erstellerName)) === false){
        $fehlerName = "Beschreibung darf nur Buchstaben enthalten.";
        $erstellerName = trim($erstellerName);
    }
    else{
        $erstellerName = NULL;
    }

    return ['value' => $erstellerName, 'error' => $fehlerName];

}

function valErstellerMail($erstellerMail) : array{

    $fehlerMail = null;

    if(!empty($erstellerMail)){
        $erstellerMail = filter_var($erstellerMail, FILTER_SANITIZE_EMAIL);

        if(!filter_var($erstellerMail, FILTER_VALIDATE_EMAIL)){
            $fehlerMail = "Es wurde keine korrekte E-Mail eingegeben.";
            $erstellerMail = trim($erstellerMail);
        }
        else{
            $erstellerMail = NULL;
        }
    }
    return ['value' => $erstellerMail , 'error' => $fehlerMail];

}

function errorFree($errors): bool {

    foreach($errors as $error){
        if(!empty($error)){
            return false;
        }
    }
    return true;
}

function insertWunschgerichtToDB($request) {

    $gerichtName = $request['gerichtName'];
    $gerichtBeschreibung = $request['gerichtBeschreibung'];
    $erstellerName = $request['erstellerName'];
    $erstellerMail = $request['erstellerMail'];

    echo "<br> INSERT WUNSCHGERICHT" . $request['gerichtName'] . "<br>";

    $link = mysqli_connect('localhost', 'root', 'root', 'emensawerbeseite');

    if(!$link){
        error("DataBase connection failed", mysqli_connect_error());
        exit();
    }

    $sql = "INSERT INTO wunschgerichte (gericht_name, gericht_beschreibung, ersteller_name, ersteller_mail) VALUES ('$gerichtName', '$gerichtBeschreibung', '$erstellerName', '$erstellerMail');";

    $result = mysqli_query($link, $sql);

    echo $result;

    mysqli_close($link);
}

$wunschgerichtFormValues = valWunschgericht();

if(errorFree($wunschgerichtFormValues['errors'])){

    insertWunschgerichtToDB($wunschgerichtFormValues['values']);

}
else{
    echo "not error free";
    echo "gericht name value " . $wunschgerichtFormValues['values']['gerichtName'] . "<br>";
    echo "Beschreibung value " . $wunschgerichtFormValues['values']['gerichtBeschreibung'] . "<br>";
    echo "erstllerName value " . $wunschgerichtFormValues['values']['erstellerName'] . "<br>";
    echo "erstellerBeschreibung value " .$wunschgerichtFormValues['values']['erstellerMail'] . "<br>";

    echo "gericht name error " . $wunschgerichtFormValues['errors']['gerichtName'] . "<br>";
    echo "Beschreibung error " . $wunschgerichtFormValues['errors']['gerichtBeschreibung'] . "<br>";
    echo "erstllerName error " . $wunschgerichtFormValues['errors']['erstellerName'] . "<br>";
    echo "erstellerBeschreibung error " .$wunschgerichtFormValues['errors']['erstellerMail'] . "<br>";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            <?php  include ("style.css"); ?>
        </style>
        <link rel="stylesheet" href="https://use.typekit.net/qxh4wpt.css">
        <title>Wunschgericht einreichen </title>
    </head>

    <body>
    <?php include ("navbar.php");?>
    <h2 id="wunschgericht">Wunschgericht einreichen</h2>
    <section>

        <form action="#wunschgericht" method="POST">
            <fieldset>
                <div class="formfield">
                    <input type="text" name="gerichtName" placeholder="Gericht Titel" required>
                </div>
                <div class="formfield">
                    <input type="text" name="gerichtBeschreibung" placeholder="Gericht Beschreibung" required>
                </div>
                <div class="formfield">
                    <input type="text" name="erstellerName" placeholder="Name">
                </div>
                <div class="formfield">
                    <input type="text" name="erstellerMail" placeholder="E-Mail">
                </div>

                <input class="custom-button" type="submit" name="submit" value="Bestätigen">
            </fieldset>
        </form>

    </section>




    <?php include ("footer.php");?>

    </body>

</html>