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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/admin', 'HomeController@indexAdmin')->name('admin')->middleware('verified');

Route::resource('cerveza', 'CervezaController')->middleware('verified');
Route::resource('categoria', 'CategoryController')->middleware('verified');
Route::resource('producto', 'ProductController')->middleware('verified');
Route::resource('presentacion', 'PresentationController')->middleware('verified');
