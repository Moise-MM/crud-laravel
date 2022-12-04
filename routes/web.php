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
//
Route::get('/companies/add',[CompanyController::class,'create'])->name('company.create');
//
Route::post('/companies/store',[CompanyController::class,'store'])->name('company.store');
//
Route::get('/companies/edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
//
Route::put('/companies/update/{company}',[CompanyController::class,'update'])->name('company.update');
//
Route::delete('companies/delete/{company}',[CompanyController::class,'destroy'])->name('company.destroy');

//----------------------------------------------------------------------------------------

//Clients
Route::get('/clients',[ClientController::class,'index'])->name('client.index');
//
Route::get('/clients/add',[ClientController::class,'create'])->name('client.create');
//
Route::post('/clients/store',[ClientController::class,'store'])->name('client.store');
//
Route::get('/clients/edit/{id}',[ClientController::class,'edit'])->name('client.edit');
//
Route::put('/client/update/{client}',[ClientController::class,'update'])->name('client.update');
//
Route::delete('Client/delete/{client}',[ClientController::class,'destroy'])->name('client.destroy');
