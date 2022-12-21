<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/bewertung.php');


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
            'username' => $username,
            'bewertungen' => db_show_hervorgehoben()
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

        //$salt = 'lbkf';
        $email = $request->query['email'];
        $password = $request->query['password'];
        $hash = sha1($password);
        $user = new Benutzer($email, $hash);
        $user->startTransaction();


        $loggedIn = $user->login();
        if($loggedIn){

            $user->anzahlanmeldungen_update();
            $user->letzteanmeldung_update();

            $username = $user->getName();

            $_SESSION['loggedUser'] = $username;
            $_SESSION['admin'] = true; //TODO: implement correct setting of admin role

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

    public function bewertung(RequestData $request) {

        $gerichte = db_gericht_uebersicht();

        // TODO: Abfrage ändern
        if(!isset($_SESSION['loggedUser'])) {
            return view('emensa.anmeldung');
        } else {
            return view('emensa.bewertung', [
                'gerichte' => db_current_gerichte(),
                'bewertungen' => db_list_bewertungen()
            ]);
        }

    }

    public function bewertung_verifizieren(RequestData $request) {

        /**
         * Validate lenght of bemerkung to be larger than 5
         */
        if( strlen($request->query['bemerkung']) < 5) {
            return view('emensa.bewertung', [
                'gerichte' => db_current_gerichte(),
                'error' => 'Die Bemerkung muss aus mindestens 5 Zeichen bestehen!'
            ]);
        }

        /*
         * Escape string bemerkung to prevent sql injection and store other val
         */
        $link = connectdb();
        $bemerkung_secure = mysqli_escape_string($link, $request->query['bemerkung']);
        mysqli_close($link);

        /**
         * Store data in array which is passed by reference to the insert function
         */
        $review = [
            "gericht_id" => (int)$request->query['gericht'],
            "bemerkung" => $bemerkung_secure,
            "sterne" => (int)$request->query['sterne'],
            "benutzer" => "Luke"
        ];

        db_insert_bewertung($review);

        return view('emensa.bewertung', [
            'gerichte' => db_gericht_uebersicht(),
            'bewertungen' => db_list_bewertungen()
        ]);

    }

    public function user_bewertungen(RequestData $request) {

        // redirect if user is not logged in
        if(!isset($_SESSION['loggedUser']))
            return view('emensa.anmeldung');

        return view('emensa.meinebewertung', [
            'bewertungen' => db_list_bewertungen_user($_SESSION['loggedUser']),
            'user' => $_SESSION['loggedUser']

        ]);

    }

    public function bewertung_delete(RequestData $request) {

        // redirect if user is not logged in
        if(!isset($_SESSION['loggedUser']))
            return view('emensa.anmeldung');

        db_delete_review($request->query['id']);
        return view('emensa.meinebewertung', [
            'bewertungen' => db_list_bewertungen_user($_SESSION['loggedUser'])
        ]);

    }

    public function bewertung_hervorheben(RequestData $request) {


        db_change_visibility($request->query['id']);
        return view('emensa.bewertung', [
            'gerichte' => db_current_gerichte(),
            'bewertungen' => db_list_bewertungen()
        ]);

    }




}