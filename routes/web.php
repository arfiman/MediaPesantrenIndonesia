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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pesantren', 'Pesantren\ViewController@tampilkan');
Route::post('/pesantren/cari', 'Pesantren\ViewController@pencarian');
Route::get('/pesantren/view/{id}', 'Pesantren\DetailController@tampilkan');

Route::get('/pesantren/upload', 'Pesantren\UploadController@tampilkan');
Route::post('/pesantren/upload/proses', 'Pesantren\UploadController@inputPesantren');
Route::get('/pesantren/delete/{id}', 'Pesantren\DeleteController@hapusPesantren');
Route::get('/pesantren/edit/{id}', 'Pesantren\EditController@tampilkan');
Route::get('/pesantren/deleteFoto/{id}', 'Pesantren\DeleteController@hapusFoto');
Route::get('/pesantren/edit/update', 'Pesantren\EditController@update');
