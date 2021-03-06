<?php
//POST
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create')->name('create');
Route::post('/posts', 'PostsController@store')->name('post_store');
Route::patch('/posts/{post}', 'PostsController@update')->name('post_update');
Route::get('/posts/{post}', 'PostsController@show')->name('post_show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('post_edit');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('post_destroy');
// First, show a view to confirm the delte and then delete de post

//TAGS
Route::get('/posts/tags/{tag}', 'TagsController@index');

//COMMENTS
Route::post('/posts/{post}/comments', 'CommentsController@store');

//REGISTRATION
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

//SESSIONS
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

//USERS
Route::get('/profile', 'UserController@profile')->name('show_profile');
Route::post('/profile', 'UserController@updateAvatar');
