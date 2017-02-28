<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('personal', 'UserController@personal');
Route::get('users', 'UserController@users');
Route::post('user/edit/{id}', 'UserController@edit');

Route::post('add_to_friends', 'UserController@addToFriends');


