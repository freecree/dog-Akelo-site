<?php

use Illuminate\Support\Facades\Route;

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

//Site
Route::get('/', 'PageController@getHome')->name('home');
Route::get('/{code}', 'PageController@getPage');
Route::get('/puppies/{code}', 'PageController@getPage');
Route::get('/events/{code}', 'PageController@getPage');

//admin panel

Route::get('admin/log', 'AdminController@log')->name('admin.log');
Route::post('admin', 'AdminController@getLogForm')->name('admin.getForm');

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/page/sort', 'AdminPageRes@showSort');
    Route::post('admin/page/sort', 'AdminPageRes@sort');
    Route::resource('admin/page', 'AdminPageRes');
});

