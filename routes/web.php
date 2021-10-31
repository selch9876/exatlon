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


Route::group(['middleware' => ['auth']], function() {
    Route::get('/edit/{id}', 'ContestantController@edit');
    Route::get('/create', function () { return view('create');   });
});

Route::get('export', 'ContestantController@export')->name('export');
Route::get('importExportView', 'ContestantController@importExportView');
Route::post('import', 'ContestantController@import')->name('import');
Route::get('index', 'ContestantController@index')->name('index');
Route::get('/contestant/{id}', 'ContestantController@show');
Route::get('/filter', 'ContestantController@filter')->name('filter');
Route::resource('contestants', 'ContestantController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

