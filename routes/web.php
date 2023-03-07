<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\warehouseController;

use Illuminate\Support\Facades\Auth;
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


Route::prefix('cms/admin')->group(function () {



    Route::resource('products', ProductController::class);
    Route::post('products_update/{id}', [ProductController::class, 'update'])->name('products_update');


    Route::resource('colors', ColorController::class);
    Route::post('colors_update/{id}', [ColorController::class, 'update'])->name('colors_update');

    Route::resource('warehouses',warehouseController::class);
    Route::post('warehouses_update/{id}', [warehouseController::class, 'update'])->name('warehouses_update');
});



 ?>
