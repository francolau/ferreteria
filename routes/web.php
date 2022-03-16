<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PedidosController;
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
// RUTAS VARIAS
   Route::get('/clientes', [ClientesController::class,'index']);
   Route::post('/registro', [ClientesController::class,'store']);
   Route::get('/nosotros', [InicioController::class,'nosotros']);
 
 
// RUTAS PARA LA TIENDA
Route::get('/',[InicioController::class,'index']);
Route::get('/tienda',[MainController::class,'index']);
Route::get('/tienda/filtrar',[MainController::class,'filtrar']);

// RUTAS PARA EL PRODUCTO
Route::get('/producto/create',[ProductosController::class,'create']);  
Route::get('/producto/edit/{codigo}',[ProductosController::class,'edit']);  
Route::get('/producto/show/{codigo}',[ProductosController::class,'show']);
Route::post('/producto/{codigo}',[ProductosController::class,'store']); /** ver para que lo uso */
Route::patch('/producto/guardarCambios/{codigo}',[ProductosController::class,'update']); 
Route::patch('/producto/cambiarEstado/{codigo}',[ProductosController::class,'cambiarEstado']);  
Route::delete('/producto/delete/{codigo}',[ProductosController::class,'destroy']); 

// RUTAS PARA EL USUARIO
Route::post('/sesion/login/', [SesionController::class, 'login']);
Route::post('/sesion/registro/', [SesionController::class, 'registro']); 
Route::get('/sesion/salir/', [SesionController::class, 'cerrarSesion']);
Route::get('/sesion/principal', [SesionController::class, 'inicio']);
Route::get('/sesion/detalles', [SesionController::class, 'detallesCuenta']);
Route::get('/sesion/pedidos/', [SesionController::class, 'historialPedidos']);
Route::patch('/sesion/guardarCambios',[SesionController::class, 'guardarCambios']);
Route::get('/sesion/detallecompra/{codigo}', [SesionController::class, 'detallesCompra']);

// RUTAS PARA EL CARRITO
Route::post('/carrito/agregar',[CarritoController::class,'agregarProducto']); // ******************
Route::get('/carrito',[CarritoController::class,'index']); // ******************
Route::post('/carrito/realizarPedido',[CarritoController::class,'realizarPedido']); // ******************
Route::delete('/carrito/eliminarProducto/{codigo}',[CarritoController::class,'eliminarProducto']); // ******************
Route::patch('/carrito/modificarProducto/{codigo}',[CarritoController::class,'modificarProducto']); // ******************

//RUTAS PARA LOS PEDIDOS REALIZADOS

Route::get('/pedidos',[PedidosController::class,'index']);
Route::get('/pedidos/eliminar/{codigo}',[PedidosController::class,'eliminar']); /*** TIPO DELETE ROUTE::DELETE */
Route::get('/pedidos/mostrar/{codigo}',[PedidosController::class,'mostrar']);
Route::patch('/pedidos/modificar/{codigo}',[PedidosController::class,'modificar']);
Route::patch('/pedidos/finalizarPedido/',[PedidosController::class,'finalizar']);
Route::delete('/pedidos/eliminarProducto/{codigo}',[PedidosController::class,'eliminarProducto']); 


 //Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
