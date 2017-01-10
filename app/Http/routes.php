<?php

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
$this->get('admin/login', 'Auth\AuthController@showLoginForm');
$this->post('admin/login', 'Auth\AuthController@login');
$this->get('admin/logout', 'Auth\AuthController@logout');

// Password Reset Routes...
$this->get('admin/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('admin/password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('admin/password/reset', 'Auth\PasswordController@reset');

Route::get('/admin', 'AdminController@index');
