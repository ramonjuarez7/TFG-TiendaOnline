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

Route::get('Carrito', 'CarritoController@index');
Route::get('Carrito/Finish', 'CarritoController@finish');
Route::get('Carrito/{id}/{cantidad}', 'ProductoController@addToCart');
Route::get('Carrito/{id}', 'ProductoController@addToCart');


Route::get('Productos/{supercategory}/{midcategory}','CategoryController@inicio_concretecat');
Route::get('Productos/{supercategory}','CategoryController@inicio_supercat');

Route::get('About','InicioController@about');
Route::get('Contact','InicioController@contact');

Route::get('Buscar','InicioController@search');

Route::get('Producto/{id}','ProductoController@inicio');



