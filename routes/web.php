<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ReservaController;

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

Auth::routes();

//Reservas
Route::get('/home', [ReservaController::class, 'index'])->name('home');
Route::resource('reservas', ReservaController::class)->except([
    'index'
]);

