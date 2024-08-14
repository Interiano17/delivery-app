<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/admin', function (){
    return view('admin');
});
Route::get('/admin/crear/comercio',function (){
    return view('RegistrosModal');
})->name('RegistrosModal');


Route::get('/inicio/configuracion', function () {
    return view('editarusuario');
});

