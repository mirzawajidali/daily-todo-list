<?php

use App\Http\Controllers\TodolistController;
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
// Todo List Routes

Route::get('/',[TodolistController::class, 'index'])->name('index');
Route::post('/add',[TodolistController::class, 'store'])->name('store');
Route::post('/delete/{id}',[TodolistController::class, 'destroy'])->name('destroy');

