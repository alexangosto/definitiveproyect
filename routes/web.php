<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticulosController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/articulos/store', [App\Http\Controllers\ArticulosController::class, 'store'])->name('articulos.store');

Route::get('/articulos', [App\Http\Controllers\ArticulosController::class, 'index'])->name('articulos.index');

Route::delete('/articulos/{id}',[App\Http\Controllers\ArticulosController::class, 'destroy'])->name('articulos.destroy');

Route::get('/articulos/{id}/edit',[App\Http\Controllers\ArticulosController::class, 'edit'])->name('articulos.edit');

Route::put('/articulos/{id}/update',[App\Http\Controllers\ArticulosController::class, 'update'])->name('articulos.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
