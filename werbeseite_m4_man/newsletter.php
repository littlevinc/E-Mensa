<?php
const POST_NEWSLETTER_NAME = 'user';
const POST_NEWSLETTER_MAIL = 'mail';
const POST_NEWSLETTER_LANG = 'lang';
const POST_NEWSLETTER_DSGVO = 'dsgvo';
const POST_NEWSLETTER_SUBMIT = 'anmeldung';

function valName($name): array {

    $fehlerName = null;

    if(empty($name)){
        $fehlerName = "Feld Name muss ausgefüllt sein.";
    }
    else if (ctype_alpha(str_replace(' ', '', $name)) === false){
        $fehlerName = "Name darf nur Buchstaben enthalten.";
    }

    return ['value' => trim($name), 'error' => $fehlerName];
}

function valMail($mail): array{

    $fehlerMail = null;

    if(empty($mail)){
        $fehlerMail = "Feld Mail muss ausgefüllt sein.";
    }
    else{
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $fehlerMail = "Es wurde keine korrekte E-Mail eingegeben.";
        }
    }
    return ['value' => $mail , 'error' => $fehlerMail];
}

function valLang($lang): array {

    $fehlerLang = null;

    if(empty($lang)){
        $fehlerLang = "Es muss eine Sprache selektiert werden";
    }else if(ctype_alpha($lang) === false){
        $fehlerLang = "Sprache darf nur Buchstaben enthalten.";
    }else if($lang!== "Deutsch" && $lang !== "English"){
        $fehlerLang="Ausgewählte Sprache muss in der Dropdown Liste enthalten sein.";
    }
    return ['value' => trim($lang), 'error' => $fehlerLang];

}

function valDSGVO($dsgvo): array {

    $fehlerDsgvo = null;

    if($dsgvo!=='true'){

        $dsgvo = false;
        $fehlerDsgvo = "DSGVO Bestimmungen müssen akzeptiert werden!";
    }
    return ['value' => $dsgvo, 'error' => $fehlerDsgvo];
}

function errorFree($errors): bool {

    foreach($errors as $error){
        if(!empty($error)){
            return false;
        }
    }

    return true;
}

function valNewsletter() : array {

        $newsletterOut = ['values' => [
                'name' =>'',
                'mail' => '',
                'lang' => '',
                'dsgvo' => '',
        ], 'errors' => [
            'user' =>'',
            'mail' => '',
            'lang' => '',
            'dsgvo' => '',
            'submit' => ''
        ]];

        $name = $_POST[POST_NEWSLETTER_NAME] ?? NULL;
        $mail = $_POST[POST_NEWSLETTER_MAIL] ?? NULL;
        $lang = $_POST[POST_NEWSLETTER_LANG] ?? NULL;
        $dsgvo = $_POST[POST_NEWSLETTER_DSGVO] ?? NULL;


        if(isset($_POST[POST_NEWSLETTER_SUBMIT])){

            $nameOut = valName($name);
            $mailOut = valMail($mail);
            $langOut = valLang($lang);
            $dsgvoOut = valDSGVO($dsgvo);

            $newsletterOut['values']['name'] = $nameOut['value'];
            $newsletterOut['errors']['name'] = $nameOut['error'];

            $newsletterOut['values']['mail'] = $mailOut['value'];
            $newsletterOut['errors']['mail'] = $mailOut['error'];

            $newsletterOut['values']['lang'] = $langOut['value'];
            $newsletterOut['errors']['lang'] = $langOut['error'];

            $newsletterOut['values']['dsgvo'] = $dsgvoOut['value'];
            $newsletterOut['errors']['dsgvo'] = $dsgvoOut['error'];

        }
        else{
            $newsletterOut['errors']['submit'] = 'Nicht Submittet';
        }
        return $newsletterOut;
}

function signupToFile($signup) : void{

    if(file_exists('newsletter_signup.txt')){

        //READ FILE AND CHECK IF INPUT EXISTS

        $file = fopen('newsletter_signup.txt', 'r');
        if(!$file){
            die('Öffnen fehlgeschlagen');
        }

        $found = false;
        while(!feof($file)){
            $line = fgets($file);
            if(str_contains($line, $signup['mail'])){
                $found = true;
                break;
            }
        }

        fclose($file);

        if(!$found){

            $file = fopen('newsletter_signup.txt', 'a');
            if(!$file){
                die('Öffnen fehlgeschlagen');
            }
            $newline = implode(';', $signup) . "\n";
            fwrite($file, $newline);

            fclose($file);

        }

    }
    else{
        //WRITE SIGNUP TO NEW FILE
        $file = fopen('newsletter_signup.txt', 'w');
        if(!$file){
            die('Öffnen fehlgeschlagen');
        }
        $line = implode(';', $signup) . "\n";
        fwrite($file, $line);
        fclose($file);


    }


}




$formOutput = valNewsletter();
//Check if there are any errors in$formOutput


if(errorFree($formOutput['errors'])){
    signupToFile($formOutput['values']);
}


?>

 <form action="#kontakt" method="POST">
        <fieldset>
        <div class="formfield">
            <div><?php if(isset($_POST['submit']) && !empty($formOutput['error']['name'])) echo $formOutput['error']['name'];?></div>
            <input type="text" id="name" name="user" placeholder="Name" required value="<?php if(isset($_POST['user'])) echo $_POST['user']; ?>">
        </div>
        <div class="formfield">
            <div><?php  if(isset($_POST['submit']) && !empty($formOutput['error']['mail'])) echo $formOutput['error']['mail'];?></div>
            <input type="email" id="mail" name="mail" placeholder="E-Mail" required value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>">
        </div>
        <div class="formfield">
            <div><?php  if(isset($_POST['submit']) && !empty($formOutput['error']['lang'])) echo $formOutput['error']['lang'];?></div>
            <select name="lang" id="lang">
                <option value="Deutsch">Deutsch</option>
                <option value="English">English</option>
            </select>
        </div>
        <div class="formfield">
            <div><?php if(isset($_POST['submit']) && !empty($formOutput['error']['dsgvo'])) echo $formOutput['error']['dsgvo'];?></div>
            <input type="checkbox" id="dsgvo" name="dsgvo" value="true" required>
            <label for="dsgvo">Hiermit stimme ich den Datenschutzbestimmungen zu</label>
        </div>
        <input class="custom-button" type="submit" name="anmeldung" value="Zum Newsletter anmelden">
    </fieldset>
</form>


