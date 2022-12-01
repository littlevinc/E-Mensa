<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/gericht.php');

class EmensaController
{
    public function index(RequestData $request)
    {
        $gerichte = db_gericht_uebersicht();

        return view('emensa.home', [
            'rd' => $request,
            'gerichte' => $gerichte
        ]);
    }


}