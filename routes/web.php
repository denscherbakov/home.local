<?php

Auth::routes();

Route::get('/test',function(){die('test');});
Route::get('/',                            'HomeController@index');

Route::get('article/create',               'ArticleController@create');
Route::get('article/user/{id}',            'ArticleController@userArticles');
Route::post('/article/like/{article}',           'ArticleController@like');
Route::post('/article/unlike/{article}',         'ArticleController@unlike');
Route::get('article/{id}',                 'ArticleController@show');

Route::get('personal',                     'UserController@personal');
Route::get('users',                        'UserController@users');
Route::post('users/edit/{id}',             'UserController@edit');
Route::get('users/{id}',                   'UserController@show');
Route::post('add_to_friends',              'UserController@addToFriends');




