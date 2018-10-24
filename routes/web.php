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

Route::get('/', function()
{
    return view('welcome');
});

Route::get('company', 'CompanyController@index')->name('company');

Route::get('user', 'UserController@index')->name('user');
Route::any('user/create', 'UserController@create')->name('user.create');
Route::any('user/update/{id}', 'UserController@update')->name('user.update')->where('id', '[0-9]+');
Route::get('user/delete/{id?}', 'UserController@destroy')->name('user.delete')->where('id', '[0-9]+');

Route::get('api', 'ApiController@index')->name('api');
Route::post('api/search', 'ApiController@search')->name('api-search');
Route::get('api/search-options', 'ApiController@searchOptions')->name('api-search-options');
Route::get('/api/get-offers', 'ApiController@getOffers')->name('api-get-offers');
