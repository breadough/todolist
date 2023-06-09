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

// Route::get('/', [TaskController::class, 'index']);
// Route::post('/saveTask', [TaskController::class, 'saveTask'])->name('saveTask');
// Route::post('/markDone/{id}', [TaskController::class, 'markDone'])->name('markDone');
// Route::post('/deleteTask/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
// Route::post('/restoreTask/{id}', [TaskController::class, 'restoreTask'])->name('restoreTask');



Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegistrationController@show')->name('register.show');
        Route::post('/register', 'RegistrationController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});