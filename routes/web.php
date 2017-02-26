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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

Route::post('/home', 'HomeController@recherche');

Route::get('/trajet', 'HomeController@trajet');

//Route qui permet d'accéder à la page d'ajout de membres via fichier CSV
Route::get('/csv_upload', 'UsersController@showForm');
//Route qui permet l'upload du fichier CSV à l'aide du formulaire
Route::post('/csv_upload', 'UsersController@usersList');


