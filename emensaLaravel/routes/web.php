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




/*
 * Aufgabe 7 a)
 * */

/*
 * Route::get('m4_7a_queryparameter', function () {
    return view('examples.m4_7a_queryparameter', [
            'post' => [\App\Http\Controllers\ExampleController::class, 'm4_7a_queryparameter']
        ]);
});

*/


/**
 * Aufgabe 7
 */
Route::get( 'm4_7a_queryparameter', [\App\Http\Controllers\ExampleController::class, 'taskA']);
Route::get('m4_7b_kategorie', [\App\Http\Controllers\ExampleController::class, 'taskB']);
Route::get('m4_7c_gerichte', [\App\Http\Controllers\ExampleController::class, 'taskC']);
Route::get('m4_7d_layout', [\App\Http\Controllers\ExampleController::class, 'taskD']);



