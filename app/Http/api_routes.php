<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/

Route::group(['prefix' => 'products'], function() {
	Route::get('/', [
		'as' => 'api.products.index',
		'uses' => 'ProductAPIController@index'
	]);

	Route::post('/store', [
		'as' => 'api.products.store',
		'uses' => 'ProductAPIController@store'
	]);

	Route::put('/{id}/update', [
		'as' => 'api.products.update',
		'uses' => 'ProductAPIController@update'
	]);

	Route::delete('/{id}/delete', [
		'as' => 'api.products.delete',
		'uses' => 'ProductAPIController@delete'
	]);
});



