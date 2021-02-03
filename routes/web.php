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


// можем прописать  маршруты для каждого метода отдельно

//Route::get('/topic', 'TopicController@index');
//Route::get('/topic/create', 'TopicController@create');
//Route::post('/topic', 'TopicController@store');


// а можем сделать так:

// Маршрутизация для RESTful контроллера устанавливается одной строкой по скриншоту маршрутов
Route::resource('topic', 'TopicController');
Route::resource('block', 'BlockController');
Route::post('topic/search', 'TopicController@search');


Auth::routes();

Route::get('/home', 'HomeController@index');
