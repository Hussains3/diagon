<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
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
Route::resource('/goptions', 'App\Http\Controllers\GoptionController');
Route::resource('/doctors', 'App\Http\Controllers\DoctorController');
Route::resource('/testcategories', 'App\Http\Controllers\TestcategoryController');
Route::resource('/tests', 'App\Http\Controllers\TestController');
Route::resource('/sales', 'App\Http\Controllers\SaleController');
Route::resource('/invoices', 'App\Http\Controllers\InvoiceController');
Route::resource('/brokers', 'App\Http\Controllers\BrokerController');
Route::resource('/appmodes', 'App\Http\Controllers\AppmodeController');
Route::resource('/saleItems', 'App\Http\Controllers\SaleItemController');
Route::resource('/units', 'App\Http\Controllers\UnitController');
Route::resource('/parameters', 'App\Http\Controllers\ParameterController');
Route::resource('/pararesults', 'App\Http\Controllers\PararesultController');




Route::resource('/reports', 'App\Http\Controllers\ReportController');





Route::post('/addNewRow', 'App\Http\Controllers\SaleController@addNewRow');
Route::post('/single_sell_item', 'App\Http\Controllers\SaleController@single_sell_item');
