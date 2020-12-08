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


//Route::group(['middleware'=> 'guest'], function(){
  //  Route::match(['get','post'],'login',['as'=>'login','uses'=> 'loginController@index']);
//});
//Route::group(['middleware'=> 'auth'], function(){
  //  Route::get('/home',['as'=>'/home','uses'=> 'ChuyenMucController@index']);
//});



Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'chuyenmuc'],function(){
        Route::get('/danhsach', 'ChuyenMucController@index')->name('chuyenmuc.index');
        Route::get('/them', 'ChuyenMucController@create')->name('chuyenmuc.create');
        Route::post('/them', 'ChuyenMucController@store')->name('chuyenmuc.store');
        Route::get('/sua/{id}', 'ChuyenMucController@edit')->name('chuyenmuc.edit');
        Route::post('/sua/{id}', 'ChuyenMucController@update')->name('chuyenmuc.update');
        Route::get('{id}/xoa', 'ChuyenMucController@destroy')->name('chuyenmuc.delete');
    });
    Route::group(['prefix'=>'loaichuyenmuc'],function(){
        Route::get('/danhsach', 'LoaiChuyenMucController@index')->name('loaichuyenmuc.index');
        Route::get('/them', 'LoaiChuyenMucController@create')->name('loaichuyenmuc.create');
        Route::post('/them', 'LoaiChuyenMucController@store')->name('loaichuyenmuc.store');
        Route::get('/sua/{id}', 'LoaiChuyenMucController@edit')->name('loaichuyenmuc.edit');
        Route::post('/sua/{id}', 'LoaiChuyenMucController@update')->name('loaichuyenmuc.update');
        Route::get('{id}/xoa/', 'LoaiChuyenMucController@destroy')->name('loaichuyenmuc.delete');
    });
    Route::group(['prefix'=>'baiviet'],function(){
        Route::get('/danhsach', 'BaiVietController@index')->name('baiviet.index');
        Route::get('/them', 'BaiVietController@create')->name('baiviet.create');
        Route::post('/them', 'BaiVietController@store')->name('baiviet.store');
        Route::get('{id}/sua', 'BaiVietController@edit')->name('baiviet.edit');
        Route::post('{id}/sua','BaiVietController@update')->name('baiviet.update');
        Route::get('{id}/xoa','BaiVietController@destroy')->name('baiviet.delete');
        Route::get('ajax/loaichuyenmuc/{idChuyenMuc}','AjaxController@index');
    });
    Route::group(['prefix'=>'binhluan'],function(){
        Route::get('/danhsach', 'BinhLuanController@index')->name('binhluan.index');
        Route::get('/them', 'BinhLuanController@create')->name('binhluan.create');
        Route::post('/them', 'BinhLuanController@store')->name('binhluan.store');
        Route::get('{id}/sua', 'BinhLuanController@edit')->name('binhluan.edit');
        Route::post('{id}/sua','BinhLuanController@update')->name('binhluan.update');
        Route::get('{id}/xoa','BinhLuanController@destroy')->name('binhluan.delete');
        
    });
    
});

