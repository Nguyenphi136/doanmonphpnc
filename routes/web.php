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

Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');
Route::get('admin/logout','UserController@getdangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
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
        Route::get('/sua/{id}', 'BaiVietController@edit')->name('baiviet.edit');
        Route::post('/sua/{id}','BaiVietController@update')->name('baiviet.update');
        Route::get('{id}/xoa','BaiVietController@destroy')->name('baiviet.delete');
        Route::get('ajax/loaichuyenmuc/{idChuyenMuc}','AjaxController@index');
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('/danhsach', 'UserController@index')->name('User.index');
        Route::get('/them', 'UserController@create')->name('User.create');
        Route::post('/them', 'UserController@store')->name('User.store');
        Route::get('/sua/{id}', 'UserController@edit')->name('User.edit');
        Route::post('/sua/{id}', 'UserController@update')->name('User.update');
        Route::get('{id}/xoa/', 'UserController@destroy')->name('User.delete');
    });
    Route::group(['prefix'=>'binhluan'],function(){
        Route::get('/danhsach', 'BinhLuanController@index')->name('binhluan.index');
        Route::get('/duyet/{id}', 'BinhLuanController@duyet')->name('binhluan.duyet');
        Route::post('/them', 'BinhLuanController@store')->name('binhluan.store');
        Route::get('/sua/{id}', 'BinhLuanController@edit')->name('binhluan.edit');
        Route::post('/sua/{id}','BinhLuanController@update')->name('binhluan.update');
        Route::get('{id}/xoa','BinhLuanController@destroy')->name('binhluan.delete');
        
    });
    
});

