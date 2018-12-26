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


//Route::get('/','PagesController@home')->name('home');

Route::get('/login','PagesController@login')->name('login');
Route::post('/login/doLogin','LoginRegisterController@doLogin')->name('doLogin');
Route::get('/login/doLogout','LoginRegisterController@logout')->name('doLogout');

Route::get('/register','PagesController@register')->name('register');
Route::post('/register/doRegister','LoginRegisterController@doRegister')->name('doRegister');

Route::get('/', 'ForumController@index');

Route::get('/search', 'ForumController@search');