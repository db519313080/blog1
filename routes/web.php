<?php

Route::get('/', 'StaticPagesController@home')->name('home_');
Route::get('/help', 'StaticPagesController@help')->name('help_');
Route::get('/about', 'StaticPagesController@about')->name('about_');
Route::get('signup', 'UsersController@create')->name('signup_');
Route::resource('users', 'UsersController');