<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/album', 'AlbumController@index');
Route::get('/album/create', 'AlbumController@create')->name('album.create');
Route::post('/album', 'AlbumController@store')->name('album.store');
Route::get('/album/edit/{id}', 'AlbumController@edit')->name('album.edit');
Route::put('/album/update/{id}', 'AlbumController@update')->name('album.update');
Route::delete('/album/{id}', 'AlbumController@delete')->name('album.delete');

Route::get('/galeri', 'GaleriController@index');
Route::get('/galeri/create', 'GaleriController@create')->name('galeri.create');
Route::post('/galeri', 'GaleriController@store')->name('galeri.store');
Route::get('/galeri/edit/{id}', 'GaleriController@edit')->name('galeri.edit');
Route::put('/galeri/{id}', 'GaleriController@update')->name('galeri.update');
Route::delete('/galeri/{id}', 'GaleriController@delete')->name('galeri.delete');

Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user', 'UserController@store')->name('user.store');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
Route::delete('/user/delete/{id}', 'UserController@delete')->name('user.hapus');

Route::get('/', 'GuestController@index');
Route::get('detail-album/{title}', 'GuestController@galeriFoto')->name('galeri.foto');
