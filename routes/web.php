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

Route::get('Productos/{supercategory}/{midcategory}','CategoryController@inicio_concretecat');
Route::get('Productos/{supercategory}','CategoryController@inicio_supercat');



