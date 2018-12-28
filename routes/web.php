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
Route::get('/', 'PagesController@home')->name('home');
Route::get('/search', 'ForumController@search')->name('homesearch');

Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','PagesController@login')->name('login');
    Route::post('/login/doLogin','LoginRegisterController@doLogin')->name('doLogin');
    

    Route::get('/register','PagesController@register')->name('register');
    Route::post('/register/doRegister','LoginRegisterController@doRegister')->name('doRegister');
});

Route::group(['middleware'=>['notGuest']],function(){
    Route::get('/login/doLogout','LoginRegisterController@logout')->name('doLogout');
    
    Route::get('/addForum','PagesController@addForum')->name('addForum');
    Route::post('/doAddForum','ForumController@create')->name('doAddForum');

});




