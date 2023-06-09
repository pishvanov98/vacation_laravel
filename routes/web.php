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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vacation/create', 'VacationController@create')->name('vacation.create');
Route::post('/vacation','VacationController@store')->name('vacation.store');
Route::get('/vacation/{id}/edit', 'VacationController@edit')->name('vacation.edit');
Route::patch('/vacation/{id}', 'VacationController@update')->name('vacation.update');
Route::delete('/vacation/{id}', 'VacationController@destroy')->name('vacation.destroy');


