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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users');

Route::get('/create', 'UsersController@index')->name('create');
Route::post('/users', 'UsersController@store')->name('store');
Route::get('/users/{id}', 'UsersController@show')->name('show');
Route::post('/users/{id}', 'UsersController@update')->name('update');

Route::get('/delete/{id}', 'UsersController@delete')->name('delete');
