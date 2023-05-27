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

//Rotas para home
Route::get("/", "App\Http\Controllers\HomeController@index")->name('home');

//Rotas para barra de pesquisa
Route::get("/home", "App\Http\Controllers\HomeController@pesquisa")->name('home.pesquisa');
Route::post("/home", "App\Http\Controllers\HomeController@pesquisa")->name('home.pesquisa');

Route::resource("/album", "App\Http\Controllers\AlbumController");
Route::resource("/faixa", "App\Http\Controllers\FaixaController");

//redirecionando para a home caso o caminho acessado não esteja definido
Route::fallback(function(){
    return redirect()->route("home")->with("success", "URL não encontrada!");
});
