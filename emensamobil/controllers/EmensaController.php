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
        $user = new Benutzer($email, $hash);
        $user->startTransaction();

        $loggedIn = $user->login();
        if($loggedIn){

            $user->anzahlanmeldungen_update();
            $user->letzteanmeldung_update();

            $username = $user->getName();

            $_SESSION['loggedUser'] = $username;

            $log = logger();
            $log->info('Anmeldung Success: ' . $username);

            unset($_SESSION['anmeldungError']);
            $_SESSION['login_ok'] = true;

            $user->commit();
            $user->closeConnection();
            header('Location:/');
        }else{
            $log = logger();
            $log->warning('Anmeldung Fail');


            $user->anzahlfehler_update();
            $user->letzterfehler_update();

            $_SESSION['anmeldungError'] = "E-Mail Adresse & Passwort stimmen nicht überein";

            $user->commit();
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