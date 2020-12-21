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

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/roles', 'App\Http\Controllers\RolesController');
Route::resource('/patients', 'App\Http\Controllers\PatientController');
Route::resource('/users', 'App\Http\Controllers\UsersController');
Route::resource('/appmodes', 'App\Http\Controllers\AppmodeController');
Route::resource('/options', 'App\Http\Controllers\GoptionController');
Route::resource('/doctors', 'App\Http\Controllers\DoctorController');
Route::resource('/testcategories', 'App\Http\Controllers\TestcategoryController');
Route::resource('/tests', 'App\Http\Controllers\TestController');
Route::resource('/sales', 'App\Http\Controllers\SaleController');
Route::resource('/invoices', 'App\Http\Controllers\InvoiceController');
Route::resource('/brokers', 'App\Http\Controllers\BrokerController');
