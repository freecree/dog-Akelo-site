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
Route::get('/', 'Controller@getHome')->name('home');
Route::get('/{code}', 'Controller@getSomePage');
Route::get('/puppies/{code}', 'Controller@getPuppyPage');

//admin panel

Route::get('admin/log', 'AdminController@log')->name('admin.log');
Route::post('admin', 'AdminController@getLogForm')->name('admin.getForm');
Route::group(['middleware' => 'admin'], function() {
    //Route::get('admin', 'AdminController@getAdmin')->name('admin');
    Route::get('admin/pages', 'AdminController@getPages')->name('admin.pages');
    Route::get('admin/pages/puppies/add', 'AdminController@addPuppy')->name('puppies.add');
    Route::post('admin/pages/puppies/store', 'AdminController@storePuppy')->name('puppies.store');
    Route::get('admin/pages/puppies/delete/{code}', 'AdminController@deletePuppy')->name('puppies.delete');
    Route::get('admin/pages/puppies/edit/{code}', 'AdminController@editPuppy')->name('puppies.edit');
    Route::post('admin/pages/puppies/update', 'AdminController@updatePuppy')->name('puppies.update');
});




//Route::group(['middleware' => ['web']], function () {

//});

//Route::view('/', 'index');
