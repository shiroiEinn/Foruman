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
Route::get('/forum', 'PagesController@home');
Route::get('/forum/search', 'ForumController@search')->name('homesearch');

Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','PagesController@login')->name('login');
    Route::post('/login/doLogin','LoginRegisterController@doLogin')->name('doLogin');
    

    Route::get('/register','PagesController@register')->name('register');
    Route::post('/register/doRegister','LoginRegisterController@doRegister')->name('doRegister');
});

Route::group(['middleware'=>['notGuest']],function(){
    Route::get('/login/doLogout','LoginRegisterController@logout')->name('doLogout');
    
    Route::get('/forum/addForum','PagesController@addForum')->name('addForum');
    Route::post('/forum/doAddForum','ForumController@create')->name('doAddForum');
    Route::get('/forum/myForum','ForumController@myForum')->name('myForum');
    Route::post('/forum/deleteForum','ForumController@delete')->name('deleteForum');
    Route::get('/forum/editForum/{id}','ForumController@edit')->name('editForum');
    Route::patch('/forum/doEditForum/{id}','ForumController@editForum')->name('doEditForum');
});




