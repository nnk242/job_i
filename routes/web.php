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
    return view('frontends.index');
});

Route::group(['prefix'=>'admin'], function () {
    Auth::routes();
    Route::group(['prefix' => 'image'], function () {
        Route::get('/', 'backend\ImageController@index')->name('view.image');
        Route::get('create', 'backend\ImageController@create')->name('view.image.create');
        Route::post('store', 'backend\ImageController@store')->name('view.image.store');
        //delete
        Route::post('delete/{id}', 'backend\ImageController@destroy')->name('view.image.destroy');
        //show
        Route::get('/{id}', 'backend\ImageController@show')->name('view.image.show');
        Route::post('loadingGroups', 'backend\ImageController@loadingGroup')->name('view.image.loadingGroups');
        Route::post('uploadAFile', 'backend\ImageController@uploadAFile')->name('view.image.uploadafile');
        Route::post('uploadFile', 'backend\ImageController@uploadFile')->name('view.image.uploadfile');
        Route::post('ajaxStatus', 'backend\ImageController@ajaxStatus')->name('view.image.ajaxStatus');
    });

    Route::group(['prefix' => 'group'], function () {
        Route::get('/', 'backend\GroupController@index')->name('view.group');
    });
});

Route::get('/home', 'HomeController@index')->name('home');

