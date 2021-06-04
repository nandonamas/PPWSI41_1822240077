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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa/insert', 'MahasiswaController@insert');
Route::get('/mahasiswa/update', 'MahasiswaController@update');
Route::get('/mahasiswa/delete', 'MahasiswaController@delete');
Route::get('/mahasiswa/select', 'MahasiswaController@select');
Route::get('/mahasiswa/insert-qb', 'MahasiswaController@insertQb');
Route::get('/mahasiswa/update-qb', 'MahasiswaController@updateQb');
Route::get('/mahasiswa/delete-qb', 'MahasiswaController@deleteQb');
Route::get('/mahasiswa/select-qb', 'MahasiswaController@selectQb');
Route::get('/mahasiswa/insert-elq', 'MahasiswaController@insertElq');
Route::get('/mahasiswa/update-elq', 'MahasiswaController@updateElq');
Route::get('/mahasiswa/delete-elq', 'MahasiswaController@deleteElq');
Route::get('/mahasiswa/select-elq', 'MahasiswaController@selectElq');
