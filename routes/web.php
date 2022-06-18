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

Route::get('/', 'MasterPageController@inicio');
Route::get('index', 'MasterPageController@inicio');

Route::get('Carrito/Delete/{rawId}', 'CarritoController@delete');
Route::get('Carrito/Add/{rawId}', 'CarritoController@add');
Route::get('Carrito/Eliminar', 'CarritoController@eliminarCarrito');

Route::get('Carrito', 'CarritoController@index');
Route::get('Carrito/{id}/{cantidad}', 'ProductoController@addToCartWithQuantity');
Route::get('Carrito/{id}', 'ProductoController@addToCart');



Route::get('Productos/{supercategory}/{midcategory}','CategoryController@inicio_concretecat');
Route::get('Productos/{supercategory}','CategoryController@inicio_supercat');

Route::get('About','InicioController@about');
Route::get('Contact','InicioController@contact');

Route::post('Lector','InicioController@leerCodigo');

Route::get('Buscar','InicioController@search');

Route::get('Producto/{id}','ProductoController@inicio');

Route::get('Registro', 'Auth\RegisterController@registro');
Route::post('Registro', 'Auth\RegisterController@useradd');

Route::get('Login', 'Auth\LoginController@loginIndex');
Route::post('Login','Auth\LoginController@loginPost');

Route::get('Logout','Auth\LoginController@logout');
Route::get('Perfil','UserController@perfil');
Route::get('Perfil/Cuenta','UserController@cuenta');
Route::get('Perfil/Direcciones','UserController@direcciones');
Route::get('Perfil/Datos','UserController@datos');
Route::get('Perfil/{pest}/Modificar/{target}','UserController@modificar');
Route::post('Perfil/{pest}/Modificar/{target}','UserController@modificarPost');

Route::get('Pedidos','OrderController@index');
Route::get('Pedidos/Finalizar','OrderController@finalizar');
Route::get('Cupones','CouponController@index');
Route::get('Pedidos/Finalizar/Confirmar','OrderController@finish');
Route::get('Pedidos/Anular/{id}','OrderController@anular');

Route::get('Pago/{id}','HomeController@pago');
Route::get('Pagado/{id}','OrderController@pagado');
Route::get('Administracion','AdminController@index');
Route::get('Administracion/{cat}','AdminController@categoria');


Route::get('Administracion/{cat}/Crear','AdminController@crearIndex');
Route::post('Administracion/{cat}/Crear','AdminController@crear');
Route::get('Administracion/{cat}/{filtro}','AdminController@filtro');
Route::get('Administracion/{cat}/Elemento/{id}','AdminController@detalles');
Route::get('Administracion/{cat}/Elemento/Borrar/{id}','AdminController@borrar');
Route::post('Administracion/{cat}/Elemento/{id}','AdminController@modificar');
Route::post('Administracion/{cat}/Add/Elemento/{id}','AdminController@addcoupon');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
