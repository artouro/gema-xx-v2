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
    Route::get('d/g/', 'KepesertaanController@index');
    Route::get('d/g/{id}', 'KepesertaanController@index');
    // Formulir LKBB
    Route::get('d/form_lkbb', 'KepesertaanController@show');
    Route::post('d/form_lkbb/upload', 'KepesertaanController@upload');

    // Kepesertaan
    Route::post('d/g/add', 'KepesertaanController@store');
    Route::post('d/g/{id}/e', 'KepesertaanController@update');
    Route::get('d/g/{id}/d', 'KepesertaanController@destroy');

    // Kepanitiaan
    Route::get('d/panitia', 'KepanitiaanController@index');
    Route::get('d/form_panitia', 'KepanitiaanController@show');
    Route::post('d/form_panitia/register', 'KepanitiaanController@store');
    
    // Kepesertaan
    Route::get('d/form_registrant', 'HomeController@show');
    Route::post('d/form_registrant/register', 'HomeController@store');
    
    Route::get('d/registrant', 'KepesertaanController@list');
    Route::get('d/registrant/konfirmasi/{userid}', 'HomeController@activate');

    // Konfirmasi Pembayaran
    Route::get('d/konfirmasi', 'KonfirmasiController@index');
    Route::post('d/konfirmasi/upload', 'KonfirmasiController@store');
    Route::post('d/konfirmasi/upload/panitia', 'KonfirmasiController@storeByPanitia');
        //Panitia mengkonfirmasi pembayaran
        Route::get('d/konfirmasi/pembayaran/{id}', 'KonfirmasiController@konfirmasi');

    // Kematerian
    Route::group(['middleware' => 'level'], function(){
        Route::get('d/k', 'KematerianController@index');
        Route::get('d/k/add', 'KematerianController@add');
        Route::post('d/k/add/store', 'KematerianController@store');
        Route::get('d/k/{id}/e', 'KematerianController@edit');
        Route::post('d/k/{id}/e/update', 'KematerianController@update');
        Route::get('d/k/{id}/delete', 'KematerianController@destroy');
    });

    // Detail Kematerian atau Soal
    Route::get('d/k/{id}', 'KematerianController@show');
    Route::get('d/k/{id}/add/', 'SoalController@index');
    Route::post('d/k/{id}/add/store', 'SoalController@store');
        //Edit Soal
        Route::get('d/k/{id}/e/{soal}', 'SoalController@index');
        Route::post('d/k/{id}/e/{soal}/update', 'SoalController@update');
        
        Route::get('d/k/{id}/edit', 'SoalController@edit');
        Route::post('d/k/{id}/edit/update', 'SoalController@update');
        //Delete Soal
        Route::get('d/k/soal/{id}/destroy', 'SoalController@destroy');

    // Rekap
    Route::get('d/rekap/', 'RekapController@index');
    Route::get('d/rekap/{tingkat}', 'RekapController@index');
    Route::get('d/rekap-detail/', 'RekapController@detail');
    Route::get('d/rekap-detail/{tipe}', 'RekapController@detail');
});
