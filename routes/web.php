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
})->name('welcome');

Auth::routes();

Route::namespace('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('dashboard', 'DashboardController')->name('dashboard');
        Route::get('criteria', 'CriteriaController@index')->name('criteria.index');
        Route::post('criteria/update', 'CriteriaController@update')->name('criteria.update');

        Route::get('subcriteria/{subcriteria}', 'SubcriteriaController@index')->name('subcriteria.index');
        Route::put('subcriteria/{subcriteria}/update', 'SubcriteriaController@update')->name('subcriteria.update');
    });


Route::get('data', 'DataController@index')->name('data.index');
Route::get('data/{index}/edit', 'DataController@edit')->name('data.edit');

Route::post('cookies', 'CookieController@setCookie')->name('cookies.set');
Route::delete('cookies/{index}/delete', 'CookieController@deleteCookie')->name('cookies.delete');
Route::put('cookies/{index}/update', 'CookieController@updateCookie')->name('cookies.update');
