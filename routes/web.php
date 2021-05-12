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
    return view( 'dashboard');
})->middleware('auth');

Route::get('/reservations/search', function () {
    $categories = \App\Models\Category::all();
    return view('reservations.search',['categories'=>$categories]);
})->middleware('auth');


Route::resource('/cars', \App\Http\Controllers\CarController::class )->middleware('auth');;

Route::resource('/reservations', \App\Http\Controllers\ReservationController::class)->middleware('auth');;

Route::resource('/users', \App\Http\Controllers\UserController::class)->middleware('auth');;

Route::get('reservations/?datum_preuzimanja=foo&datum_vracanja=bar', function(){
    return view('reservations.create');
})->middleware('auth');;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
