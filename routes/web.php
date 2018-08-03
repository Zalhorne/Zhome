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

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
	dd(Car::first()->mileages);
    dd('end test');
});


Route::get('/database', function () {
    Schema::create('car_mileages', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('car_id');
        $table->integer('value');
        $table->date('date');
        $table->timestamps();
    });
    dd('end');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group( [ 'namespace' => 'Models' ], function () {
	Route::group( [ 'prefix' => 'Cars' ], function () {
		Route::get('/', 				[ 'as' => 'cars.index', 	'uses' => 'Cars\CarController@index' ] );
		Route::get('/create', 			[ 'as' => 'cars.create', 	'uses' => 'Cars\CarController@create' ] );
		Route::post('/', 				[ 'as' => 'cars.store', 	'uses' => 'Cars\CarController@store' ] );
		Route::get('/{car}', 			[ 'as' => 'cars.show', 		'uses' => 'Cars\CarController@show' ] );
		Route::get('/{car}/edit', 		[ 'as' => 'cars.edit', 		'uses' => 'Cars\CarController@edit' ] );
		Route::post('/{car}/addMileage',[ 'as' => 'cars.addMileage','uses' => 'Cars\CarController@addMileage' ] );
		Route::put('/{car}', 			[ 'as' => 'cars.update', 	'uses' => 'Cars\CarController@update' ] );
		Route::delete('/{car}/delete', 	[ 'as' => 'cars.destroy', 	'uses' => 'Cars\CarController@destroy' ] );
	});
});