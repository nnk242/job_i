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

Route::get('/', 'frontend\ImageController@index');
Route::get('/bo-suu-tap/{id}', 'frontend\ImageController@group');

Route::group(['prefix'=>'admin'], function () {
    Auth::routes();
    Route::group(['prefix' => 'image'], function () {
        Route::get('/', 'backend\ImageController@index')->name('view.image');
        Route::get('create', 'backend\ImageController@create')->name('view.image.create');
        Route::post('store', 'backend\ImageController@store')->name('view.image.store');
        //delete
        Route::post('delete/{id}', 'backend\ImageController@destroy')->name('view.image.destroy');
        //edit
        Route::get('/{id}/edit', 'backend\ImageController@edit')->name('view.image.show');
        Route::post('/{id}/edit', 'backend\ImageController@update');
        //
        Route::post('loadingGroups', 'backend\ImageController@loadingGroup')->name('view.image.loadingGroups');
        Route::post('uploadAFile', 'backend\ImageController@uploadAFile')->name('view.image.uploadafile');
        Route::post('uploadFile', 'backend\ImageController@uploadFile')->name('view.image.uploadfile');
        Route::post('ajaxStatus', 'backend\ImageController@ajaxStatus')->name('view.image.ajaxStatus');
        Route::post('getUrl', 'backend\ImageController@getUrl')->name('view.image.getUrl');
        //upload serve
        Route::post('uploadFileServe', 'backend\ImageController@uploadFileServe')->name('view.image.uploadServe');
    });

    Route::group(['prefix' => 'group'], function () {
        Route::get('/', 'backend\GroupController@index')->name('view.group');
        Route::post('create', 'backend\GroupController@create')->name('view.group.create');
        //group edit
        Route::get('{id}/edit', 'backend\GroupController@edit')->name('view.group.edit');
        Route::post('{id}/edit', 'backend\GroupController@postEdit');
        //group delete
        Route::post('delete/{id}', 'backend\GroupController@delete');
        //region
        Route::post('createRegion', 'backend\GroupController@createRegion')->name('view.group.createRegion');
        //delete region
        Route::post('deleteRegion/{id}', 'backend\GroupController@deleteRegion');
        Route::get('{id}/editRegion', 'backend\GroupController@editRegion')->name('view.group.editRegion');
        Route::post('{id}/editRegion', 'backend\GroupController@postEditRegion');

        Route::post('getNameSeoGroup', 'backend\GroupController@getNameSeoGroup')->name('view.group.getNameSeoGroup');
        Route::post('getNameSeoRegion', 'backend\GroupController@getNameSeoRegion')->name('view.group.getNameSeoRegion');
    });
});
Route::group(['prefix'=>'image'], function () {
    Route::get('/{image}', 'frontend\ImageController@show');
});

Route::get('/home', 'HomeController@index')->name('home');

