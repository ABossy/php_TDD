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

// page liste des projets
Route::get('/project','ProjectController@index');

// page detail du projet
Route::get('/project/show/{id}','ProjectController@show')->name('detailprojet');

Route::get('/pagedon', function (){
return view('pagedon');
});

// page création projet
Route::get('/creation', function (){
    return view('create');
    });

// page bouton création d'un projet
Route::post('/edit','ProjectController@store')->name('create')->middleware('auth');

// page edition d'un projet existant
Route::get('/editproject/{id}','ProjectController@edit')->name('editproject')->middleware('auth');

// page modification d'un projet
Route::post('/modif/{id}','ProjectController@modifproject')->name('projet.modif')->middleware('auth');
    
// supprimer un projet
Route::delete('/project/show/{id}','ProjectController@destroy')->name('projet.delete')->middleware('auth');

//Authentification
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
