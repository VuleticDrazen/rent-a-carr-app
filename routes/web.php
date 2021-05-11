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
});

Route::get('/reservations/search', function () {
    return view('reservations.search');
});


Route::resource('/cars', \App\Http\Controllers\CarController::class );

Route::resource('/reservations', \App\Http\Controllers\ReservationController::class);

Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::get('reservations/?datum_preuzimanja=foo&datum_vracanja=bar', function(){
    return view('reservations.create');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
