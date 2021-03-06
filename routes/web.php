<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


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

Route::get('/set_language/{lang}', [Controller::class, 'set_language'])->name('set_language');
Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/mycv', function () {
    return view('cv');
});

Route::get('/download/mycv', 'App\Http\Controllers\IndexController@export')->name('export.cv');