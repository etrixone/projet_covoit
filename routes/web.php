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
Route::get('/rechercher_un_trajet', 'HomeController@rechercherUnTrajet');
Route::post('/rechercher_un_trajet', 'HomeController@resultatRecherche');
Route::post('/annuler_trajet', 'HomeController@annulerTrajet')->name('annuler_trajet');

Route::get('/details_trajet/{id}', 'HomeController@detailsTrajet')->name('details_trajet');
Route::post('/reservation', 'HomeController@reserverTrajet')->name('reservation');
Route::post('/annuler_reservation', 'HomeController@annulerReservation')->name('annuler_reservation');


Route::get('/mes_reservations', 'HomeController@mesReservations');
Route::get('/details_trajet_reservation/{id}', 'HomeController@detailsTrajetReservation')->name('details_trajet_reservation');


Route::get('/mes_trajets', 'HomeController@mesTrajets');
Route::get('/details_trajet_proposer/{id}', 'HomeController@detailsTrajetProposer')->name('details_trajet_proposer');





Route::get('/proposer_un_trajet', 'HomeController@proposerUnTrajet');
Route::post('/proposer_un_trajet', 'HomeController@validerProposerUnTrajet');

Route::post('/details', 'HomeController@detailsTrajet');

Route::get('/test/', function(){
    return view('test');
})->name('test');



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
//Route qui retourne tous les trajets
Route::get('all_trajets', 'TrajetsController@getAllTrajets');
//Permet de supprimer un trajet depuis
Route::get('deleteTrajet/{id}', 'TrajetsController@deleteTrajet');
//Permet d'ajouter une classe à la BDD
Route::post('supprimerClasse', 'UsersController@supprimerClasse');
//ERREUR
Route::post('classe', 'UsersController@getUsers');
});




