<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index']);
Route::post('/saveTask', [TaskController::class, 'saveTask'])->name('saveTask');
Route::post('/markDone/{id}', [TaskController::class, 'markDone'])->name('markDone');
Route::post('/deleteTask/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
Route::post('/restoreTask/{id}', [TaskController::class, 'restoreTask'])->name('restoreTask');


// Route::post('/saveTask', [TaskController::class, 'saveTask'])->name('saveTask');
