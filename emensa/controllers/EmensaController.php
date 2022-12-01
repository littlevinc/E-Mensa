<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        $gerichte = db_gericht_uebersicht();

        return view('emensa.home', [
            'rd' => $request,
            'gerichte' => $gerichte
        ]);
    }



}