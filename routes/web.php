<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
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

//company
Route::get('/companies',[CompanyController::class,'index'])->name('company.index');

//----------------------------------------------------------------------------------------

//Clients
Route::get('/clients',[ClientController::class,'index'])->name('client.index');
//
Route::get('/clients/add',[ClientController::class,'create'])->name('client.create');
//
Route::post('/clients/store',[ClientController::class,'store'])->name('client.store');
//
Route::get('/clients/edit/{id}',[ClientController::class,'edit'])->name('client.edit');
