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

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->middleware('auth');
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->middleware('auth');
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->middleware('auth');
Route::put('/tasks/update/{id}', [TaskController::class, 'update'])->middleware('auth');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard', [TaskController::class, 'dashboard'])->middleware('auth');
