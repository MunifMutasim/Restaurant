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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'authenticatedadmin'],function(){
    //Basic Admin Functionality
    Route::get('/admin/index', 'AdminController@index');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/checkpassword','AdminController@checkpassword');
    Route::post('/admin/updatepassword','AdminController@updatepassword');
});

Route::match(array('GET','POST'),'/admin', 'AdminController@login');
Route::get('/logout','AdminController@logout');
