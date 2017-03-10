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

Route::group(['middleware' => ['enable']], function () {
    
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home');
Route::post('/home', 'HomeController@recherche');
Route::get('/trajet', 'HomeController@trajet');
Route::post('/trajet', 'HomeController@ajoutTrajet');
Route::get('/test', function(){
    return view('trajet');
    
});



});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    
Route::get('index', 'HomeController@admin');

//Permet d'accéder à la page d'ajout de membres via fichier CSV
Route::get('csv_upload', 'UsersController@csvForm');
//Permet d'upload un fichier CSV à l'aide du formulaire d'ajout
Route::post('csv_upload', 'UsersController@usersList');
//Permet d'accéder à la page qui regroupe toutes les info. des utilisateurs du site
Route::get('all_users', 'UsersController@allUsersForm');
//Permet de supprimer un utilisateur depuis la page all_users
Route::get('delete/{id}', 'UsersController@deleteUser');
//Route qui permet de changer supprimer tous les utilisateurs depuis la page all_users
Route::get('deleteAll', 'UsersController@deleteAllUsers');
//Route qui permet de changer le statut d'un utilisateur depuis la page all_users
Route::get('status/{id}', 'UsersController@statusUser');
//Route qui permet de changer le statut de tous les utilisateurs depuis la page all_users
Route::get('status', 'UsersController@statusAllUsers');
//Route qui permet de changer de récuperer les utilisateurs selon la lettre
Route::get('getUsers/{letter}', 'UsersController@getUsers');
});




