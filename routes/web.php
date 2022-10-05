<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
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

Route::resource('equipment', EquipmentController::class);

Route::resource('manufactures', ManufactureController::class);

Route::resource('categories', CategoryController::class);

Route::resource('users', UserController::class);

Route::resource('notes', NoteController::class)->except(['create','store']);
Route::get('/notes/create/{equipment}', [NoteController::class,'create'])->name('notes.create');
Route::post('/notes/create/{equipment}', [NoteController::class,'store'])->name('notes.store');
