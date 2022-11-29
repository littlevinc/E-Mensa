<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [\App\Http\Controllers\ExampleController::class, 'getName']);


/*
 * Aufgabe 7 a)
 * */
Route::get('m4_7a_queryparameter', function () {
    return view('examples.m4_7a_queryparameter', [
            'post' => [\App\Http\Controllers\ExampleController::class, 'm4_7a_queryparameter']
        ]);
});

Route::get( 'test', [\App\Http\Controllers\ExampleController::class, 'test']);

