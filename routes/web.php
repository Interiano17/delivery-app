<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComerciosController;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\OrdenesController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/inicio', [ComerciosController::class, 'mostrarComercios'])->name('landing.mostrar');
Route::get('/validar/usuario', [ComerciosController::class, 'validarUsuario'])->name('validar.usuario');

Route::get('/inicio/ordenes', [OrdenesController::class, 'mostrarOrdenes'])->name('ordenes.mostrar');


Route::get('/login/nueva/cuenta',function(){
    return view('registroCliente');
})->name('nuevo.cliente');

Route::post('/login/nueva/cuenta/guardar',[ClientesController::class ,'crearCliente'])->name('guardar.cliente');


Route::get('/admin', function (){
    return view('admin');
})->name('admin');
Route::get('/admin/crear/comercio', [ComerciosController::class, 'mostrarComerciosAdmin'])->name('comercios.mostrar.admin');

Route::get('/admin/clientes', [ClientesController::class, 'mostrarClientesAdmin'])->name('clientes.mostrar');

Route::get('/admin/deliveries', [DeliveriesController::class, 'mostrarDeliveriesAdmin'])->name('deliveries.mostrar');

Route::get('/admin/productos', [ProductosController::class, 'mostrarProductosAdmin'])->name('productos.admin.mostrar');



Route::get('/inicio/comercio/productos/{id}/{nombre}', [ProductosController::class, 'mostrarProductosComercio'])->name('productos.comercio');

//Route::get('/admin/crear/comercio',function (){
    //return view('RegistrosModal');
//})->name('RegistrosModal');

Route::get('/inicio', [ComerciosController::class, 'mostrarComercios'])->name('comercios.mostrar');


Route::get('/inicio/configuracion', function () {
    return view('editar.usuario');
});

Route::post('/admin/crear/comercio/guardar', [ComerciosController::class, 'guardarComercio'] 
)->name('guardar.comercio');

Route::post('/admin/productos/crear',[ProductosController::class, 'crearProducto'])->name('guardar.producto');


route::get('/admin/comercio/editar/{id}',[ComerciosController::class, 'editarComercio'])->name('editar.comercio');

Route::get('/admin/comercio/editar/save/{id}',[ComerciosController::class, 'editarComercioSave'])->name('editar.comercio.guardar');


route::get('/admin/comercio/ver/{id}',[ComerciosController::class, 'verComercioAdmin'])->name('admin.comercio.ver');

Route::get('/admin/producto/ver/{id}', [ProductosController::class, 'verProductosAdmin'])->name('ver.producto');


Route::get('/admin/producto/editar/{id}',[ProductosController::class, 'editarProducto'])->name('editar.producto.admin');

route::get('/admin/editar/producto/save/{id}',[ProductosController::class,'editarProductoSave'])->name('editar.producto');


