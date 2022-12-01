<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');

class ExampleController
{
    public function m4_6a_queryparameter(RequestData $rd) {
        /*
           Wenn Sie hier landen:
           bearbeiten Sie diese Action,
           so dass Sie die Aufgabe löst
        */

        return view('notimplemented', [
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }

    //7a
    public function queryparameter(Requestdata $rd){
        $name = $rd->query['name'] ?? null;

        return view('examples.m4_7a_queryparameter', [
            'request' => $rd,
            'name' => $name
        ]);
    }

    //7b
    public function kategorie(RequestData $rd){

        $kategorien = db_kategorie_select_name();
        return view('examples.m4_7b_kategorie', [
            'kategorien' => $kategorien
        ]);
    }

    //7c
    public function gerichte(RequestData $rd){

        $gerichte = db_gericht_select_highprice();

        return view('examples.m4_7c_gerichte', [
            'gerichte' => $gerichte
        ]);
    }

    //7d
    public function choosepage(RequestData $rd){

        $pageNumber = $rd->query['no'] ?? '1';

        if($pageNumber == '2'){
            return view('examples.m4_7d_page_2',
                ['rd' => $rd]);
        }
        else{
            return view('examples.m4_7d_page_1',
                ['rd' => $rd]);
        }


    }

}