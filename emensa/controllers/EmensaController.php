<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/benutzer.php');

class EmensaController
{
    public function index(RequestData $request)
    {

        $log = logger();
        $log->info('ACCESS HOMEPAGE');

        //TODO Frage ich übergebe hier den Usernamen für
        // Navbar muss ich dann das auf jeder Seite machen? oder lässt sich das besser darstellen?

        $gerichte = db_gericht_uebersicht();
        $username = $_SESSION['loggedUser'] ?? null;

        return view('emensa.home', [
            'rd' => $request,
            'gerichte' => $gerichte,
            'username' => $username
        ]);


    }

    public function anmeldung(RequestData $request){

        //Check ob es Fehler gibt
        $error = $_SESSION['anmeldungError'] ?? null;

        return (view('emensa.anmeldung',[
            'rd' => $request,
            'error' => $error
        ]));
    }

    public function anmeldungVerifizieren(RequestData $request){

        $salt = 'lbkf';
        $email = $request->query['email'];
        $password = $salt . $request->query['password'];
        $hash = sha1($password);

        mysqli::transaction_start();
        $user = new Benutzer($email, $hash);
        //$data = db_benutzer_login($email, $hash);
        $loggedIn = $user->login();
        if($loggedIn){

            /*
            db_benutzer_anzahlanmeldungen_update($email);
            db_benutzer_letzteanmeldung_update($email);
            */

            $user->anzahlanmeldungen_update();
            $user->letzteanmeldung_update();

            //$username = db_benutzer_name($email)['name'];
            $username = $user->getName();

            $_SESSION['loggedUser'] = $username;

            $log = logger();
            $log->info('Anmeldung Success: ' . $username);

            unset($_SESSION['anmeldungError']);
            $_SESSION['login_ok'] = true;

            mysqli::commit();
            $user->closeConnection();
            header('Location:/');
        }else{
            $log = logger();
            $log->warning('Anmeldung Fail');

            /*
            db_benutzer_anzahlfehler_update($email);
            db_benutzer_letzterfehler_update($email);
            */

            $user->anzahlfehler_update();

            $user->letzterfehler_update();

            $_SESSION['anmeldungError'] = "E-Mail Adresse & Passwort stimmen nicht überein";

            mysqli::commit();
            $user->closeConnection();
            header('Location:/anmeldung');
        }
    }

    public function abmeldung(RequestData $request){

        $_SESSION['login_ok'] = false;

        $log = logger();
        $log->info('Abmeldung Success ' . $_SESSION['loggedUser']);

        unset($_SESSION['loggedUser']);

        header('Location:/');
    }


}