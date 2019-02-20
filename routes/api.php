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
// Route::get('matalomba', ['middleware' => 'cors', function(){
//     $data = \App\Matalomba::all();
//     return $data;
// }]);
// Route::get('matalomba/{id}', ['middleware' => 'cors', function($id){
//     $data = \App\Soal::select('id_soal', 'id_matalomba', 'soal', 'gambar')->where('id_matalomba', $id)->get();
//     return $data;
// }]);
// Route::get('opsi/{id}', ['middleware' => 'cors', function($id){
//     $data = \App\Opsi::where('id_soal', $id)->get(); 
//     return $data;
// }]);
Route::middleware(['cors'])->group(function(){
    Route::post('/pengerjaan', 'KematerianController@handling');
});

// Route::post('post_client', ['middleware' => 'cors', function(){
//     return '';
// }]);