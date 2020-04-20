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
Route::get('/users/deleted', array('as' => 'users.deleted', 'uses' => 'CRUDController@getRestore'));
Route::post('/users/restore', array('as' => 'users.restore', 'uses' => 'CRUDController@postRestore'));
Route::get('/users', array('as' => 'users', 'uses' => 'CRUDController@index'));
Route::delete('/users/delete', array('as' => 'users.delete', 'uses' => 'CRUDController@destroy'));
Route::get('/users/create', array('as' => 'users.create', 'uses' => 'CRUDController@create'));
Route::post('/users/create', array('as' => 'users.store', 'uses' => 'UsersController@store'));
Route::get('/users/{id}/edit', array('as' => 'users.edit', 'uses' => 'CRUDController@edit'));
Route::put('/users/{id}/edit', array('as' => 'users.update', 'uses' => 'UsersController@update'));
Route::get('/users/{slug}', array('as' => 'users.show', 'uses' => 'CRUDController@show'));
