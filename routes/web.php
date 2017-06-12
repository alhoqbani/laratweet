<?php
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{user}', 'ProfileController@show')->name('user.profile');
Route::get('/', function () {
    return view('welcome');
});