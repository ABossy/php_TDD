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

Route::get('/project','ProjectController@index');

Route::get('/project/show/{id}','ProjectController@show')->name('detailprojet');

Route::get('/pagedon', function (){
return view('pagedon');
});

Route::get('/editproject')->name('editproject')->middleware('auth');
    
    


//Authentification
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
