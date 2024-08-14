<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComerciosController;

Route::get('/', function () {
    return view('login');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/inicio', [ComerciosController::class, 'mostrarComercios'])->name('comercios.mostrar');

Route::get('/inicio/configuracion', function () {
    return view('editarusuario');
});
