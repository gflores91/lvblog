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

Auth::routes();

Route::get('/', 'HomeController@Index')->name('home.index');
Route::get('/noticia', 'NoticiaController@Index')->name('noticia.index');
Route::get('/noticia/detalle/{id}', 'NoticiaController@Detalle')->name('noticia.detalle');
Route::get('/noticia/crear', 'NoticiaController@Crear')->name('noticia.crear');
Route::post('/noticia/crear', 'NoticiaController@CrearPost')->name('noticia.crearpost');
Route::get('/{username}', 'UserController@Index')->name('user.index');

// Route::get('/home', 'HomeController@index')->name('home');
