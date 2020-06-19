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
    return view('front.top');
})->middleware('auth');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('food/create', 'Admin\FoodController@add')->middleware('auth');
    Route::post('food/create', 'Admin\FoodController@create')->middleware('auth');
    Route::get('food/index', 'Admin\FoodController@index')->middleware('auth')->name('food');
    Route::get('food/detail', 'Admin\FoodController@detail')->middleware('auth');
    Route::get('food/edit', 'Admin\FoodController@edit')->middleware('auth');
    Route::post('food/edit', 'Admin\FoodController@update')->middleware('auth');
    Route::get('food/delete', 'Admin\FoodController@delete')->middleware('auth');
});

Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'food/{id}'],function(){
       Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
       Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
    });
});