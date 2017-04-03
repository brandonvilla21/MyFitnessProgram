<?php




// POSTS
Route::get('/', 'PostsController@index');
// SESSIONS
Route::get('/login/create', 'SessionsController@create');
