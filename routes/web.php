<?php
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/{user}/tweets', 'TweetController');
Route::get('/{user}/follows', 'UsersController@follows')->name('follow');
Route::get('/{user}/unfollows', 'UsersController@unfollows')->name('unfollow');
Route::get('/{user}', 'ProfileController@show')->name('user.profile');
Route::get('/', function () {
    return view('welcome');
});