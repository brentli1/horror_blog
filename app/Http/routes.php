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
});
