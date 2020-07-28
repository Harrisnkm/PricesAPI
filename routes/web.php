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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::post('/patient', 'PatientController@search');
Route::get('/patient', 'PatientController@index');
Route::post('/provider', 'ProviderController@search');
Route::get('/provider', 'ProviderController@index');


Route::group(['middleware' => 'auth'], function() {

    /*User Routes*/
    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route:: get('/users/{user}', 'UserController@show');
});








Route::get('/home', 'HomeController@index')->name('home');
