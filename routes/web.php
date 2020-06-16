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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'RestoController@index');
Route::get('/list', 'RestoController@list');
Route::get('/delete/{id}', 'RestoController@delete');
Route::get('/edit/{id}', 'RestoController@edit');
Route::view('/add', 'add');

Route::post('/add', 'RestoController@add');
Route::post('/edit/{id}', 'RestoController@updateResto')->name('restaurant.update');

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
