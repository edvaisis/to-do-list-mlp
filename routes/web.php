<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index']);
Route::post ('task-store',[TaskController::class, 'store']);
Route::delete('/task-destroy/{task}', [TaskController::class, 'destroy']);
Route::put ('/task-completed/{task}',[TaskController::class, 'complete']);
