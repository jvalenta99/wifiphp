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

/* Route::get('/', function () {
    return view('home');
}); */


// Route::get('/', 'HomeController@index');//home view

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('laender', 'LandController');
Route::resource('sportveranstaltung', 'SportveranstaltungController');
Route::resource('meinSpielplan', 'MeinSpielplanController');




Route::get('/veransuch', 'VeransuchController@index');
Route::get('/bewerorg', 'BewerorgController@index');
Route::get('/bewerdet', 'BewerdetController@index');

Route::get('/verandet', 'VerandetController@index');
Route::get('/verandet/{id}', 'VerandetController@show');

//Route::get('/veranneu', 'VeranneuController@create');


Route::get('/meineveranorg', 'MeineveranorgController@index');
Route::get('/meineverandet', 'MeineverandetController@index');
  
Route::get('/table', function () {
    return view('layouttest');
});



Route::get('/login', function () {
    return view('welcome');
});

Route::get('/home1', function () {
    return view('home1');
});



//Route::resource('test', 'TestController');
Route::resource('test2', 'Test2Controller');

Route::post('/language', array(
    'before' => 'csrf',
    'as' =>'language-chooser',
    'uses' =>'LanguageController@chooser'
));

Route::get('/language/{lang}','LanguageController@getChooser');

Auth::routes();




//Route::get('/test', 'TestController@index')->name('test');


