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
Route::post('/{username}/follow', 'UserController@FollowPost')->name('user.followpost');
Route::post('/{username}/unfollow', 'UserController@UnFollowPost')->name('user.unfollowpost');
Route::get('/auth/facebook', 'SocialProfileController@Facebook')->name('socialprofile.facebook');
Route::get('/auth/facebook/callback', 'SocialProfileController@Callback')->name('socialprofile.callback');
Route::post('/auth/facebook/registrar', 'SocialProfileController@Registrar')->name('socialprofile.registrar');
Route::post('/{username}/dm', 'UserController@EnviarMensajePrivado')->name('user.enviarmensajeprivado');
Route::get('/conversacion/{conversacion}', 'UserController@MostrarConversacion')->name('user.conversacion');
Route::get('/noticias/search', 'NoticiaController@Buscar')->name('noticia.buscar');
Route::get('/api/noticias/{noticia}/comentarios', 'NoticiaController@Comentario')->name('noticia.comentario');
