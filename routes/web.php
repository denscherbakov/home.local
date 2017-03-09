<?php

Auth::routes();

Route::get('/',                            'HomeController@index');

Route::get('article/create',               'ArticleController@create');
Route::get('article/user/{id}',            'ArticleController@userArticles');
Route::get('/article/like/{id}',           'ArticleController@likeArticle');
Route::get('/article/unlike/{article}',    'ArticleController@unlikeArticle');
Route::get('article/{id}',                 'ArticleController@show');

Route::get('personal',                     'UserController@personal');
Route::get('users',                        'UserController@users');
Route::post('users/edit/{id}',             'UserController@edit');
Route::get('users/{id}',                   'UserController@show');
Route::post('add_to_friends',              'UserController@addToFriends');




