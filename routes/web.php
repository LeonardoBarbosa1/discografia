<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::resource('/album', 'App\Http\Controllers\AlbumController');
Route::resource('/faixa', 'App\Http\Controllers\FaixaController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'pesquisar'])->name('home.pesquisar');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'pesquisar'])->name('home.pesquisar');



