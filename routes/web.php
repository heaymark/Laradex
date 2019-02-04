<?php

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

//Mi primer ruta
Route::get('/mi_primer_ruta', function () {
    return 'Hello word';
});

//Ruta con parametros
Route::get('/name/{name}/{lastname?}', function ($name, $lastname = null) {
    return 'Hello soy '. $name . ' '.$lastname;
});

//Ruta que se va referir a un controlador y a una funcion en especifico pasando un parametro
Route::get('prueba/{name}', 'PruebaController@prueba');

//Acceder a las ruta del controlador
Route::resource('trainers', 'TrainerController');

