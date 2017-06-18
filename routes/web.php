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

Route::get('/', 'ThreadListController@index');
Route::post('/', 'ThreadListController@addThread')->name('addThread');
Route::group(['prefix' => '/thread/{id}', 'middleware' => 'thread'], function() {
    Route::get('', 'ThreadMainController@showThread')->name('showThread');
    Route::post('', 'ThreadMainController@postComment')->name('postComment');
});
Route::get('image/{id}', 'ImageController@getImage')->name('getImage');
