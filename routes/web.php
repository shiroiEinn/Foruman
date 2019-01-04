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

Route::get('/forum/thread/{id}','ThreadController@index')->name('viewThread');
Route::post('/forum/thread/search','ThreadController@search')->name('searchThread');

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
    Route::post('/forum/deleteEditForum','ForumController@delete')->name('deleteEditForum');
    Route::get('/forum/editForum/{id}','ForumController@edit')->name('editForum');
    Route::patch('/forum/doEditForum/{id}','ForumController@editForum')->name('doEditForum');

    Route::post('/forum/thread/doAddThread','ThreadController@create')->name('addThread');
    Route::post('/forum/thread/deleteEditThread','ThreadController@delete')->name('deleteEditThread');
    Route::get('/forum/thread/editThread/{id}','ThreadController@edit')->name('editThread');
    Route::patch('/forum/thread/doEditThread/{id}','ThreadController@editThread')->name('doEditThread');

    Route::get('/profile/viewProfile/{id?}','ProfileController@index')->name('viewProfile');
    Route::get('/profile/editProfile','ProfileController@edit')->name('editProfile');
    Route::patch('/profile/doEditProfile','ProfileController@editProfile')->name('doEditProfile');
    Route::post('/profile/doPopularity/{id}','ProfileController@popularity')->name('popularityProfile');

    Route::get('/inbox','MessageController@index')->name('viewMessage');
    Route::post('/inbox/addMessage','MessageController@addMessage')->name('addMessage');
    Route::post('/inbox/deleteMessage','MessageController@deleteMessage')->name('deleteMessage');
});

Route::group(['middleware'=>['admin']],function(){
    Route::get('/master/user','MasterUserController@index')->name('viewUserMaster');
    Route::post('/master/user/editDeleteUser','MasterUserController@editDelete')->name('editDeleteUserMaster');
    Route::get('/master/addUser','MasterUserController@addUserMaster')->name('addUserMaster');
    Route::post('/master/doAddUser','MasterUserController@create')->name('doAddUserMaster');
    Route::get('/master/user/editUser/{id}','MasterUserController@editUser')->name('editUserMaster');
    Route::patch('/master/user/doEditUser/{id}','MasterUserController@doEditUser')->name('doEditUserMaster');
});




