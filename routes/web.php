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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Player

Route::get('/player', 'PlayerController@index')->name('player');   

Route::resource('crud', 'PlayerController');

Route::get('/editplayer', 'PlayerController@edit')->name('editplayer');

 
// Club

Route::get('/club', 'ClubController@index')->name('club');

Route::resource('clubcrud', 'ClubController');

Route::get('/editclub', 'ClubController@edit')->name('editclub');
 
