<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create', [App\Http\Controllers\TodoController::class, 'create'])->name('todo.create');
Route::POST('/todo/store', [App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
Route::get('/todo/show/{id}', [App\Http\Controllers\TodoController::class, 'show'])->name('todo.show');
Route::get('/todo/edit/{id}', [App\Http\Controllers\TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todo/update', [App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/destroy', [App\Http\Controllers\TodoController::class, 'destroy'])->name('todo.destroy');
