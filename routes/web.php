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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/class', 'HomeController@class')->name('class');
Route::get('/class/register', 'HomeController@register')->name('class-register')
	->middleware('auth');
Route::get('/test/start', 'TestController@start')->name('test-start');
Route::get('/test/part-one', 'TestController@partOne')->name('test-part-one');
Route::post('/test/part-two', 'TestController@partTwo')->name('test-part-two');
Route::post('/test/part-three', 'TestController@partThree')->name('test-part-three');
Route::post('/test/part-four', 'TestController@partFour')->name('test-part-four');
Route::post('/test/part-five', 'TestController@partFive')->name('test-part-five');
Route::post('/test/part-six', 'TestController@partSix')->name('test-part-six');
Route::post('/test/part-seven', 'TestController@partSeven')->name('test-part-seven');
Route::post('/test/result', 'TestController@result')->name('test-result');

Route::get("/test/part-one-result/{testId}", "TestController@partOneResult");
Route::get("/test/part-two-result/{testId}", "TestController@partTwoResult");
Route::get("/test/part-three-result/{testId}", "TestController@partThreeResult");
Route::get("/test/part-four-result/{testId}", "TestController@partFourResult");
Route::get("/test/part-five-result/{testId}", "TestController@partFiveResult");
Route::get("/test/part-six-result/{testId}", "TestController@partSixResult");
Route::get("/test/part-seven-result/{testId}", "TestController@partSevenResult");
Route::get("/logout", "Auth\LoginController@logout");

Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/', 'Admin\UsersController@index')->name("admin-home");
	// listening
	Route::post('/listenings/create', 'Admin\ListeningsController@create')->name("create-listening");
	Route::get('/listenings/create', 'Admin\ListeningsController@getCreate')->name("create-listening");
	Route::get('/listenings/delete/{id}', 'Admin\ListeningsController@delete')->name("delete-listening");
	Route::get('/listenings/detail/{id}', 'Admin\ListeningsController@detail')->name("detail-listening");
	Route::get('/listenings', 'Admin\ListeningsController@index')->name("index-listening");
	//reading
	Route::get('/readings/create', 'Admin\ReadingsController@getCreate')->name("create-reading");
	Route::get('/readings/delete/{id}', 'Admin\ReadingsController@delete')->name("delete-reading");
	Route::get('/readings/detail/{id}', 'Admin\ReadingsController@detail')->name("detail-reading");
	Route::get('/readings', 'Admin\ReadingsController@index')->name("index-reading");
	Route::post('/readings/create', 'Admin\ReadingsController@create')->name("create-reading");
	//users
	Route::get('/users/create', 'Admin\UsersController@getCreate')->name("user-create");
	Route::get('/users/edit/{id}', 'Admin\UsersController@getEdit');
	Route::post('/users/create', 'Admin\UsersController@create')->name("user-create");
	Route::post('/users/edit/{id}', 'Admin\UsersController@edit')->name("user-edit");
	Route::get('/users/delete/{id}', 'Admin\UsersController@delete')->name("user-delete");
	Route::get('/users/detail/{id}', 'Admin\UsersController@detail')->name("user-detail");
	//classes
	Route::get('/classes', 'Admin\ClassesController@index')->name("index-classes");
	Route::get('/classes/add', 'Admin\ClassesController@getAdd')->name("class-add");
	Route::post('/classes/add', 'Admin\ClassesController@add')->name("class-add");
	Route::get('/classes/edit/{id}', 'Admin\ClassesController@getEdit')->name("class-edit");
	Route::post('/classes/edit/{id}', 'Admin\ClassesController@edit')->name("class-edit");
	Route::get('/classes/detail/{id}', 'Admin\ClassesController@detail')->name("class-detail");
	Route::get('/classes/delete/{id}', 'Admin\ClassesController@delete')->name("class-delete");
});