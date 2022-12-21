<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/index'             => "HomeController@index",
    "/demo"         => "DemoController@demo",
    '/dbconnect'    => 'DemoController@dbconnect',
    '/debug'        => 'HomeController@debug',
    '/error'        => 'DemoController@error',
    '/requestdata'   => 'DemoController@requestdata',

    '/queryparameter' => 'ExampleController@queryparameter',
    '/kategorie' => 'ExampleController@kategorie',
    '/gerichte'  => 'ExampleController@gerichte',
    '/layouts' => 'ExampleController@choosepage',

    // EMensa
    '/' => 'EmensaController@index',
    '/anmeldung' => 'EmensaController@anmeldung',
    '/anmeldung_verifizieren' => 'EmensaController@anmeldungVerifizieren',
    '/abmeldung' => 'EmensaController@abmeldung',
    '/bewertung' => 'EmensaController@bewertung',
    '/bewertung_store' => 'EmensaController@bewertung_verifizieren',
    '/meinebewertungen' => 'EmensaController@user_bewertungen',
    '/delete_review' => 'EmensaController@bewertung_delete'


);

