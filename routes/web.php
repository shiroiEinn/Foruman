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



Route::get('/','PagesController@home')->name('home');
Route::get('/login','PagesController@login')->name('login');
Route::get('/register','PagesController@register')->name('register');
Route::get('/home', 'PagesController@home')->name('home');
Route::post('/home/checklogin', 'LoginController@checkLogin');
Route::get('/home/successlogin', 'LoginController@successLogin');
Route::get('/home/logout', 'LoginController@logout');