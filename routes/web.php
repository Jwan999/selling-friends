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
    return view('layouts.master');
});
Route::group(["middleware" => "auth"], function () {
    Route::get('/sell', 'FriendController@index');
    Route::post('/sell', 'FriendController@store');
    Route::get('/sold', 'FriendController@friendSold');
    Route::get('/api/friends', 'FriendController@soldFriendApi');
    Route::get('/friends', 'FriendController@soldFriendPage');
});


Route::get('/redirect/facebook', 'Auth\LoginController@redirectToProvider')
    ->name('login');
Route::get('/{driver}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('logout', 'Auth\LoginController@logout');