<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#Auth::routes();
Route::get('/setup', 'SetupController@pre_setup');
Route::post('/setup', 'SetupController@post_setup');
Route::get('/about', 'MainController@about');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'MainController@index')->name('home');
Route::get('/{sections}', 'MainController@index')->name('main');
Route::post('/movesection', 'SectionController@move')->name('movesection');
Route::post('/{sections}', 'PostController@Create')->name('savecontent');
Route::post('/', 'SectionController@create')->name('createsection');
Route::post('/section/update', 'SectionController@update')->name('section.update');
Route::delete('/', 'SectionController@delete')->name('deletesection');