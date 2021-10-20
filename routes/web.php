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
    return view('guest/home');
});

Auth::routes(['register']);

// ROTTE PER CUI E' NECESSARIA L'AUTENTICAZIONE, ADMIN SARA' IL PREFISSO
Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
});

// INDICAZIONE PER GESTIRE TUTTE LE ROTTE CHE NON SIANO DI AUTH(LOGIN, REGISTER..) E NEMMENO DI ADMIN
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
