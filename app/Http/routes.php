<?php

Route::get('/', 'HomeController@index');
Route::get('/tags', 'TagsController@index');
Route::get('/tags/{id}', 'TagsController@show');
Route::get('/movies', 'MoviesController@index');
Route::get('/movies/{id}', 'MoviesController@show');

Route::group(['prefix' => 'admin'], function () {
  // Authentication Routes...
  $this->get('login', 'Auth\AuthController@showLoginForm');
  $this->post('login', 'Auth\AuthController@login');
  $this->get('logout', 'Auth\AuthController@logout');

  // Password Reset Routes...
  $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
  $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
  $this->post('password/reset', 'Auth\PasswordController@reset');

  Route::get('/', 'AdminController@index');
  Route::get('/tags', 'AdminController@tags');
  Route::get('/tags/create', 'AdminController@showTagCreate');
  Route::post('/tags/create', 'TagsController@tagCreate');
  Route::get('/tags/{id}', 'AdminController@showTagEdit');
  Route::post('/tags/{id}', 'TagsController@tagEdit');
  Route::delete('/tags/delete/{id}', 'TagsController@tagDelete');

  Route::get('/movies', 'AdminController@movies');
  Route::get('/movies/create', 'AdminController@showMovieCreate');
  Route::post('/movies/create', 'MoviesController@movieCreate');
  Route::get('/movies/{id}', 'AdminController@showMovieEdit');
  Route::post('/movies/{id}', 'MoviesController@movieEdit');
  Route::delete('/movies/delete/{id}', 'MoviesController@movieDelete');
});
