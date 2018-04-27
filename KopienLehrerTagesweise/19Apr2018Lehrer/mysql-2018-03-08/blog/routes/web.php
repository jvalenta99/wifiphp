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
use App\Task;
use Illuminate\Http\Request;

Route::get('/', 'TaskController@index');

/**
 * Add A New Task
 */
Route::post('/task', 'TaskController@createTask');

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', 'TaskController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
