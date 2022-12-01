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


);