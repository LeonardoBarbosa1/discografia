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


Route::group(['prefix' => '/'], function () {
    Route::get("/", "App\Http\Controllers\HomeController@index")->name('home');
    //Rotas para barra de pesquisa
    Route::get("/pesquisa", "App\Http\Controllers\HomeController@index")->name('home-pesquisa');
    Route::post("/pesquisa", "App\Http\Controllers\HomeController@index")->name('home-pesquisa');
});

Route::resource("/album", "App\Http\Controllers\AlbumController");
//Rotas para barra de pesquisa
Route::group(['prefix' => 'album'], function () {
    Route::get("/pesquisa", "App\Http\Controllers\AlbumController@index")->name('album-pesquisa');
    Route::post("/pesquisa", "App\Http\Controllers\AlbumController@index")->name('album-pesquisa');
});

Route::resource("/faixa", "App\Http\Controllers\FaixaController");
//Rotas para barra de pesquisa
Route::group(['prefix' => 'faixa'], function () {
    Route::get("/pesquisa", "App\Http\Controllers\FaixaController@index")->name('faixa-pesquisa');
    Route::post("/pesquisa", "App\Http\Controllers\FaixaController@index")->name('faixa-pesquisa');
});

//redirecionando para a home caso o caminho acessado não esteja definido
Route::fallback(function(){
    return redirect()->route("home")->with("success", "URL não encontrada!");
});
