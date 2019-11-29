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
//Rutas de Documentacion
Route::get('/producto/document/{producto}', 'ProductController@document')->name('documentProduct')->middleware('verified');
Route::post('/producto/document/{producto_id}', 'ProductController@storeDocumentation')->name('documentSave')->middleware('verified');
Route::get('/producto/documents/{producto_id}', 'ProductController@indexDocumentation')->name('documentIndex')->middleware('verified');
Route::delete('/producto/documents/{document}', 'ProductController@deleteDocumentation')->name('deleteDocument')->middleware('verified');

Route::resource('presentacion', 'PresentationController')->middleware('verified');
//Rutas de Documentacion
Route::get('/presentacion/document/{presentacion}', 'PresentationController@document')->name('documentPresentation')->middleware('verified');
Route::post('/presentacion/document/{presentacion_id}', 'PresentationController@storeDocumentation')->name('documentSaveP')->middleware('verified');
Route::get('/presentacion/documents/{presentacion_id}', 'PresentationController@indexDocumentation')->name('documentIndexP')->middleware('verified');
Route::delete('/presentacion/documents/{document}', 'PresentationController@deleteDocumentation')->name('deleteDocumentP')->middleware('verified');
