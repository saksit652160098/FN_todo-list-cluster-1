<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Todo;
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

Route::get('/',[C_Todo::class,'index']);
Route::post('/todo',[C_Todo::class,'create']);
Route::put('/todo/{td-id}',[C_Todo::class,'edit']);
Route::delete('/todo/{td_id}',[C_Todo::class,'destroy']);