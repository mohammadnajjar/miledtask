<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\SupplierController;
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
});
Route::resource('/supplier',SupplierController::class);
Route::Post('/filter',[SupplierController::class,'filter']);
Route::Post('/save',[SupplierController::class,'save']);
Route::Post('/add',[SupplierController::class,'add']);


Route::resource('/car',CarController::class);
