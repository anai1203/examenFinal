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
}) -> name('xInicio');

Route::get('/saludo', function () {
    return "Hola mundo desde laravel";
});

Route::get('/galeria/{numero}', function ($numero) {
    return "Este es el código de la foto: ".$numero;
}) -> where('numero','[0-9]+');

Route::view ('/galeria', 'pagGaleria' ,['valor'=>15])->name('xGaleria');

Route::get('/lista', function () {
    return view ('pagLista');
}) -> name('xLista');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
