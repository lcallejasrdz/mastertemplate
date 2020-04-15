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

// Datatables
Route::post('/datatables', array('as' => 'datatables', 'uses' => 'DataTablesController@data'));

// Users
Route::get('/users', array('as' => 'users', 'uses' => 'CRUDController@index'));
Route::get('/users/{slug}', array('as' => 'users.show', 'uses' => 'CRUDController@show'));
Route::delete('/users/delete', array('as' => 'users.delete', 'uses' => 'CRUDController@destroy'));
