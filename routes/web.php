<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComercioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/admin', function (){
    return view('admin');
})->name('admin');
Route::get('/admin/crear/comercio',function (){
    return view('RegistrosModal');
})->name('RegistrosModal');


Route::get('/inicio/configuracion', function () {
    return view('editar.usuario');
});

Route::post('/admin/crear/comercio/guardar', [ComercioController::class, 'guardarComercio'] 
)->name('guardar.comercio');

