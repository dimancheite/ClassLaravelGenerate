<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('/product_api', function () {
	return view('api.products.index');
});

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
	Route::group(['prefix' => 'v1'], function () {
		require config('infyom.laravel_generator.path.api_routes');
	});
});


Route::resource('students', 'StudentController');


Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::resource('products', 'ProductController');

	Route::group(['prefix' => 'categories'], function() {
		Route::get('/', [
			'as' => 'admin.category.index',
			'uses' => 'CategoryController@index'
		]);
	});

	Route::resource('files', 'FileController');
	Route::get('/file/media', [
		'as' => 'admin.files.medias',
		'uses' => 'FileController@getMediaAjax'
	]);
});
