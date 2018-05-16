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

Route::get('/project', function () {
    return view('project');
});

Route::get('/voyage', function () {
    return view('voyage');
});

Route::get('/humanitaire', function () {
    return view('humanitaire');
});

//Authentification
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
