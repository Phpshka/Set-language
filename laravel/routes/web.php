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
Route::get('locale/{locale}', [\App\Http\Controllers\MainController::class,'changeLocale'])->name('locale');

Route::middleware(['set_locale'])->group(function (){
    Route::get('/', [\App\Http\Controllers\CardsController::class, 'index']);
    Route::get('/tasks/{id}', [\App\Http\Controllers\TasksController::class,'index'])->name('tasks');
    Route::get('/users/{id}', [\App\Http\Controllers\TasksController::class,'userTasks'])->name('users');
    Route::post('/card/add',[\App\Http\Controllers\CardsController::class,'store']);
    Route::post('/tasks/add',[\App\Http\Controllers\TasksController::class,'store']);
    Route::post('/cards/delete',[\App\Http\Controllers\CardsController::class,'destroy']);
    Route::put('/cards/update',[\App\Http\Controllers\CardsController::class,'update']);
    Route::post('/task/status',[\App\Http\Controllers\TasksController::class,'updateStatus']);
    Route::post('/card/details',[\App\Http\Controllers\CardsController::class,'addDetail']);

});


