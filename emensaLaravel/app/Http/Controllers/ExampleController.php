<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function getName() {
        return "This is the getName method";
    }

    /**
     * Aufgabe 7 a) takes parameter and returns
     * @param Request $request
     * @return mixed
     */
    public function m4_7a_queryparameter(Request $request) {
        return $request->input('name');
    }



}
