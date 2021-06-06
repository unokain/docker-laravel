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

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix'=>'customer'], function () {
//     Route::get('index', 'CustomerController@index')->name('customer.index');
//     Route::get('create', 'CustomerController@create')->name('customer.create');
//   });
// Route::get('/customer/index', [CustomerController::class, 'index']);
// Route::get('/customer/create', [CustomerController::class, 'create']);
// Route::post('/customer/store', [CustomerController::class, 'store']);

Route::resource('/customer', App\Http\Controllers\CustomerController::class);

Route::get('/getSearch', [App\Http\Controllers\CustomerController::class, 'getSearch'])->name('customer.getSearch');

