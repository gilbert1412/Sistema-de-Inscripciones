<?php

use App\Http\Controllers\InscripcionesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/inscripciones', [InscripcionesController::class, 'index'])
    ->name('inscripciones');
Route::get('/reportes', 'ReporteController@index')->name('reportes');
Route::get('/inscripciones/{id}/editar', [InscripcionesController::class, 'edit'])
    ->name('inscripciones.edit');

Route::get('/about', function () {
    return view('about');
})->name('about');
