<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BusController;
use App\Http\Controllers\TripController;
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


Route::group(['middleware'=>'auth'],function ()
{
Route::get('/',[BusController::class,'index'])->name('home');
Route::get('/trips',[TripController::class,'index'])->name('trips');
});
Route::get('/login',[\App\Http\Controllers\AdminAuthController::class,'showLoginForm'])->name('showLoginForm');
Route::post('/login',[\App\Http\Controllers\AdminAuthController::class,'login'])->name('login');
Route::post('/logout',[\App\Http\Controllers\AdminAuthController::class,'logout'])->name('logout');
