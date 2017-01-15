<?php

Route::get('/', 'HomeController@index');
Route::get('/tags', 'TagsController@index');
Route::get('/tags/{id}', 'TagsController@show');
Route::get('/movies', 'MoviesController@index');
Route::get('/movies/{id}', 'MoviesController@show');

Route::group(['prefix' => 'admin'], function () {
  // Authentication Routes...
  $this->get('login', 'Auth\LoginController@showLoginForm');
  $this->post('login', 'Auth\LoginController@login');
  $this->get('logout', 'Auth\LoginController@logout');

  // // Password Reset Routes...
  $this->get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
  $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
  $this->post('password/reset', 'Auth\ResetPasswordController@reset');

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

  Route::post('/reviews/{review_id}', 'ReviewsController@updateReview');

  Route::get('/images/{id}/delete', 'ImagesController@removeImage');
  Route::get('/images/{id}/featured/{movie_id}', 'ImagesController@featuredImage');
});
