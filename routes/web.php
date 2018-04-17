<?php

Route::get('/', 'StaticPagesController@home')->name('home_');
Route::get('/help', 'StaticPagesController@help')->name('help_');
Route::get('/about', 'StaticPagesController@about')->name('about_');
Route::get('signup', 'UsersController@create')->name('signup_');

Route::resource('users', 'UsersController');
    /*
        Route::get('/users', 'UsersController@index')->name('users.index');
        Route::get('/users/{user}', 'UsersController@show')->name('users.show');
        Route::get('/users/create', 'UsersController@create')->name('users.create');
        Route::post('/users', 'UsersController@store')->name('users.store');
        Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
        Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
        Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
    */

//登录退出
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//激活账号
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//重置密码
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');





//Test
Route::any('test', 'Test\IndexController@vueIndex');