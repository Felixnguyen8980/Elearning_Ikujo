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
Route::group(['middleware' => ['web']], function () {
//.......
Route::get('/','routeController@handle_request');
Route::get('/{option}','routeController@handle_request');
//Centerviews
Route::get('/center','CenterController@handle_request')->name('centerpage');
Route::get('/center/{option}','CenterController@handle_request')->name('centerpage');
Route::post('/center/{option}','CenterController@handle_request')->name('centerpage');

//Studentviews
Route::get('/student','StudentController@handle_request')->name('studentpage');
Route::get('/student/{option}','StudentController@handle_request')->name('studentpage');
Route::post('/student/{option}','StudentController@handle_request')->name('studentpage');
Route::get('/student/{option}/{id}','StudentController@handle_request')->name('studentpage');
// Route::post('/center/{option}','CenterController@handle_request')->name('centerpage');
});