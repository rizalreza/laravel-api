<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Menampilkan list pegawai
Route::get('pegawai','PegawaiController@index');

//Menampilkan detail pegawai
Route::get('pegawai/{id}','PegawaiController@show');

//Menghapus pegawai
Route::delete('pegawai/{id}','PegawaiController@destroy');

//Mengupdate existing task
Route::put('pegawai/{id}','PegawaiController@update');

//Membuat data baru
Route::post('pegawai','PegawaiController@store');	
