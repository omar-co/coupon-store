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

Route::get('/', 'ProductsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'products'], function (){
    //Route::resource('products', 'ProductsController');
    Route::get('/', 'ProductsController@index')->name('products');
    Route::get('/create', 'ProductsController@create')->name('products.create');
    Route::get('/{products}/edit', 'ProductsController@edit')->name('products.edit');
    Route::put('/{products}/update', 'ProductsController@update')->name('products.update');
    Route::delete('/{products}/destroy', 'ProductsController@destroy')->name('products.destroy');
    Route::post('/store', 'ProductsController@store')->name('products.store');
});
