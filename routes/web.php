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

Route::get('/', 'HomeController@index');
Route::post('/registration', 'HomeController@registration');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('d', 'HomeController@dashboard');

    Route::get('d/panitia', 'HomeController@panitia');
    Route::get('d/add_panitia', 'HomeController@add_panitia');
    Route::post('d/add_panitia/register', 'HomeController@store_panitia');
    
    Route::get('d/add_user', 'HomeController@add_user');
    Route::post('d/add_user/register', 'HomeController@store_user');
    
    Route::get('d/registrant', 'HomeController@registrant');
    Route::get('d/registrant/konfirmasi/{userid}', 'HomeController@activate');

    Route::get('d/konfirmasi', 'KonfirmasiController@index');
    Route::post('d/konfirmasi/upload', 'KonfirmasiController@store');
    Route::post('d/konfirmasi/upload/panitia', 'KonfirmasiController@storeByPanitia');
});
