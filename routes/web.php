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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test/intro', 'TestController@intro')->name('test-intro');
Route::get('/test/part-five', 'TestController@partFive')->name('test-part-five');
Route::get('/test/part-six', 'TestController@partSix')->name('test-part-six');
Route::get('/test/part-seven', 'TestController@partSeven')->name('test-part-seven');
Route::get('/test/result', 'TestController@result')->name('test-result');

Route::prefix('admin')->group(function () {
	Route::get('/home', 'Admin\UsersController@index')->name('home');
	// listening
	Route::post('/listenings/create', 'Admin\ListeningsController@create')->name("create-listening");
	Route::get('/listenings/create', 'Admin\ListeningsController@getCreate')->name("create-listening");
	//reading
	Route::get('/readings/create', 'Admin\ReadingsController@getCreate')->name("create-reading");
	Route::get('/readings', 'Admin\ReadingsController@index')->name("index-reading");
	Route::post('/readings/create', 'Admin\ReadingsController@create')->name("create-reading");
});